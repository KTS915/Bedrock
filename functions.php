<?php
/**
 * Basic Bedrock functions and definitions
 */

if ( ! function_exists( 'bedrock_setup' ) ) :
	/**
	 * Sets up theme defaults and registers support for various ClassicPress features.
	 *
	 * Note that this function is hooked into the after_setup_theme hook, which
	 * runs before the init hook. The init hook is too late for some features, such
	 * as indicating support for post thumbnails.
	 */
	function bedrock_setup() {
		load_theme_textdomain( 'bedrock', get_template_directory() . '/languages' );

		// Add default posts and comments RSS feed links to head.
		add_theme_support( 'automatic-feed-links' );

		/*
		 * Let ClassicPress manage the document title.
		 * By adding theme support, we declare that this theme does not
		 * use a hard-coded <title> tag in the document head, and expect
		 * ClassicPress to provide it for us.
		 */
		add_theme_support( 'title-tag' );

		/*
		 * Enable support for Post Thumbnails on posts and pages.
		 *
		 * @link https://docs.classicpress.net/reference/functions/the_post_thumbnail/
		 */
		add_theme_support( 'post-thumbnails' );

		// Set the default content width.
		$GLOBALS['content_width'] = 525;

		// This theme uses wp_nav_menu() in three locations.
		register_nav_menus( array(
			'menu-1' => esc_html__( 'Primary', 'bedrock' ), // main nav in header
			'footer-links' => esc_html__( 'Footer Links', 'bedrock' ) // secondary nav in footer
		) );

		/*
		 * Switch default core markup for search form, comment form, and comments
		 * to output valid HTML5.
		 */
		add_theme_support( 'html5', array(
			'search-form',
			'comment-form',
			'comment-list',
			'gallery',
			'caption',
		) );

		// Set up the ClassicPress core custom background feature.
		add_theme_support( 'custom-background', apply_filters( 	
		'bedrock_custom_background_args', array(
			'default-color' => 'fffefc',
			'default-image' => '',
		) ) );

		// Add theme support for selective refresh for widgets.
		add_theme_support( 'customize-selective-refresh-widgets' );

		/**
		 * Add support for core custom logo.
		 *
		 * @link https://docs.classicpress.net/reference/functions/get_custom_logo/
		 */
		add_theme_support( 'custom-logo', array(
			'height'      => 250,
			'width'       => 250,
			'flex-width'  => true,
			'flex-height' => true,
		) );
	}
endif;
add_action( 'after_setup_theme', 'bedrock_setup' );

/**
 * Enqueue scripts and styles. Note that it is no longer recommended
 * to concatenate such files. Instead, it is better to keep such files
 * as small as possible and let the browser load them concurrently.
 * 
 * This block first loads normalize.css to account for differences
 * across browsers.
 * 
 * Then it loads new-css-reset to reset many properties to values nicer
 * than browser defaults.
 */
function bedrock_scripts() {

	# https://necolas.github.io/normalize.css/
	wp_enqueue_style( 'normalize-css', get_template_directory_uri() . '/css/normalize.css' );

	# https://elad2412.github.io/the-new-css-reset/
	wp_enqueue_style( 'css-reset', get_template_directory_uri() . '/css/new-css-reset.css' );

	# Theme-specific styles and scripts
	wp_enqueue_style( 'bedrock-style', get_stylesheet_uri() );
	wp_enqueue_script( 'bedrock-js', get_template_directory_uri() . '/js/scripts.js', null, null, true );

	wp_deregister_script( 'wp-embed' );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}

	# Remove dashicons in frontend for unauthenticated users
	if ( ! is_user_logged_in() ) {
		wp_deregister_style( 'dashicons' );
	}
}
add_action( 'wp_enqueue_scripts', 'bedrock_scripts' );

/**
 * Register sidebars
 * 
 * If you do not wish to have either or both sidebars, remove any
 * widgets from the relevant sidebar(s) and then comment out the same
 * sidebar(s) below
 */
function bedrock_register_sidebars() {
	register_sidebar( array(
		'id' => 'sidebar-1',
		'name' => __( 'Left Sidebar', 'bedrock' ),
		'description' => __( 'The first (primary) sidebar. Add widgets here.', 'bedrock' ),
		'before_widget' => '<div id="%1$s" class="widget %2$s">',
		'after_widget' => '</div>',
		'before_title' => '<h3 class="widgettitle">',
		'after_title' => '</h3>',
	) );
	register_sidebar( array(
		'id' => 'sidebar-2',
		'name' => __( 'Right Sidebar', 'bedrock' ),
		'description' => __( 'The second (secondary) sidebar. Add widgets here.', 'bedrock' ),
		'before_widget' => '<div id="%1$s" class="widget %2$s">',
		'after_widget' => '</div>',
		'before_title' => '<h3 class="widgettitle">',
		'after_title' => '</h3>',
	) );
}
add_action( 'widgets_init', 'bedrock_register_sidebars' );

/**
 * Remove useless stuff from head and elsewhere.
 */
require get_template_directory() . '/inc/disable-remove.php';

/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';

/**
 * Functions which enhance the theme by hooking into ClassicPress.
 */
require get_template_directory() . '/inc/template-functions.php';

/**
 * Customizer additions.
 */
require get_template_directory() . '/inc/customizer.php';
