<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
| - Son las rutas habituales
| - Devuelven HTML
| - Se aplican filtros para inicializar la sesión, las cookies, los bindings (inyección) y 
|   la protección CSRF; 
*/

/*
 |------------------
 |  Rutas imprenta 
 |------------------
 */

Route::get('/','PrinterHistoryController@index');

Route::get('/gutenberg','PrinterHistoryController@index');

Route::get('/difusion-imprenta','PrinterHistoryController@index');

Route::get('/trabajos-imprenta','PrinterHistoryController@index');

Route::get('/primeros-libros','PrinterHistoryController@index');

Route::get('/imprenta-valenciana','PrinterHistoryController@index');

Route::get('/curiosidades','PrinterHistoryController@index');

Route::get('/info_extra','PrinterHistoryController@index');

Route::get('/error500', function () {
    $a="hola"/2;
    return null;
});

/*
|-----------------------
|  Scrabble
|-----------------------
*/
Route::prefix('scrabble')->group(function () {

    /* Genera las rutas de autenticación */
    Auth::routes();

    Route::get('/block_auth', 'Auth\RegisterController@showBlockAuthForms')->name('blockauth');
  
    Route::get('/','InfoController@index');

    // búsqueda de usuarios
    Route::middleware('auth')->get('/search/user/live', 'InfoController@searchUser')->name('search_user');

    /*
    |---------------------------------
    |  Dashboard
    |  La exigencia de autenticación se hace en el propio controlador
    |---------------------------------
    */
    Route::get('/dashboard', 'HomeController@index')->name('dashboard');

    /*
    |--------------------
    | Gestión del avatar
    |--------------------
    */

    // Subida del avatar. Es necesario que el usuario esté autenticado.
    Route::middleware('auth')->post('/upload/avatar', 'UserController@updateAvatar')->name('avatar');
    // Elimina el avatar del usuario. Es necesario que el usuario esté autenticado.
    Route::middleware('auth')->post('/user/avatar/remove', 'UserController@removeAvatar')->name('remove_avatar');

    /*
    |-----------------------
    | Gestión de la partida
    |-----------------------
    */

    // La exigencia de autenticación se hace en el propio controlador
    Route::post('/game/{id}/giveup', 'GameController@giveup')->name('giveup');
    
    Route::get('/game/{id}', 'GameController@showTableboard')->name('tableboard');

    // colocar piezas
    Route::post('/game/{id}/user/throw', 'GameController@throw')->name('throw');

    // pasar turno
    Route::post('/game/{id}/user/pass', 'GameController@passTurn')->name('pass_turn');

    // devolver piezas
    Route::post('/game/{id}/user/return', 'GameController@returnTokens')->name('return_tokens');
    
    Route::prefix('challenge')->group(function () {
        Route::post('/request/{lang}', 'ChallengeController@create')->name('create_challenge');
        Route::post('/request/{lang}/against/{id}', 'ChallengeController@createAgainst')->name('create_challenge_user');
        Route::post('/request/{lang}/level/{level}', 'ChallengeController@createToLevel')->name('create_challenge_level');
    });

    /*
    |--------------------------
    | Información del usuario
    |--------------------------
    */
    Route::middleware('auth')->get('/user/statistics', 'UserController@getStatistics')->name('user_statistics');
    Route::middleware('auth')->get('/user/games/{gamesperpage?}', 'UserController@games')->name('user_games');
    Route::middleware('auth')->delete('/user/remove', 'UserController@destroy')->name('remove_user');
    Route::middleware('auth')->put('/notification/{id}/update/{state}', 'NotificationController@update')->name('update_notification');
    Route::middleware('auth')->put('/user/update', 'UserController@update')->name('user_update');
});

