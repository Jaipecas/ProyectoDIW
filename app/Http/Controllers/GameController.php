<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use App\User;
use App\Game;
use App\Level;

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
        if ($player1->first()->id == $user->id) 
            $game->state = 'win_p2';
        else 
            $game->state = 'win_p1';
        
        $game->save();

        // obtengo el nivel para ese usuario y lengua
        $level_1 = Level::firstOrCreate(['user_id' => $player1->first()->id],['language_code' => $game->language]);
        $level_2 = Level::firstOrCreate(['user_id' => $player2->first()->id],['language_code' => $game->language]);
    
        if ($game->state == 'win_p2') {
            $level_2->increment('won');
            $level_1->increment('lost');
        } else {
            $level_1->increment('won');
            $level_2->increment('lost');
        }

        $level_1->save();
        $level_2->save();

        return response('Game left', 200);
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

        return view('scr_tableboard', ['game' => $game, 
                'user' => $meArray, 
                'opponent' => $oppoArray] );

    }

    /**
     * Manage a player's throw.
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

        $lettersOri = config('game.letters');
        $lettersOriL = $lettersOri[$gameDB->language];

        if ($player1->first()->id == $user->id) {
            $letters = $gameDB->player_1_letters;
            $pscore =  $gameDB->player_1_score;
        }
        else {
            $letters = $gameDB->player_2_letters;
            $pscore =  $gameDB->player_2_score;
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
                    $score += $value;
                    $computedWord = $computedWord.$sentWord[$i];
                }
             
            } else {

                $placed = false;
                do {
                    if ($gameDB->tableboard[$col + 15*$row] == " ") {
                        $computedWord = $computedWord.$sentWord[$i];
                        $score += $value;
                        $placed = true;
                    } else {
                        $computedWord = $computedWord.$gameDB->tableboard[$col + 15*$row];
                        $score += $lettersOriL[$computedWord.$gameDB->tableboard[$col + 15*$row]]['value'];
                        list($col, $row) = GameController::newPosition($col, $row, $direction);
                    }
                } while(!$placed);
            }

            list($col, $row) = GameController::newPosition($col, $row, $direction);
        }

        // añado, si está asignada, la letra de la siguiente casilla
        if ($col<15 && $row<15 && $gameDB->tableboard[$col + 15*$row] != " "){
            $computedWord = $computedWord.$gameDB->tableboard[$col + 15*$row];
            $score += $lettersOriL[$computedWord.$gameDB->tableboard[$col + 15*$row]]['value'];
        } else {
            list($col, $row) = GameController::newPosition($col, $row, $direction, true);
        }
        
        // añado, si está asignada, la letra de la casilla anterior a la primera
        list($colI, $rowI) = GameController::newPosition($colI, $rowI, $direction, true);
        if ($colI>=0 && $rowI>=0 &&$gameDB->tableboard[$colI + 15*$rowI] != " "){
            $computedWord = $gameDB->tableboard[$colI + 15*$rowI].$computedWord;
            $score += $lettersOriL[$computedWord.$gameDB->tableboard[$colI + 15*$rowI]]['value'];
        } else {
            list($colI, $rowI) = GameController::newPosition($colI, $rowI, $direction);
        }

        return response()->json([
                'rword' =>  $computedWord, 
                'irow' =>  chr($rowI + 65),   // devuelvo de A a O
                'icol' =>  $colI + 1,  // devuelvo de 1-15
                'frow' =>  chr($row + 65),
                'fcol' =>  $col + 1,
                'letters' => $letters,
                'wscore' => $score,
                'pscore' => $pscore + $score
            ], 200, $this->header, JSON_UNESCAPED_UNICODE);
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
    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

     /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

}
