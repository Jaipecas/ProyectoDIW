<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Level;

/* 
|---------------------------------------
| Controlador del dashboard de usuario.
|---------------------------------------
*/

class HomeController extends Controller
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
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user = Auth::user();

       /* $gamesWin = DB::table('games')
                    ->select(DB::raw('count(*) as won, language'))
                    ->where('player_1', '=', $user->id)
                    ->where('state', '=', 'win_p1')
                    ->orWhere(function($query) use ($user) {
                        $query->where('player_2', '=', $user->id)
                              ->where('state', '=', 'win_p2');
                    })
                    ->groupBy('language')
                    ->get();*/

        $userStatistics = $user->levels()->get(['language_code','level','won','lost', 
                    'most_valuable_word', 'most_valuable_word_points', 
                    'most_valuable_word_game', 'shortest_game',
                    'longest_game' ]);

        $userStatisticsArray= [];
     /*
        // añado una key para evitar problemas con el bucle for en vue (:key)
        foreach ($userStatistics->toArray() as $value) {
           // $value["internal_id"] = $user->id."-".$value['language_code'];
            array_push($userStatisticsArray, $value); 
        }
*/

        $userNotifications = $user->unreadNotifications()->get(['id','type','notification','created_at','updated_at']);
        $currentGames = $user->gamesLive();

        $user->avatar = $user->avatar != null ? '/storage/'.$user->avatar : "";

        $challenges = \DB::table('challenges')
                            ->select('challenges.id', 'challenges.created_at', 'language', 'level', 'users.name')
                            ->leftJoin('users', 'users.id', '=', 'challenges.opposing_player')
                            ->where('requesting_player', $user->id)->get();

        // añado header para evitar que se almacene en caché y así tener siempre datos frescos
        return response()
                ->view('scr_home', ['user' => $user, 
                    'statistics' => $userStatistics->toArray(), 
                    'notifications' => $userNotifications,
                    'games' => $currentGames,
                    'usualopponents' => $user->getUsualOpponents(3),
                    'challenges' => $challenges->toArray()])
                ->header("Cache-Control", "private, no-store, max-age=0, no-cache, must-revalidate, post-check=0, pre-check=0")
                ->header("Pragma", "no-cache")
                ->header("Expires", "Tuesday, 4 April 2018 08:12:00 GMT");
    }
}
