<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Game;
use App\Level;
use App\User;

class InfoController extends Controller
{
    protected $header = array (
        'Content-Type' => 'application/json; charset=UTF-8',
        'charset' => 'utf-8'
    );

    public static function generateGeneralInfo() {
        
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

        $playingGames = \DB::table('games')
            ->where('state', '=',  'turn_p1')
            ->orWhere('state', '=',  'turn_p2')->count();

        $statistics = InfoController::generalStatistics();  

        return array('numberUsers' => $numberUsers, 
            'connectedUsers' => $connectedUsers,
            'nacionalities' => $nacionalities,
            'languages' => $languages,
            'playingGames' => $playingGames,
            'generalStatistics' => $statistics);
    }

    // renderiza la página de información de scrabble
    public function index() {

        $data = $this->generateGeneralInfo();

        return view('scr_index', $data);
    }

    // Información general de la aplicación
    public function general() {
        
        $data = $this->generateGeneralInfo();      

        return response()->json([
            'users' => [ 
                'number' =>  $data["numberUsers"], 
                'connected' =>  $data["connectedUsers"],
                'nacionalities' =>  $data["nacionalities"]
            ],
            'supported_languages' => [
                'languages' =>  $data["languages"],
                'number' => count($data["languages"])
            ],
            'games' => [
                'playing' =>  $data["playingGames"],
            ],
            'statistics' => [
                $data["generalStatistics"]
            ]], 200, $this->header, JSON_UNESCAPED_UNICODE);
    }

    // devuelve un array con las estadísticas por idioma
    protected static function generalsearchUserStatistics() {

        $statCollection = \DB::table('statistics')->get();
        $statArray = array();
    
        foreach ($statCollection as $lan) {

            $statArray[$lan->language_code] = array();

            $statArray[$lan->language_code]['most_valuable_word'] = $lan->most_valuable_word;
            $statArray[$lan->language_code]['most_valuable_word_points'] = $lan->most_valuable_word_points;
        }
        return $statCollection;
    }

    // Últimas partidas jugadas
    public function currentGames($number = 5) {

        /* Devuelve todos las columnas de user */
        /*$games = Game::with(['player1','player2'])->orderBy('updated_at')->take($number)
                ->get(['language', 'state', 'player_1', 'player_1_score', 'player_2', 'player_2_score', 'updated_at'])->toArray();*/

        /* Devuelve sólo las columnas de user que me interesan */
        $games = Game::with(array(
                    
                'player1' => function($query){
                                //$query->select('id','name', 'avatar', 'country');
                                $query->select(\DB::raw("id, name, concat('/storage/',avatar) as avatar, country"));
                                },
                'player2' => function($query){
                                //$query->select('id','name', 'avatar', 'country');
                                $query->select(\DB::raw("id, name, concat('/storage/',avatar) as avatar, country"));
                                }
                ))->orderBy('updated_at')->take($number)
                        ->get(['language', 'state', 'player_1', 'player_1_score', 'player_2', 'player_2_score', 'updated_at'])->toArray();

        return response()->json($games, 200, $this->header, JSON_UNESCAPED_UNICODE);
        
    }

    // Ranking por idioma de los mejores jugadores 
    public function ranking($lang, $number = 3) {

        // compruebo si el lenguaje esta soportado
        $sup_langs = \DB::table('supported_languages')->get();

        if (!$sup_langs->contains('language', strtolower($lang)))
            return response('Language not supported', 409);

        $ranking = Level::selectRaw('won/(won+lost) AS ratio')
                        ->where('language_code', $lang)
                        ->with(array(
                        'user' => function($query){
                                        $query->select('id','name', 'avatar', 'country');
                                  }
                        ))->orderBy('ratio','desc')->take($number)->get();

        return response()->json($ranking, 200, $this->header, JSON_UNESCAPED_UNICODE);
    }

     /**
     * búsqueda de jugadores por patrón de nombre
     *
     * @param  Request  $request 
     * @return \Illuminate\Http\Response
     */
    public function searchUser(Request $request) {
        
        $name = $request->input('name');
    
        $users = User::where('name','LIKE','%'.$name."%")->get(['id','name', 'email', 'country', 'avatar']);
         
        return response()->json($users, 200, $this->header, JSON_UNESCAPED_UNICODE);
    }
    
}
