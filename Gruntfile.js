// jshint node:true

module.exports = function( grunt ) {
	'use strict';

	var loader = require( 'load-project-config' ),
		config = require( 'grunt-theme-fleet' );
	config     = config();

	config.files.php.push( '!class-tgm-plugin-activation.php' );
	config.files.js.push( '!js/**/*.min.js' );
	config.files.css.push( '!css/**/*.min.css' );
	config.files.css.push( '!css/bootstrap.css' );
	config.files.js.push( '!js/bootstrap.js' );
	config.files.js.push( '!js/html5.js' );
	config.files.js.push( '!js/jquery.knob.js' );
	config.files.js.push( '!js/parallax.js' );
	config.files.js.push( '!js/respond.js' );
	config.files.js.push( '!js/scrollReveal.js' );
	config.files.js.push( '!js/smoothscroll.js' );
	config.files.js.push( '!js/zerif.js' );
	config.files.js.push( '!inc/admin/welcome-screen/js/welcome.js' );
	config.files.js.push( '!inc/admin/welcome-screen/js/welcome_customizer.js' );

	loader( grunt, config ).init();
};
