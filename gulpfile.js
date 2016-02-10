var elixir = require('laravel-elixir');

/*
 |--------------------------------------------------------------------------
 | Elixir Asset Management
 |--------------------------------------------------------------------------
 |
 | Elixir provides a clean, fluent API for defining some basic Gulp tasks
 | for your Laravel application. By default, we are compiling the Sass
 | file for our application, as well as publishing vendor resources.
 |
 */

elixir(function(mix) {
    mix.styles([
		'animate.css',
		'bootstrap.min.css',
		'font-awesome.min.css',
		'prettyPhoto.css',
		'price-range.css',
		'responsive.css',
		'main.css',
    ],'public/css/all.css');

    mix.styles([
    	'lightbox.css',
    ], 'public/css/lightbox.css');

    mix.scripts([
		'jquery.js',
		'jquery.prettyPhoto.js',
		'jquery.scrollUp.min.js',
		'bootstrap.min.js',
		'contact.js',
		'gmaps.js',
		'html5shiv.js',
		'main.js',
		'price-range.js'
	],'public/js/all.js');

	mix.scripts(['jquery.js','cart.js'],'public/js/cart.js');

	mix.scripts([
		'lightbox.js'
	],'public/js/lightbox.js');

    mix.version([
    	'public/css/all.css',
    	'public/js/all.js',
    	'public/css/lightbox.css',
    	'public/js/lightbox.js',
    	'public/js/cart.js'
    ]);

    mix.copy('resources/assets/images', 'public/build/images');
    mix.copy('resources/assets/fonts', 'public/build/fonts');
});
