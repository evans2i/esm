

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
const CKEStyles = require('@ckeditor/ckeditor5-dev-utils').styles
const CKERegex = {
    svg: /ckeditor5-[^/\\]+[/\\]theme[/\\]icons[/\\][^/\\]+\.svg$/,
    css: /ckeditor5-[^/\\]+[/\\]theme[/\\].+\.css/
}

mix.js('resources/js/app.js', 'public/js')
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

       .webpackConfig({
           module: {
               rules: [
                   {
                       test: CKERegex.svg,
                       use: ['raw-loader']
                   },
                   {
                       test: CKERegex.css,
                       use: [
                           {
                               loader: 'style-loader',
                               options: {
                                   injectType: 'singletonStyleTag',
                                   attributes: {
                                       'data-cke': true
                                   }
                               }
                           },
                           {
                               loader: 'postcss-loader',
                               options: CKEStyles.getPostCssConfig({
                                   themeImporter: {
                                       themePath: require.resolve('@ckeditor/ckeditor5-theme-lark')
                                   },
                                   minify: true
                               })
                           }
                       ]
                   }
               ]
           }
       })
       .copyDirectory('resources/json', 'public/dist/json')
       .copyDirectory('resources/fonts', 'public/dist/fonts')
       // .copyDirectory('resources/images', 'public/dist/images')
       .webpackConfig(require('./webpack.config'))
       .browserSync('laralearn.van/');







