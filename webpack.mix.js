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
    .vue()
    .sass('resources/sass/app.scss', 'public/css');


// const mix = require('laravel-mix');
// const CompressionPlugin = require('compression-webpack-plugin');

// mix.js('resources/js/app.js', 'public/js')
//     .styles([
//         'public/assets/css/app.css',
//         'public/assets/css/bootstrap.min.css',
//         'public/assets/css/all.min.css',
//     ], 'public/css/app.css')
//     .setPublicPath('public')
//     .vue()
//     .sass('resources/sass/app.scss', 'public/scss/css')
//     .webpackConfig({
//         plugins: [
//             new CompressionPlugin({
//                 test: /\.js(\?.*)?$/i,
//                 algorithm: 'gzip',
//                 filename: '[path][name].js.gz[query]',
//                 threshold: 10240,
//                 minRatio: 0.8,
//             }),
//         ],
//     });
// mix.version(['public/js/app.js', 'public/js/app.js.gz']);