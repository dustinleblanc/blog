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
    mix.copy([
            "bower_components/bootstrap-sass/assets/",
            "bower_components/jquery/dist/jquery.js"
        ], "resources/assets/vendor")
        .sass("app.scss")
        .scripts([
            "app.js",
            "../vendor/javascripts/",
            "../vendor/javascripts/bootstrap.js"
        ], "public/js/app.js")
        .version(["css/app.css", "js/app.js"]);
});
