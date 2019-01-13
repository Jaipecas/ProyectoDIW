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
   
        // el usuario que ha pedido la pagina no juega en esa partida
        if ($player1->first()->id != $user->id && 
            $player2->first()->id != $user->id)
            return abort(403);

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

    public static function tokensStringToTokensObjectArray($tokensString) {

        $tokensArray= [];

        for ($n=0; $n<strlen($tokensString)/3; $n++) {
            $token = array( 'letter' => $tokensString[3*$n], 
                            'value' => intval( $tokensString[3*$n+1].$tokensString[3*$n+2]));

            array_push($tokensArray, $token);
        }

        return $tokensArray;
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
}
