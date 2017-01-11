<?php
/**
 * Jetpack Compatibility File
 * See: http://jetpack.me/
 *
 * @package lavish 
*/

/**
 * Add theme support for Infinite Scroll.
 * See: http://jetpack.me/support/infinite-scroll/
 */
function lavish_jetpack_setup() {
	add_theme_support( 'infinite-scroll', array(
		'container' => 'la-content',
		'footer'    => 'la-wrapper',
	) );
}
add_action( 'after_setup_theme', 'lavish_jetpack_setup' );
