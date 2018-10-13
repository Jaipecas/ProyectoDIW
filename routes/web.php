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
Route::get('/', function () {
    return view('prn_index');
});

Route::get('/difusion_imprenta', function () {
    return view('prn_extra1');
});

Route::get('/trabajos_imprenta', function () {
    return view('prn_extra2');
});

Route::get('/primeros_libros', function () {
    return view('prn_extra3');
});

Route::get('/imprenta_valenciana', function () {
    return view('prn_extra4');
});

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

    Route::get('/', function () {
        return view('scr_index');
    });
});

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

Route::middleware('auth')->post('/game/{id}/giveup', 'GameController@giveup')->name('giveup');

Route::prefix('challenge')->group(function () {
    Route::middleware('auth')->post('/request/{lang}', 'ChallengeController@create')->name('create_challenge');
    Route::middleware('auth')->post('/request/{lang}/against/{id}', 'ChallengeController@createAgainst')->name('create_challenge_user');
    Route::middleware('auth')->post('/request/{lang}/level/{level}', 'ChallengeController@createToLevel')->name('create_challenge_level');
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
