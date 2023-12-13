const mix = require('laravel-mix');

// mix.js('resources/js/app.js', 'public/js')
//     .vue()
//     .sass('resources/sass/app.scss', 'public/css');


const CompressionPlugin = require('compression-webpack-plugin');

mix.js('resources/js/app.js', 'public/js')
    .setPublicPath('public')
    .vue()
    .sass('resources/sass/app.scss', 'public/css')
    .webpackConfig({
        plugins: [
            new CompressionPlugin({
                test: /\.js(\?.*)?$/i,
                algorithm: 'gzip',
                filename: '[path][name].js.gz[query]',
                threshold: 10240,
                minRatio: 0.8,
            }),
        ],
    });
mix.version(['public/js/app.js', 'public/js/app.js.gz']);