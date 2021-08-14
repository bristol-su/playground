const mix = require('laravel-mix');
const webpack = require('webpack');

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

mix.js('resources/js/app.js', 'public/js/app.js').vue()
    .js('resources/js/control.js', 'public/js/control.js').vue()
   .sass('resources/sass/app.scss', 'public/css/app.css')
    .postCss('./node_modules/@bristol-su/portal-ui-kit/src/install/ui-kit.css', 'public/css/ui-kit.css', [require('tailwindcss')]);

if (mix.inProduction()) {
    mix.version();
}

mix.webpackConfig({
    plugins: [
        new webpack.ProvidePlugin({
            'ui-kit': '@bristol-su/portal-ui-kit'
        })
    ]
});
