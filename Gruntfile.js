// jshint node:true

module.exports = function( grunt ) {
    'use strict';

    var loader = require( 'load-project-config' ),
        config = require( 'grunt-theme-fleet' );
    config = config();

    config.files.php.push( '!class-tgm-plugin-activation.php' );
    config.files.js.push( '!js/**/*.min.js' );
    config.files.js.push( '!!js/vendor/*.js' );

    loader( grunt, config ).init();
};