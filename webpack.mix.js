const mix = require('laravel-mix');
require('laravel-mix-purgecss');

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

mix.webpackConfig(webpack => {
    return {
        plugins: [
            new webpack.ProvidePlugin({
                $: 'jquery',
                jQuery: 'jquery',
                'window.jQuery': 'jquery',
                Popper: ['popper.js', 'default'],
            })
        ],
        resolve: {
            alias: {
                'jquery': path.join(__dirname, 'node_modules/jquery/dist/jquery'),
            }
        }
    };
});


mix.js('resources/js/app.js', 'public/js')
    .js('resources/js/front.js', 'public/js')
    //.js('node_modules/jquery-mask-plugin', 'public')
    .scripts([
        'resources/js/pagseguro/pagseguro_functions.js',
        'resources/js/pagseguro/pagseguro_events.js'], 'public/js/pagseguro.js')
    .sass('resources/sass/app.scss', 'public/css')
    .copy('node_modules/tinymce/skins', 'public/js/skins')
    .sass('resources/sass/front.scss', 'public/css')
    .sass('resources/sass/rtl.scss', 'public/css')
    //.purgeCss()
    .copyDirectory('resources/static/images', 'public/images')
    .browserSync(process.env.APP_URL)
    .version()
    .sourceMaps();
