const mix = require('laravel-mix');
// --------------------------Less-----------------------------------
// mix.js('resources/js/style.js', 'public/js')
//     .less('resources/less/app.less', 'public/css');
// --------------------------Scss-----------------------------------
// mix.js('resources/js/style.js', 'public/js')
//     .sass('resources/scss/app.scss', 'public/css').vue({version: 3});
// --------------------------Css-----------------------------------
mix.js('resources/js/style.js', 'public/js')
    .postCss('resources/css/style.css', 'public/css').vue({version: 3});
