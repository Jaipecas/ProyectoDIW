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
    return view('welcome');
});

Route::get('/difusion_imprenta', function () {
    return view('printer2');
});

Route::get('/difusion_imprenta', function () {
    return view('printer3');
});

Route::get('/primeros_libros', function () {
    return view('printer4');
});

Route::get('/imprenta_valenciana', function () {
    return view('printer5');
});

Route::get('/scrabble', function () {
    return view('welcome_scrabble');
});

/*
 |-----------------------
 |  Rutas autenticación 
 |-----------------------
 */
Route::prefix('scrabble')->group(function () {
    Auth::routes();
});

/*
 |-------------
 |  Dashboard
 |-------------
 */
Route::get('/dashboard', 'HomeController@index')->name('dashboard');
