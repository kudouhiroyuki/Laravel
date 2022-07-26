const mix = require('laravel-mix');

mix.js('resources/js/app.js', 'public/js')
	.js('resources/js/contactChats.js', 'public/js')
	.vue()
	.autoload({
  	"jquery": [ '$', 'window.jQuery' ]
	});