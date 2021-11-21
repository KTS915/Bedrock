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


/**
 * Sets alt and loading attributes for featured images.
 *
 * @param array $attr	Attributes of the featured post.
 * @return array
 */
function bedrock_check_featured_image_attributes( $attr, $attachment, $size ) {

	if ( is_singular() ) {

		/*
		 * Ensure featured image is loaded without delay on singular pages.
		 */
		$attr['loading'] = 'eager';

	} else {

		global $wp_query;

		/*
		 * First featured image is loaded without delay on archive pages.
		 * Other featured images are lazy-loaded.
		 */
		$attr['loading'] = 'lazy';
		if ( $wp_query->current_post === 0 ) {
			$attr['loading'] = 'eager';
		}

		/*
		 * If no alt tag is set, use the post title.
		 */
		if ( empty( $attr['alt'] ) ) {
			$attr['alt'] = get_the_title();
		}
	}
	return $attr;
}
add_filter( 'wp_get_attachment_image_attributes', 'bedrock_check_featured_image_attributes', 10, 3 );

