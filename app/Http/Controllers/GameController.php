<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use App\Models\User;
use App\Models\Game;
use App\Models\Level;
use App\Models\Statistics;
use App\Events\OpponentThrow;
use App\Events\GiveupGame;

class GameController extends Controller
{
    protected $header = array (
        'Content-Type' => 'application/json; charset=UTF-8',
        'charset' => 'utf-8'
    );

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Abandona una partida.
     * 
     * @param  int  $id
     * @return \Illuminate\Http\Response
     * 
     */
    public function giveup($id)
    {
        $user = Auth::user();

        try {
            $game = Game::findOrFail($id);
        }
        catch(ModelNotFoundException $err){
            return response('Game not found', 404);
        }

        $player1 = $game->player1()->get(['id']);
        $player2 = $game->player2()->get(['id']);

        if ($player1->first()->id != $user->id && 
            $player2->first()->id != $user->id)
            return response('Access denied to the game', 403);

        // Partida no esta en juego -> error
        if ($game->state == 'win_p1' || $game->state == 'win_p2')
            return response('Game already finished', 409);

        // busco el jugador para dar por ganador al otro
        if ($player1->first()->id == $user->id) {
            $game->state = 'win_p2';
            $oppoId = $player2->first()->id;
        }
        else {
            $game->state = 'win_p1';
            $oppoId = $player1->first()->id;
        } 
        
        $game->save();

        $this->updateLevels($game, $player1->first()->id, $player2->first()->id);

        // Enviar notificacion al contrincante
        event(new GiveupGame($game->id, $oppoId, $game->state));

        return response()->json([
            'state' => $game->state,
            ], 200);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id identificador de la partida
     * @return \Illuminate\Http\Response
     */
    public function showTableboard($id)
    {
        $meArray= [];
        $oppoArray= [];
        $game = [];
        $user = Auth::user();

        try {
            $gameDB = Game::findOrFail($id);
        }
        catch(ModelNotFoundException $err){
            return abort(404);
        }

        $player1 = $gameDB->player1()->get(['id','name', 'country', 'avatar']);
        $player2 = $gameDB->player2()->get(['id','name', 'country', 'avatar']);

        // el usuario que ha pedido la pagina no juega en esa partida
        if ($player1->first()->id != $user->id && 
            $player2->first()->id != $user->id)
            return abort(403);

        $player1->first()->avatar = strlen($player1->first()->avatar) != 0 ? "/storage/".$player1->first()->avatar : "";
        $player2->first()->avatar = strlen($player2->first()->avatar) != 0 ? "/storage/".$player2->first()->avatar : "";

        // envio mi objeto game, con la información de gameBD postprocesada
        $game['id'] = $gameDB->id;
        $game['created_at'] = $gameDB->created_at->toDateTimeString();
        $game['updated_at'] = $gameDB->updated_at->toDateTimeString();
        $game['language'] = $gameDB->language;
        $game['state'] = $gameDB->state;
        $game['throw'] = $gameDB->throw;
        $game['tableboard'] = $gameDB->tableboard;
        $game['remaining_tokens'] = strlen($gameDB->remaining_letters);
        $game['total_tokens'] = strlen($gameDB->remaining_letters) +
                                225 - substr_count($gameDB->tableboard, ' ') +
                                (strlen($gameDB->player_1_letters) +
                                strlen($gameDB->player_2_letters)) / 3;
   
        if ($player1->first()->id == $user->id) {
            $me = $player1->first();
            $oppo = $player2->first();

            // serializo
            $meArray = $me->toArray();
            $meArray["player"] = "P1";
            $meArray["score"] = $gameDB->player_1_score;
            $meArray["tokens"] = GameController::tokensStringToTokensObjectArray($gameDB->player_1_letters);
            
            $oppoArray = $oppo->toArray();
            $oppoArray["player"] = "P2";
            $oppoArray["score"] = $gameDB->player_2_score;
            // no paso las letras del oponente
            // $oppoArray["letters"] = $gameBD->player_2_letters;
        } else {
            $oppo = $player1->first();
            $me = $player2->first();

            $meArray = $me->toArray();
            $meArray["player"] = "P2";
            $meArray["score"] = $gameDB->player_2_score;
            $meArray["tokens"] = GameController::tokensStringToTokensObjectArray($gameDB->player_2_letters);

            $oppoArray = $oppo->toArray();
            $oppoArray["player"] = "P1";
            $oppoArray["score"] = $gameDB->player_1_score;
            // no paso las letras del oponente
            //$oppoArray["letters"] = $game->player_1_letters;
        }

        $currentGames = $user->gamesLive();

        return view('scr_tableboard', ['game' => $game,
                'games' => $currentGames, 
                'user' => $meArray, 
                'opponent' => $oppoArray] );

    }

    /**
     * Manages a player's throw.
     *
     * @param  Request  $request 
     * @param  int  $gid game id
     * @return \Illuminate\Http\Response
     */
    public function throw(Request $request, $id) {
       
        $user = Auth::user();

        try {
            $gameDB = Game::findOrFail($id);
        }
        catch(ModelNotFoundException $err){
            return abort(404);
        }

        $player1 = $gameDB->player1()->get(['id']);
        $player2 = $gameDB->player2()->get(['id']);

         // error si el usuario que ha solicitado tirar no juega en esa partida
        if ($player1->first()->id != $user->id && 
            $player2->first()->id != $user->id)
            return response('User does not play this game', 403);

        // Partida no esta en juego -> error
        if ($gameDB->state == 'win_p1' || $gameDB->state == 'win_p2')
            return response('Game already finished', 409);

        // que sea su turno
        if (($player1->first()->id == $user->id && $gameDB->state == 'turn_p2') ||
            ($player2->first()->id == $user->id && $gameDB->state == 'turn_p1'))
            return response('Player does not have turn', 403);

        $computedWord = ""; // palabra de la que obtener los puntos
        $score = 0;         // puntos de la palabra colocada
        $sentWord = $request->input('word');
        $colI = $col = intval($request->input('column')) - 1;
        $rowI = $row = ord($request->input('row')) - 65;
        $direction = $request->input('direction');
        $wordFactor = 1;
        $newTableboard = $gameDB->tableboard;

        if (strlen($sentWord) == 0) 
            return response('Incorrect word.', 403);

        $userStatistics = $user->levelsByLang($gameDB->language)->get([
            'most_valuable_word', 'most_valuable_word_points', 
            'most_valuable_word_game', 'shortest_game',
            'longest_game' ])->first();

        $lettersOri = config('game.letters');
        $lettersOriL = $lettersOri[$gameDB->language];

        if ($player1->first()->id == $user->id) {
            $letters = $gameDB->player_1_letters;
            $pscore =  $gameDB->player_1_score;
            $player = $player1;
        }
        else {
            $letters = $gameDB->player_2_letters;
            $pscore =  $gameDB->player_2_score;
            $player = $player2;
        }

        for ($i = 0;$i < strlen($sentWord);$i++) {

            // esta la letra en las letras del jugador?
            $pos = strpos($letters, $sentWord[$i]); // strpos, que es sensible a May y min
            if ($pos === false) 
                return response('Incorrect word. Player does not have any letter', 403);
            
            $value = intval($letters[$pos+1].$letters[$pos+2]);

            // saco la letra de las letras disponibles
            $subletters1 = substr($letters, 0, $pos);
            $subletters2 = substr($letters, $pos+3, strlen($letters)-3-$pos);
            $letters = $subletters1.$subletters2;

            // compruebo posicion
            if ($col<0 || $col>14 || $row<0 || $row>14) 
                return response('Incorrect position.', 403);

            // la primera tiene que ir si o si donde se ha posicionado
            if ($i == 0) {

                if ($gameDB->tableboard[$col + 15*$row] != " ")
                    return response('Incorrect position. There are a token in that cell', 403);
                else {
                    
                    list($fact, $kind) = GameController::cellFactor($col, $row);
                    if ($kind == "L") $value *= $fact;
                    else $wordFactor *= $fact;
                    
                    $score += $value;
                    $computedWord = $computedWord.$sentWord[$i];
                    $newTableboard[$col + 15*$row] = $sentWord[$i];
                }
             
            } else {

                $placed = false;
                do {
                    if ($gameDB->tableboard[$col + 15*$row] == " ") {
                        list($fact, $kind) = GameController::cellFactor($col, $row);
                        if ($kind == "L") $value *= $fact;
                        else $wordFactor *= $fact;
            
                        $score += $value;
                        $computedWord = $computedWord.$sentWord[$i];

                        $newTableboard[$col + 15*$row] = $sentWord[$i];
                        $placed = true;
                    } else {
                        $computedWord = $computedWord.$gameDB->tableboard[$col + 15*$row];
                        $value = $lettersOriL[$gameDB->tableboard[$col + 15*$row]]['value'];

                        list($fact, $kind) = GameController::cellFactor($col, $row);
                        if ($kind == "L") $value *= $fact;
                        else $wordFactor *= $fact;
            
                        $score += $value;
                        list($col, $row) = GameController::newPosition($col, $row, $direction);
                    }
                } while(!$placed);
            }

            list($col, $row) = GameController::newPosition($col, $row, $direction);
        }

        // añado, si está asignada, la letra de la siguiente casilla
        if ($col<15 && $row<15 && $gameDB->tableboard[$col + 15*$row] != " "){
            $computedWord = $computedWord.$gameDB->tableboard[$col + 15*$row];
            $value = $lettersOriL[$gameDB->tableboard[$col + 15*$row]]['value'];

            list($fact, $kind) = GameController::cellFactor($col, $row);
            if ($kind == "L") $value *= $fact;
            else $wordFactor *= $fact;
    
            $score += $value;
        } else {
            list($col, $row) = GameController::newPosition($col, $row, $direction, true);
        }
        
        // añado, si está asignada, la letra de la casilla anterior a la primera
        list($colI, $rowI) = GameController::newPosition($colI, $rowI, $direction, true);
        if ($colI >= 0 && $rowI >= 0 && $gameDB->tableboard[$colI + 15*$rowI] != " "){
            $computedWord = $gameDB->tableboard[$colI + 15*$rowI].$computedWord;
            $value = $lettersOriL[$gameDB->tableboard[$colI + 15*$rowI]]['value'];;
            
            list($fact, $kind) = GameController::cellFactor($colI, $rowI);
            if ($kind == "L") $value *= $fact;
            else $wordFactor *= $fact;

            $score += $value;
        } else {
            list($colI, $rowI) = GameController::newPosition($colI, $rowI, $direction);
        }
    
        // multiplico por el factor de palabra
        $score *= $wordFactor;
        $pscore += $score;

        // TODO comprobar si la palabra es valida
        
        // Nuevas letras
        $newTokens = $player->first()->getLetters($gameDB, 7-strlen($letters)/3);

        if (strlen($letters.$newTokens) == 0) { // ya no hay mas letras en la bolsa ni en juego por parte del jugador
            $pstate = "win";
        } else {
            $pstate = "play";
        }

        // Actualizar BBDD
        if ($player1->first()->id == $user->id) {
            $gameDB->player_1_letters = $letters.$newTokens;
            $gameDB->player_1_score = $pscore;

            if ($pstate == 'win')
                $gameDB->state = 'win_p1';
            else
                $gameDB->state = 'turn_p2';

            $numPlayer ='1';
            $oppoId = $player2->first()->id;
        } else {
            $gameDB->player_2_letters = $letters.$newTokens;
            $gameDB->player_2_score = $pscore;
            
            if ($pstate == 'win')
                $gameDB->state = 'win_p2';
            else
                $gameDB->state = 'turn_p1';

            $numPlayer ='2';
            $oppoId = $player1->first()->id;
        }

        // calculo la tirada para la BD
        if ($direction == 'H')
            $throwH = $numPlayer.chr($rowI + 65).str_pad($col, 2, "0", STR_PAD_LEFT);
        else
            $throwH = $numPlayer.str_pad($col, 2, "0", STR_PAD_LEFT).chr($rowI + 65);

        $gameDB->throw = $gameDB->throw.$throwH.$computedWord.'|';

        // OJO!! Las fichas de remaining_letters se quitan solas en getLetterFromBag
        $gameDB->tableboard = $newTableboard;
        $gameDB->save();

        $this->updateLevels($gameDB, $player1->first()->id, $player2->first()->id);

        // Enviar notificacion al contrincante
        event(new OpponentThrow($gameDB, $computedWord, $colI, $rowI, $direction,
                                $pscore, $score, $oppoId, $pstate));

        // Gestión de estadísticas de usuario
        if ($score > $userStatistics->most_valuable_word_points) {

            // no puedo usar find ya que solo soporta una primary key
            $userStat = Level::where('language_code', $gameDB->language)->where('user_id', $user->id)->first();
        
            $userStat->most_valuable_word_points = $score;
            $userStat->most_valuable_word = $computedWord;
            $userStat->most_valuable_word_game = $gameDB->id;

            if ($pstate == 'win') {
              
                $numThrow = substr_count($gameDB->throw, '|');

                if ($userStatistics->longest_game == null || $numThrow > $userStatistics->longest_game) {
                    $userStat->longest_game = $gameDB->id;
                }

                if ($userStatistics->shortest_game == null || $numThrow < $userStatistics->shortest_game) {
                    $userStat->shortest_game = $gameDB->id;
                }

                // compruebo estadśiticas en oponente
                $oppoStat = Level::where('language_code', $gameDB->language)->where('user_id', $oppoId)->first();

                if ($oppoStat->longest_game == null || $numThrow > $oppoStat->longest_game) {
                    $oppoStat->longest_game = $gameDB->id;
                }

                if ($oppoStat->shortest_game == null || $numThrow < $oppoStat->shortest_game) {
                    $oppoStat->shortest_game = $gameDB->id;
                }

                $oppoStat->save();
            }

            $userStat->save();
        }

        // Gestión de estadísticas por idioma
        $generalStat = Statistics::where('language_code',$gameDB->language)->first();
        if ($score > $generalStat->most_valuable_word_points) { 
            $generalStat->most_valuable_word_points = $score;
            $generalStat->most_valuable_word = $computedWord;

            $generalStat->save();
        }

        return response()->json([
                'rword' => $computedWord,
                'oword' => $sentWord, 
                'irow' =>  chr($rowI + 65),   // devuelvo de A a O
                'icol' =>  $colI + 1,  // devuelvo de 1-15
                'frow' =>  chr($row + 65),
                'fcol' =>  $col + 1,
                'tokens' => GameController::tokensStringToTokensObjectArray($letters.$newTokens),    // todas las fichas con las que va a jugar la siguiente tirada
                'newtokens' => GameController::tokensStringToTokensObjectArray($newTokens),          // fichas nuevas
                'wscore' => $score,
                'pscore' => $pscore,
                'state' => $gameDB->state,
                'pstate' => $pstate
            ], 200, $this->header, JSON_UNESCAPED_UNICODE);
    }

     /**
     * Manages a player pass turn.
     *
     * @param  Request  $request 
     * @param  int  $gid game id
     * @return \Illuminate\Http\Response
     */
    public function passTurn(Request $request, $id) {
        
        $user = Auth::user();

        try {
            $gameDB = Game::findOrFail($id);
        }
        catch(ModelNotFoundException $err){
            return abort(404);
        }

        $player1 = $gameDB->player1()->get(['id']);
        $player2 = $gameDB->player2()->get(['id']);

        // error si el usuario que ha solicitado tirar no juega en esa partida
        if ($player1->first()->id != $user->id && 
            $player2->first()->id != $user->id)
            return response('User does not play this game', 403);

        // Partida no esta en juego -> error
        if ($gameDB->state == 'win_p1' || $gameDB->state == 'win_p2')
            return response('Game already finished', 409);

        // que sea su turno
        if (($player1->first()->id == $user->id && $gameDB->state == 'turn_p2') ||
            ($player2->first()->id == $user->id && $gameDB->state == 'turn_p1'))
            return response('Player does not have turn', 403);

        if ($player1->first()->id == $user->id) {
            $gameDB->state = 'turn_p2';
            $oppoId = $player2->first()->id;
            $pscore =  $gameDB->player_1_score;
        } else {
            $gameDB->state = 'turn_p1';
            $oppoId = $player1->first()->id;
            $pscore =  $gameDB->player_2_score;
        }

        $gameDB->save();
        
        // Enviar notificacion al contrincante
        event(new OpponentThrow($gameDB, "", 0, 0, "",
                                $pscore, 0, $oppoId, "pass"));

        return response()->json([
            'rword' => "", 'oword' => "", 
            'irow' =>  "", 'icol' =>  "",
            'frow' =>  "", 'fcol' =>  "",
            'tokens' => "", 'newtokens' => "", 
            'wscore' => 0, 'pscore' => $pscore,
            'state' => $gameDB->state,
            'pstate' => 'pass' 
        ], 200, $this->header, JSON_UNESCAPED_UNICODE);

    }

     /**
     * Manages the return of tokens.
     *
     * @param  Request  $request 
     * @param  int  $gid game id
     * @return \Illuminate\Http\Response
     */
    public function returnTokens(Request $request, $id) {
        $user = Auth::user();

        try {
            $gameDB = Game::findOrFail($id);
        }
        catch(ModelNotFoundException $err){
            return abort(404);
        }

        $player1 = $gameDB->player1()->get(['id']);
        $player2 = $gameDB->player2()->get(['id']);

        // error si el usuario que ha solicitado tirar no juega en esa partida
        if ($player1->first()->id != $user->id && 
            $player2->first()->id != $user->id)
            return response('User does not play this game', 403);

        // Partida no esta en juego -> error
        if ($gameDB->state == 'win_p1' || $gameDB->state == 'win_p2')
            return response('Game already finished', 409);

        // que sea su turno
        if (($player1->first()->id == $user->id && $gameDB->state == 'turn_p2') ||
            ($player2->first()->id == $user->id && $gameDB->state == 'turn_p1'))
            return response('Player does not have turn', 403);

        if ($player1->first()->id == $user->id) {
            $letters = $gameDB->player_1_letters;
            $player = $player1;
            $gameDB->state = 'turn_p2';
            $oppoId = $player2->first()->id;
            $pscore =  $gameDB->player_1_score;
        }
        else {
            $letters = $gameDB->player_2_letters;
            $player = $player2;
            $gameDB->state = 'turn_p1';
            $oppoId = $player1->first()->id;
            $pscore =  $gameDB->player_2_score;
        }

        $sentTokens = $request->input('tokens');

        if (count($sentTokens) == 0) 
            return response('No tokens.', 403);

        $newTokens = $player->first()->getLetters($gameDB, count($sentTokens));

        if (strlen($newTokens) < count($sentTokens)) { // no quedan suficientes fichas en el saco
            if ($player1->first()->id == $user->id) $gameDB->state = 'turn_p1';
            else $gameDB->state = 'turn_p2';

            $newTokens = "";
            $sentTokens = [];
        }
        else {    

            for ($i=0; $i<count($sentTokens); $i++) {
                $pos = strpos($letters, $sentTokens[$i]);

                if ($pos !== false) {   // deberia ser siempre asi por definición, pero lo pongo por si acaso....
                    $letters = substr_replace($letters, "", $pos, 3);
                }
            }
        }

        // Actualizar BBDD
        if ($player1->first()->id == $user->id) 
            $gameDB->player_1_letters = $letters.$newTokens;
        else 
            $gameDB->player_2_letters = $letters.$newTokens;
        
        $gameDB->remaining_letters = $gameDB->remaining_letters.implode($sentTokens);;
          
        $gameDB->save();

        // Enviar notificacion al contrincante
        event(new OpponentThrow($gameDB, "", 0, 0, "",
                            $pscore, 0, $oppoId, "return"));

        return response()->json([
            'tokens' => GameController::tokensStringToTokensObjectArray($letters.$newTokens),    // todas las fichas con las que va a jugar la siguiente tirada
            'state' => $gameDB->state,
            'pstate' => 'return'
        ], 200, $this->header, JSON_UNESCAPED_UNICODE);

    }

    /**
     * Actualiza los niveles en caso de partida ganada/partida
     */
    protected function updateLevels($game, $player1_id, $player2_id) {

        if ($game->state != 'win_p2' && $game->state != 'win_p1') return;

        // obtengo el nivel para ese usuario y lengua
        $level_1 = Level::where('language_code', $game->language)->where('user_id', $player1_id)->first();
        $level_2 = Level::where('language_code', $game->language)->where('user_id', $player2_id)->first();

        if ($game->state == 'win_p2') {
            $level_2->increment('won');
            $level_1->increment('lost');
        } else {
            $level_1->increment('won');
            $level_2->increment('lost');
        }

        $level_1->save();
        $level_2->save();
    }

    public static function tokensStringToTokensObjectArray($tokensString) {

        $tokensArray= [];

        for ($n=0; $n<strlen($tokensString)/3; $n++) {
            $token = array( 'letter' => $tokensString[3*$n], 
                            'value' => intval( $tokensString[3*$n+1].$tokensString[3*$n+2]));

            array_push($tokensArray, $token);
        }

        return $tokensArray;
    }

    public static function newPosition($col, $row, $dir, $inverted = false) {

        $add = 1;
        if ($inverted)
            $add = -1;
    
        if ($dir == 'H')
            return array($col+$add, $row);
        else 
            return array($col, $row+$add);
    }

    public static function cellFactor($col, $row) {

        $table = config('game.tableboard');

        $_row = chr($row+65);
        $index = $_row.strval($col+1);
    
        if (!array_key_exists($index, $table)) 
            return array(1,'W');
        else {
            $fact = $table[$index][0];
            $kind = $table[$index][1];

            return array($fact, $kind);
        }
    }

}
