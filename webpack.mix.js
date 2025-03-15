const mix = require('laravel-mix');
require('laravel-mix-purgecss');

mix.js('resources/js/summary.js', 'public/js')
    .js('resources/js/read_analytics.js', 'public/js')
    .js('resources/js/sommaire.js', 'public/js')
    .postCss('resources/css/app.css', 'public/css', [
        require('postcss-import'),
        require('autoprefixer'),
    ])
    .purgeCss({
        enabled: mix.inProduction(),
        content: [
            'resources/views/**/*.blade.php',
            'resources/js/**/*.js',
            'resources/js/**/*.vue',
        ],
        safelist: [/active/, /open/, /show/], // Ajuste selon tes besoins
    })
    .options({
        processCssUrls: false,
        terser: {
            extractComments: false,
        },
    })
    .version();
