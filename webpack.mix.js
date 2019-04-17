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

mix.js('resources/js/app.js', 'public/js')
    .copy('node_modules/@fortawesome/fontawesome-free/js/fontawesome.js', 'public/js')
    .copy('node_modules/startbootstrap-sb-admin-2/js/sb-admin-2.js', 'public/js')
    .copy('node_modules/bootstrap/dist/js/bootstrap.bundle.js', 'public/js')
    .copy('node_modules/startbootstrap-sb-admin-2/vendor/jquery-easing/jquery.easing.js', 'public/js')
    .copy('node_modules/startbootstrap-sb-admin-2/vendor/datatables/dataTables.bootstrap4.min.css', 'public/css')
    .copy('node_modules/startbootstrap-sb-admin-2/vendor/datatables/dataTables.bootstrap4.min.js', 'public/js')
    .copy('node_modules/startbootstrap-sb-admin-2/vendor/datatables/jquery.dataTables.min.js', 'public/js')
    .copy('node_modules/moment/moment.js', 'public/js')
    .copy('node_modules/tempusdominus-bootstrap-4/build/css/tempusdominus-bootstrap-4.css', 'public/css')
    .copy('node_modules/tempusdominus-bootstrap-4/build/js/tempusdominus-bootstrap-4.js', 'public/js')
    .copy('node_modules/bootstrap-select/dist/css/bootstrap-select.css', 'public/css')
    .copy('node_modules/bootstrap-select/dist/js/bootstrap-select.js', 'public/js')
    .copy('node_modules/bootstrap-select/dist/js/i18n', 'public/js/i18n')
    .sourceMaps()
   .sass('resources/sass/app.scss', 'public/css');
