var elixir = require('laravel-elixir');

/*
 |--------------------------------------------------------------------------
 | Elixir Asset Management
 |--------------------------------------------------------------------------
 |
 | Elixir provides a clean, fluent API for defining some basic Gulp tasks
 | for your Laravel application. By default, we are compiling the Less
 | file for our application, as well as publishing vendor resources.
 |
 */

elixir(function(mix) {
    mix.sass('app.scss')
        .styles([
            'materialize/dist/css/materialize.css'
        ], 'public/css/materialize.css', 'bower_components')
        .scripts([
            'materialize/dist/js/materialize.js'
        ], 'public/js/materialize.js', 'bower_components')
        .scripts(['js/dismissing.js'],'public/js/app.min.js','resources/assets')
        .version([
            'css/app.css',
            'css/materialize.css',
            'js/materialize.js',
        ]);
});
