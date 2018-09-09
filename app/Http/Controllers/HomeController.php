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

        $userStatistics = $user->levels;
 

        return view('src_home', ['user' => $user, 'statistics' => $userStatistics]);
    }
}
