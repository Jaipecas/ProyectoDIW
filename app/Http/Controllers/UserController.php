<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\User;

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
}
