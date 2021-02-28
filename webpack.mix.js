

const mix = require('laravel-mix');

/*
 |--------------------------------------------------------------------------
 | Mix Asset Management
 |--------------------------------------------------------------------------
 |
 | Mix provides a clean, fluent API for defining some Webpack build steps
 | for your Laravel applications. By default, we are compiling the CSS
 | file for the application as well as bundling up all the JS files.
 |
 */

const tailwindcss = require('tailwindcss')

mix.js('resources/js/app.js', 'public/js')
    .js('resources/js/logincash.js','public/js')
    .postCss('resources/css/app.css', 'public/css', [
        require('postcss-import'),
        require('tailwindcss'),
    ])
    // .sass('resources/sass/app.scss', 'public/dist/css')
    //         "heroku-postbuild": "npm run prod",
       .options({
           processCssUrls: false,
           postCss: [ tailwindcss('./tailwind.config.js') ],
       })
       .copyDirectory('resources/json', 'public/dist/json')
       .copyDirectory('resources/fonts', 'public/dist/fonts')
       // .copyDirectory('resources/images', 'public/dist/images')
       .webpackConfig(require('./webpack.config'))
       .browserSync('laralearn.van/');







