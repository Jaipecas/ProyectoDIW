<?php

/*
|--------------------------------------------------------------------------
| Broadcast Channels
|--------------------------------------------------------------------------
|
| Here you may register all of the event broadcasting channels that your
| application supports. The given channel authorization callbacks are
| used to check if an authenticated user can listen to the channel.
|
*/

/* 
 * Encamina el canal privado entre el servidor y el cliente con id  id
 * El canal solo puede ser usado por el usuario id, por lo que comprueba que 
 * el user que hace la peticion (primer parámetro), coincida con el id del nombre
 * del canal. En caso contrario devuelve un false y no mandaria el mensaje.
 */ 
Broadcast::channel('user.{id}', function ($user, $id) {
    return (int) $user->id === (int) $id;
});

