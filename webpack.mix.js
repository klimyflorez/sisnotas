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

mix.js('resources/js/templates/admin/app.js', 'public/templates/admin/js')
    .sass('resources/sass/templates/admin/style.scss', 'public/templates/admin/css')
    .copy('resources/sass/templates/admin/plugins/bootstrap-editable/bootstrap-editable.css', 'public/templates/admin/css')
    .js('resources/js/templates/admin/plugins/bootstrap-editable/bootstrap-editable.js', 'public/templates/admin/js')
    .version()
    .copyDirectory('resources/sass/templates/admin/images', 'public/templates/admin/images');
