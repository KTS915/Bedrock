<?php
/**
 * Functions which enhance the theme by hooking into ClassicPress
 */

/**
 * Adds custom classes to the array of body classes.
 *
 * @param array $classes Classes for the body element.
 * @return array
 */
function bedrock_wp_body_classes( $classes ) {

	# Adds a class of hfeed to non-singular pages
	if ( ! is_singular() ) {
		$classes[] = 'hfeed';
	}

	# Adds classes according to whether sidebar exists
	$sidebars = wp_get_sidebars_widgets();
	if ( ! is_active_sidebar( 'sidebar-1' ) && ! is_active_sidebar( 'sidebar-2' ) ) {
		$classes[] = 'no-sidebars';
	}
	elseif ( is_active_sidebar( 'sidebar-1' ) && is_active_sidebar( 'sidebar-2' ) ) {
		$classes[] = 'two-sidebars';
	}
	else {
		$classes[] = 'one-sidebar';
	}

	# Adds a class for when logged in or out
	if ( is_user_logged_in() ) {
		$classes[] = 'logged-in';
	}
	else {
		$classes[] = 'logged-out';
	}

	return $classes;
}
add_filter( 'body_class', 'bedrock_wp_body_classes' );
