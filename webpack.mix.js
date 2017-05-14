let mix = require('laravel-mix');
let LiveReloadPlugin = require('webpack-livereload-plugin');

    // css vendor
    mix.combine([
        'node_modules/bootstrap/dist/css/bootstrap.min.css',
        'resources/assets/sass/font-awesome-4.7.0/css/font-awesome.min.css',
        'components/fortawesome/font-awesome/v4.7.0/css/font-awesome.css',
        'resources/assets/sass/bundle/fancybox3.min.css',
        'node_modules/sweetalert2/dist/sweetalert2.min.css'
        ], 'public/css/vendor.css');

    mix.combine([
        'resources/assets/sass/app.scss',
        ], 'resources/assets/sass/bundle/app.scss')
    mix.sass('resources/assets/sass/app.scss', '../resources/assets/sass/bundle/app.css');

    // cart scss temp
    mix.sass('resources/assets/sass/bundle/cart.scss', 'public/css/cart.css');

    mix.combine([
        'resources/assets/sass/bundle/app.css'
        ],
        'public/css/app.css'
        );

    // vendor js
    mix.combine([
        'node_modules/jquery/dist/jquery.min.js',
        'node_modules/bootstrap/dist/js/bootstrap.min.js',
        'resources/assets/js/jssor.slider-22.2.16.min.js',
        'resources/assets/js/fancybox3.min.js',
        'node_modules/vue-cookie/build/vue-cookie.js',
        'node_modules/sweetalert2/dist/sweetalert2.min.js'
        ], 'public/js/vendor.js');

    mix.js('resources/assets/js/app.js', 'public/js/app.js');

    mix.webpackConfig({
        plugins: [
        new LiveReloadPlugin()
        ]
    });
