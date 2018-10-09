<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Game;
use App\Level;

class InfoController extends Controller
{
    protected $header = array (
        'Content-Type' => 'application/json; charset=UTF-8',
        'charset' => 'utf-8'
    );

    // Información general de la aplicación
    public function general() {

        // numero de usuarios
        $numberUsers = \DB::table('users')
                ->where('state', '<>',  'disable')
                ->where('type','player')->count();

        $connectedUsers = \DB::table('users')
                ->where('state', '<>',  'online')
                ->where('type','player')->count();

        $nacionalities = \DB::table('users')
                ->select('country')
                ->distinct()->count();

        $languages = \DB::table('supported_languages')
                ->select('name')->get();

        return response()->json([
            'users' => [ 
                    'number' => $numberUsers, 
                    'connected' => $connectedUsers,
                    'nacionalities' => $nacionalities
                ],
            'supported_languages' => [
                    'languages' => $languages,
                    'number' => count($languages)
                ]
            ], 200, $this->$header, JSON_UNESCAPED_UNICODE);
    }

    // Últimas partidas jugadas
    public function currentGames($number = 5) {

        /* Devuelve todos las columnas de user */
        /*$games = Game::with(['player1','player2'])->orderBy('updated_at')->take($number)
                ->get(['language', 'state', 'player_1', 'player_1_score', 'player_2', 'player_2_score', 'updated_at'])->toArray();*/

        /* Devuelve sólo las columnas de user que me interesan */
        $games = Game::with(array(
                        'player1' => function($query){
                                        $query->select('id','name', 'avatar', 'country');
                                     },
                        'player2' => function($query){
                                        $query->select('id','name', 'avatar', 'country');
                                     }
                        ))->orderBy('updated_at')->take($number)
                        ->get(['language', 'state', 'player_1', 'player_1_score', 'player_2', 'player_2_score', 'updated_at'])->toArray();

        return response()->json($games, 200, $this->header, JSON_UNESCAPED_UNICODE);
        
    }

    /* Ranking por idioma de los mejores jugadores */
    public function ranking($lang, $number) {

        $ranking = Level::selectRaw('won/(won+lost) AS ratio')->with(array(
                        'user' => function($query){
                                        $query->select('id','name', 'avatar', 'country');
                                }
                                ))->orderBy('ratio','desc')->take($number)->get();

        return response()->json($ranking, 200, $this->header, JSON_UNESCAPED_UNICODE);
    }
}
