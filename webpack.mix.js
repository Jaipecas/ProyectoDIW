let mix = require("laravel-mix");

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

// pipeline de compilación (js(origen, destino)/css(origen, destino)) / empaquetado script([origen], destino)
// JS
mix
  .js("resources/assets/js/app.js", "public/js") // compilación global
  .js("resources/assets/js/test_scr_register.js", "public/js")
  .js("resources/assets/js/test_scr_login.js", "public/js") // compilación de login de usuario
  .js("resources/assets/js/test_scr_index.js", "public/js")
  .js("resources/assets/js/test_scr_home.js", "public/js") // dashboard de usuario
  .js("resources/assets/js/test_scr_tableboard.js", "public/js");

// Sass
mix
  .sass("resources/assets/sass/test.scss", "public/css")
  .sass("resources/assets/sass/test_welcome.scss", "public/css")
  .sass("resources/assets/sass/test_scr_index.scss", "public/css")
  .sass("resources/assets/sass/test_scr_login.scss", "public/css")
  .sass("resources/assets/sass/test_scr_dashboard.scss", "public/css")
  .sass("resources/assets/sass/test_scr_tableboard.scss", "public/css");
