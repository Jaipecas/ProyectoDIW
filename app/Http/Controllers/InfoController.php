<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class InfoController extends Controller
{
    // Información general de la aplicación
    public function general() {

        $header = array (
            'Content-Type' => 'application/json; charset=UTF-8',
            'charset' => 'utf-8'
        );

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
            ], 200, $header, JSON_UNESCAPED_UNICODE);
    }
}
