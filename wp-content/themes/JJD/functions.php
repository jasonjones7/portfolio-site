<?php
if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

/**
 * Enqueue scripts and styles
 */

// Remove parent theme's default enqueues.
add_action( 'wp_enqueue_scripts', 'understrap_remove_scripts', 20 );
function understrap_remove_scripts() {
	wp_dequeue_style( 'understrap-styles' );
	wp_deregister_style( 'understrap-styles' );

	wp_dequeue_script( 'understrap-scripts' );
	wp_deregister_script( 'understrap-scripts' );
}

// Child theme styles/scripts, incl. jQuery (footer-loaded, no migrate).
add_action( 'wp_enqueue_scripts', 'theme_enqueue_styles' );
function theme_enqueue_styles() {
	$the_theme = wp_get_theme();

	wp_enqueue_style( 'child-understrap-styles', get_stylesheet_directory_uri() . '/css/child-theme.min.css', array(), $the_theme->get( 'Version' ) );
	wp_enqueue_style( 'parent-style', get_stylesheet_directory_uri() . '/style.css', array(), $the_theme->get( 'Version' ) );
	

	if ( ! is_admin() ) {
		wp_deregister_script( 'jquery' );
		wp_register_script( 'jquery', includes_url( '/js/jquery/jquery.min.js' ), array(), null, true );
	}
	wp_enqueue_script( 'jquery' );

	wp_enqueue_script( 'child-understrap-scripts', get_stylesheet_directory_uri() . '/js/child-theme.min.js', array(), $the_theme->get( 'Version' ), true );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}

// Strip jquery-migrate now that we register our own jQuery build.
add_action( 'wp_default_scripts', 'jj_remove_jquery_migrate' );
function jj_remove_jquery_migrate( $scripts ) {
	if ( ! is_admin() && isset( $scripts->registered['jquery'] ) ) {
		$scripts->registered['jquery']->deps = array_diff( $scripts->registered['jquery']->deps, array( 'jquery-migrate' ) );
	}
}

/**
 * Theme setup
 */

add_action( 'after_setup_theme', 'add_child_theme_textdomain' );
function add_child_theme_textdomain() {
	load_child_theme_textdomain( 'understrap-child', get_stylesheet_directory() . '/languages' );
}

register_nav_menus( array(
	'primary'   => __( 'Primary Navigation', 'understrap' ),
	'secondary' => __( 'Secondary Navigation', 'understrap' ),
) );



/**
 * Shortcodes
 */

add_shortcode( 'wpb_childpages', 'wpb_list_child_pages' );
function wpb_list_child_pages() {
	global $post;

	$parent_id  = ( is_page() && $post->post_parent ) ? $post->post_parent : $post->ID;
	$childpages = wp_list_pages( 'sort_column=menu_order&title_li=&child_of=' . $parent_id . '&echo=0' );

	return $childpages ? '<ul class="wpb_page_list">' . $childpages . '</ul>' : '';
}