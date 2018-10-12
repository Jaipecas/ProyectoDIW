<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use App\User;
use App\Challenge;

class ChallengeController extends Controller
{
    /**
     * Crea un reto aleatorio
     * 
     * @param  $lang idioma en el que se solicita la partida
     * @return \Illuminate\Http\Response
     * 
     */
    public function create($lang){
        $user = Auth::user();

        // compruebo si el lenguaje esta soportado
        $sup_langs = \DB::table('supported_languages')->get();

        if (!$sup_langs->contains('language', $lang))
            return response('Language not supported', 409);

        $challenge = new Challenge;

        $challenge->requesting_player = $user->id;
        $challenge->language = $lang;

        $challenge->save();

        return response('Challenge created', 200);
    }

    /**
     * Crea un reto contra un usuario concreto
     * 
     * @param  $lang idioma en el que se solicita la partida
     * @param  $id identificador del usuario
     * @return \Illuminate\Http\Response
     * 
     */
    public function createAgainst($lang, $id){
        $user = Auth::user();

        // compruebo si el lenguaje esta soportado
        $sup_langs = \DB::table('supported_languages')->get();

        if (!$sup_langs->contains('language', $lang))
            return response('Language not supported', 409);

        // compruebo si el rival existe
        try {
            User::findOrFail($id);
        }
        catch(ModelNotFoundException $err){
            return response('Opposing player not found', 404);
        }
        
        $challenge = new Challenge;

        $challenge->requesting_player = $user->id;
        $challenge->language = $lang;
        $challenge->opposing_player = $id;

        $challenge->save();

        return response('Challenge created', 200);
    }

     /**
     * Crea un reto contra un nivel concreto
     * 
     * @param  $lang idioma en el que se solicita la partida
     * @param  $level nivel contra el que se desea jugar
     * @return \Illuminate\Http\Response
     * 
     */
    public function createToLevel($lang, $level){
        $user = Auth::user();

        // compruebo si el lenguaje esta soportado
        $sup_langs = \DB::table('supported_languages')->get();

        if (!$sup_langs->contains('language', $lang))
            return response('Language not supported', 409);

        if ($level<1 || $level>5) 
            return response('Level out of bounds', 409);

        $challenge = new Challenge;

        $challenge->requesting_player = $user->id;
        $challenge->language = $lang;
        $challenge->level = $level;

        $challenge->save();

        return response('Challenge created', 200);
    }
}
