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
 const webpack = require('webpack');

//  mix.webpackConfig({
//    plugins: [
//      new webpack.ProvidePlugin({
//          '$': 'jquery',
//          'jQuery': 'jquery',
//          'window.jQuery': 'jquery',
//      }),
//    ]
//  });

mix.js('./node_modules/jquery/dist/jquery.js', 'public/js')
    .js('resources/js/app.js', 'public/js')
    .sass('resources/sass/app.scss', 'public/css')
    .sourceMaps();
mix.js('./node_modules/chart.js/dist/chart.min.js', 'public/js')
    .sourceMaps();
mix.js('resources/js/rating.js', 'public/js')
    .less('./node_modules/jquery-bar-rating/themes/bars-square.less', 'public/css')
    .css('resources/css/rating-wrapper.css', 'public/css')
    .sourceMaps();
mix.autoload({ 'jquery': ['$', 'window.$', 'window.jQuery'] });
