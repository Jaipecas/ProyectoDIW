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
 * Los usuarios tienen que estar autorizados para escuchar por canales privados. Aqui es donde
 * definimos las reglas para comprobar esas autorizaciones. En este caso el canal solo puede ser
 * usado por el usuario cuyo el identificador que tiene el nombre del canal.
 * Se aceptan dos argumentos, el nombre del canal y la funcion callback que devolerá true o false si se
 * autoriza o no la escucha. 
 * Todas las funciones callback reciben como primer argumento el usuario actual autenticado. El resto 
 * de parámetros se suele obtener de los comodines añadidos al propio nombre del canal (en este caso id)
 */

Broadcast::channel('user.{id}', function ($user, $id) {
    return (int) $user->id === (int) $id;
});

