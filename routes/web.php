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

Route::get('/', function () {
    return view('welcome');
});
