<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Support\Facades\Validator;
use Hash;
use App\Models\User;
use App\Models\Game;

class UserController extends Controller
{
    /**
     * Actualiza el avatar del usuario.
     *
     * @param  Request  $request
     * @return Response
     */
    public function updateAvatar(Request $request)
    {
        $user = Auth::user();

        // almacena el avatar en la carpeta /storage/app/avatars
        // y almacena en la BBD en nombre asignado
        if ($request->file("avatar")) {
            $userPhoto = $request->file("avatar")->store("avatars");
            $profile = User::findOrFail($user->id);
            $profile->avatar = $userPhoto;
            $type = strrchr($profile->avatar, ".");
            $profile->avatar_type = empty($type) ? null : substr($type, 1);

            $profile->save();

            return response()->json([
                "path" => asset("/storage/" . $userPhoto),
            ]);
        }
    }

    /**
     * Obtiene el avatar del usuario.
     *
     * @param  Request  $request
     * @return Response
     */
    public function removeAvatar(Request $request)
    {
        $user = Auth::user();
        $profile = User::findOrFail($user->id);

        $file = $profile->avatar;

        $profile->avatar = null;
        $profile->avatar_type = null;
        $profile->save();

        if (\Storage::disk("local")->exists($file)) {
            \Storage::disk("local")->delete($file);
        } else {
            return response("File does not exists", 409);
        }

        return response("Avatar removed", 200);
    }

    /**
     * Obtiene el avatar del usuario.
     *
     * @param  Request  $request
     * @return Response
     */
    public function getStatistics(Request $request)
    {
        $user = Auth::user();
        $userStatistics = $user
            ->levels()
            ->get(["language_code", "level", "won", "lost"])
            ->toArray();

        if (count($userStatistics) == 0) {
            return response("User has no statistics", 409);
        }

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
            return response("User removed", 200);
        }

        return response('User can\'t be removed', 500);
    }

    /**
     * Obtiene las partidas del usuario.
     *
     * @param  Request  $request
     * @return Response
     */
    public function games($gamesperpage = 4, Request $request)
    {
        $user = Auth::user();

        $games = Game::select(
            "id",
            "updated_at",
            "language",
            "state",
            "player_1",
            "player_1_score",
            "player_2",
            "player_2_score",
        )
            ->where("player_1", "=", $user->id)
            ->orWhere("player_2", "=", $user->id)
            ->with([
                "player1" => function ($query) {
                    //$query->select('id','name', 'avatar', 'country');
                    $query->select(
                        \DB::raw(
                            "id, name, concat('/storage/',avatar) as avatar, country",
                        ),
                    );
                },
                "player2" => function ($query) {
                    $query->select(
                        \DB::raw(
                            "id, name, concat('/storage/',avatar) as avatar, country",
                        ),
                    );
                    //$query->select('id','name', 'avatar', 'country');
                },
            ])
            ->orderBy("updated_at", "desc")
            ->paginate($gamesperpage);

        return $games;
    }

    /**
     * Actualiza los datos del perfil del usuario
     *
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        try {
            $profile = User::find(Auth::user()->id);
        } catch (ModelNotFoundException $err) {
            return response("User not found", 404);
        }

        $newData = $request->json()->all();

        // construyo un validador
        $validator = Validator::make($newData, [
            "name" => "sometimes|string|max:255|min:4",
            "country" => "sometimes|string|max:2",
            "favourite_language" => "sometimes|string|max:2",
            "new_password" => "sometimes|string|min:5|confirmed",
            "old_password" => "required_with:new_password|string", // si esta new password tiene que estar old
        ]);

        // falla la validación
        if ($validator->fails()) {
            $errors = $validator->errors();
            return response()->json($errors, 409);
        }

        if (array_key_exists("name", $newData)) {
            $profile->name = $newData["name"];
        }

        if (array_key_exists("country", $newData)) {
            $profile->country = $newData["country"];
        }

        if (array_key_exists("favourite_language", $newData)) {
            // compruebo si el lenguaje esta soportado
            $sup_langs = \DB::table("supported_languages")->get();

            if (
                !$sup_langs->contains(
                    "language",
                    strtolower($newData["favourite_language"]),
                )
            ) {
                return response("Language not supported", 409);
            } else {
                $profile->favourite_language = strtolower(
                    $newData["favourite_language"],
                );
            }
        }

        // si ha llegado aquí se ha confirmado mediante el validador
        // que new_password y new_password_confirm coinciden
        if (array_key_exists("new_password", $newData)) {
            // El password antiguo coincide con el hash en la base de datos
            if (Hash::check($newData["old_password"], Auth::user()->password)) {
                $profile->password = bcrypt($newData["new_password"]);

                // fuerzo salir
                Auth::logout();
            } else {
                return response("Password incorrect", 401);
            }
        }

        $profile->save();

        return response("User updated", 200);
    }

    /**
     * Obtiene las notificaciones del usuario por estado.
     *
     * @param  string  $state (read, unread, delete)
     * @param  Request  $request
     * @return Response
     */
    public function notifications($state, Request $request)
    {
        $user = Auth::user();

        return $user
            ->notificationsByState($state)
            ->get(["id", "type", "notification", "created_at", "updated_at"]);
    }
}
