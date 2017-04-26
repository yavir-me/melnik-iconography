const elixir = require('laravel-elixir');
require('laravel-elixir-livereload');
require('laravel-elixir-vue-2');

/*
 |--------------------------------------------------------------------------
 | Elixir Asset Management
 |--------------------------------------------------------------------------
 |
 | Elixir provides a clean, fluent API for defining some basic Gulp tasks
 | for your Laravel application. By default, we are compiling the Sass
 | file for our application, as well as publishing vendor resources.
 |
 */

 elixir(mix => {
    mix.sass([
        './node_modules/bootstrap/dist/css/bootstrap.min.css',
        'app.scss'
        ], 'public/css/')
    .scripts([
        './node_modules/jquery/dist/jquery.min.js',
        './node_modules/bootstrap/dist/js/bootstrap.min.js',
        'jssor.slider-22.2.16.min.js',
        'app.js'
        ], 'public/js/app.js')
    .rollup('app.js')
 });