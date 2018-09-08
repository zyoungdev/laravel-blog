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
// Compile the main sass
mix.sass('resources/assets/sass/main.sass', 'public/res/css/main.css');

// Mix Admin Vendor css into one file
mix.styles([
  'vendor/font-lato.css',
  'vendor/twitter/bootstrap/dist/css/bootstrap.min.css',
  'vendor/font-awesome.min.css',
  'vendor/select2/select2/dist/css/select2.min.css',
  'vendor/components/highlightjs/styles/arta.css',
], 'public/res/css/vendor/all.css');

// Mix Admin Vendor JS into one file
mix.scripts([
  'vendor/components/highlightjs/highlight.pack.min.js',
  'vendor/components/jquery/jquery.min.js',
  'vendor/twitter/bootstrap/dist/js/bootstrap.min.js',
  'vendor/select2/select2/dist/js/select2.min.js',
], 'public/res/js/vendor/all.js');

// Mix any custom JS and place in public/res/js
mix.scripts([
  'main.js'
], 'public/res/js/main.js');

/*
 * ERROR: No longer accepts individual files
 * mix.version([
 *   'public/res/css/vendor/all.css', 
 *   'public/res/css/main.css', 
 *   'public/res/js/vendor/all.js',
 *   'public/res/js/main.js',
 * ]);
 */

