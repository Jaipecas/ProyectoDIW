let mix = require('laravel-mix');

/*
 |--------------------------------------------------------------------------
 | Mix Asset Management
 |--------------------------------------------------------------------------
 |
 | Mix provides a clean, fluent API for defining some Webpack build steps
 | for your Laravel application. By default, we are compiling the Sass
 | file for the application as well as bundling up all the JS files.
 |
 */

mix.js('resources/assets/js/app.js', 'public/js')
   .sass('resources/assets/sass/test.scss', 'public/css')
   .sass('resources/assets/sass/test_welcome.scss', 'public/css')
   .sass('resources/assets/sass/test_scr_index.scss', 'public/css')
 //mix.sass('resources/assets/sass/home.scss', 'public/css');
