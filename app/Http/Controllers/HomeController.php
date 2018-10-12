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

        $userStatistics = $user->levels()->get(['language_code','level','won','lost']);
        $userStatisticsArray= [];
        // añado una key para evitar problemas con el bucle for en vue (:key)
        foreach ($userStatistics->toArray() as $value) {
            $value["internal_id"] = $user->id."-".$value['language_code'];
            array_push($userStatisticsArray, $value); 
        }
        
        $userNotifications = $user->unreadNotifications()->get(['id','type','notification','created_at','updated_at']);
        $currentGames = $user->gamesLive();

        return view('src_home', ['user' => $user, 
                    'statistics' => $userStatisticsArray, 
                    'notifications' => $userNotifications,
                    'games' => $currentGames]);
    }
}
