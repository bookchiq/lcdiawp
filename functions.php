<?php
/**
 * lcdia functions and definitions
 *
 * @package lcdia
 * @since lcdia 1.0
 */

/**
 * Set the content width based on the theme's design and stylesheet.
 *
 * @since lcdia 1.0
 */
if ( ! isset( $content_width ) )
	$content_width = 640; /* pixels */

if ( ! function_exists( 'lcdia_setup' ) ):
/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which runs
 * before the init hook. The init hook is too late for some features, such as indicating
 * support post thumbnails.
 *
 * @since lcdia 1.0
 */
function lcdia_setup() {
	/**
	 * This theme uses wp_nav_menu() in one location.
	 */
	register_nav_menus( array(
		'primary' => __( 'Primary Menu', 'lcdia' ),
	) );
}
endif; // lcdia_setup
add_action( 'after_setup_theme', 'lcdia_setup' );

/**
 * Register widgetized area and update sidebar with default widgets
 *
 * @since lcdia 1.0
 */
function lcdia_widgets_init() {
	register_sidebar( array(
		'name' => __( 'Header', 'lcdia' ),
		'id' => 'header',
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget' => '</aside>',
		'before_title' => '<h1 class="widget-title">',
		'after_title' => '</h1>',
	) );

	register_sidebar( array(
		'name' => __( 'Secondary Content', 'lcdia' ),
		'id' => 'sidebar-1',
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget' => '</aside>',
		'before_title' => '<h1 class="widget-title">',
		'after_title' => '</h1>',
	) );
}
add_action( 'widgets_init', 'lcdia_widgets_init' );

/**
 * Enqueue scripts and styles
 */
function lcdia_scripts() {
	wp_enqueue_style( 'style', get_stylesheet_uri() );

	wp_enqueue_script( 'theme-functions', get_template_directory_uri() . '/js/functions.js', array( 'jquery' ), '20121025', true );
}
add_action( 'wp_enqueue_scripts', 'lcdia_scripts' );
