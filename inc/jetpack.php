<?php
/**
 * Jetpack Compatibility File
 * Add theme support for Infinite Scroll.
 * See: http://jetpack.me/support/infinite-scroll/
 *
 * @package zerif-lite
 */

/**
 * Add theme support for Infinite Scroll.
 */
function zerif_jetpack_setup() {

	add_theme_support(
		'infinite-scroll',
		array(

			'container' => 'main',

			'footer'    => 'page',

		)
	);

}

add_action( 'after_setup_theme', 'zerif_jetpack_setup' );
