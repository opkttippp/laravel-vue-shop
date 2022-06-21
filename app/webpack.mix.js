const mix = require('laravel-mix');
// --------------------------Css-----------------------------------
mix.js('resources/js/style.js', 'public/js')
    .postCss('resources/css/style.css', 'public/css', [
    ]);
// --------------------------Less-----------------------------------
// mix.js('resources/js/style.js', 'public/js')
//     .less('resources/less/app.less', 'public/css');
// --------------------------Scss-----------------------------------
// mix.js('resources/js/style.js', 'public/js')
//     .sass('resources/scss/app.scss', 'public/css');
