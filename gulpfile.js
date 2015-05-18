var elixir = require('laravel-elixir');

require('laravel-elixir-browser-sync');

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
    mix.browserify('app.js');

    mix.browserSync([
		'public/**/*',
		'resources/views/**/*'
	], {
		proxy: 'noname.app',
		reloadDelay: 100
	});
});
