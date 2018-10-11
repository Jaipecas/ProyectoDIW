<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\User;
use App\Game;

class UserController extends Controller
{
    /**
     * Actualiza el avatar del usuario.
     *
     * @param  Request  $request
     * @return Response
     */
    public function updateAvatar(Request $request) {
    
        $user = Auth::user();

        // almacena el avatar en la carpeta /storage/app/avatars
        // y almacena en la BBD en nombre asignado
        if ($request->file('avatar')) {
            $userPhoto = $request->file('avatar')->store('avatars');
            $profile = User::findOrFail($user->id);
            $profile->avatar = $userPhoto;
            $type = strrchr($profile->avatar, ".");
            $profile->avatar_type = empty($type) ? null : substr($type, 1);

            $profile->save();

            return response()->json([
                'path' => asset('storage/'.$userPhoto),
            ]);
        }
    }

    /**
     * Obtiene el avatar del usuario.
     *
     * @param  Request  $request
     * @return Response
     */
    public function removeAvatar(Request $request) {
    
        $user = Auth::user();
        $profile = User::findOrFail($user->id);

        $file = 'storage/'. $profile->avatar;

        $profile->avatar = NULL;
        $profile->avatar_type = NULL;
        $profile->save();

        if (is_file($file))
            unlink($file);
        else
            return response('File does not exists', 409);

        return response('Avatar removed', 200);
    }

    /**
     * Obtiene el avatar del usuario.
     *
     * @param  Request  $request
     * @return Response
     */
    public function getStatistics(Request $request) {
    
        $user = Auth::user();
        $userStatistics = $user->levels()->get(['language_code','level','won','lost'])->toArray();
        
        if (count($userStatistics) == 0)
            return response('User has no statistics', 409);

        return response()->json($userStatistics, 200);
    }

    /**
     * Elimina al usuario de la base de datos.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy()
    {
        $user = User::find(Auth::user()->id);
        // hay que salir antes de borrar la cuenta
        Auth::logout();

        if ($user->delete()) {
            // el with asigna a una variable flash (sólo este renderizado) un valor
            //return redirect()->route('login')->with('status', '¡La cuenta ha sido eliminada con éxito!');
            // no puedo redireccionar desde una llamada en AJAX
            // respondo OK y desde el cliente redirijo
            return response('User removed', 200);
        }

        return response('User can\'t be removed', 500);
    }

    /**
     * Obtiene las partidas del usuario.
     *
     * @param  Request  $request
     * @return Response
     */
    public function games($gamesperpage = 4, Request $request) {
        $user = Auth::user();

        $games = Game::select('updated_at','language','state','player_1','player_1_score','player_2','player_2_score')
                    ->where('player_1', '=', $user->id)
                    ->orWhere('player_2', '=', $user->id)
                    ->with(array(
                        'player1' => function($query){
                                        $query->select('id','name', 'avatar', 'country');
                                     },
                        'player2' => function($query){
                                        $query->select('id','name', 'avatar', 'country');
                                     }
                        ))
                    ->orderBy('updated_at','desc')->paginate($gamesperpage);

        return $games;
    }  
}
