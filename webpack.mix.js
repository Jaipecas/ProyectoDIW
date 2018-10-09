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

// pipeline de compilación/empaquetado
// JS
mix.js('resources/assets/js/app.js', 'public/js')         // compilación global
   .scripts([                                             // empaquetado registro de usuario
    'resources/assets/js/test_helpers.js',                    
    'resources/assets/js/test_scr_register.js'
    ], 'resources/assets/js/tmp/test_scr_register.js')
    .js('resources/assets/js/tmp/test_scr_register.js', 'public/js')
    .scripts([                                             // empaquetado login de usuario
        'resources/assets/js/test_helpers.js',                    
        'resources/assets/js/test_scr_login.js'
        ], 'resources/assets/js/tmp/test_scr_login.js')
    .js('resources/assets/js/tmp/test_scr_login.js', 'public/js')   // compilación de login de usuario 
    .js('resources/assets/js/test_scr_home.js', 'public/js')
    .js('resources/assets/js/test_scr_index.js', 'public/js');
    
// Sass
mix.sass('resources/assets/sass/test.scss', 'public/css')
   .sass('resources/assets/sass/test_welcome.scss', 'public/css')
   .sass('resources/assets/sass/test_scr_index.scss', 'public/css')
   .sass('resources/assets/sass/test_scr_login.scss', 'public/css')
   .sass('resources/assets/sass/test_scr_dashboard.scss', 'public/css');
