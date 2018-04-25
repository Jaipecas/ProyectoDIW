<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
| - las rutas se prefijan por /api/
| - son sin estado por lo que la autenticación de la petición se debe hacer via tokens
|   o mediante seguridad HTTP básica (usando las cabeceras de la petición)
| - en las respuestas se puede devolver además de HTML texto plano, XML o JSON.
| - se aplican filtros para limitar el número de peticiones y para cargar la inyección de dependencias
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::group([
        'prefix' => 'info', // genera rutas con la URL /info/
        'as' => 'info' // genera rutas con el nombre prefijado por info.
    ], function() {
        Route::get('general', 'InfoController@general')->name('general'); 
        //Route::get('system', 'InfoController@system')->name('system');;
});
