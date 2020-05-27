const mix = require('laravel-mix');

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

mix.js(  'resources/js/app.js',               'public/assets/js')
   .js(  'resources/js/admin/app.js',         'public/assets/js/admin')
   .sass('resources/sass/app.scss',           'public/assets/css')
   .sass('resources/sass/login/session.scss', 'public/assets/css/login')
   .sass('resources/sass/admin/app.scss',     'public/assets/css/admin')

mix.copyDirectory('resources/vendor/assets', 'public/assets/vendor');
mix.copyDirectory('resources/images',        'public/assets/images');


mix.version([
   'public/assets/vendor/tabler/css/tabler.min.css',
   'public/assets/vendor/tabler/css/tabler-dashboard.css'
]).options({ processCssUrls: false });

if (mix.inProduction()) {
   mix.version();
}
