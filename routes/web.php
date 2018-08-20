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

    /* Rutas autenticación */
    Auth::routes();

    Route::get('/', function () {
        return view('scr_index');
    });
});

/*
 |-------------
 |  Dashboard
 |-------------
 */
Route::get('/dashboard', 'HomeController@index')->name('dashboard');
