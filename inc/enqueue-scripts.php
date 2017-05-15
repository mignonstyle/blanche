<?php
/**
 * Enqueue scripts and styles.
 *
 * @package   blanche
 * @copyright Mignon Style
 * @version   1.0
 */

/**
 * Enqueue scripts and styles.
 */
function blanche_enqueue_scripts() {
	$url     = get_template_directory_uri();
	$theme   = wp_get_theme();
	$version = $theme->get( 'Version' );

	// font-awesome.
	wp_enqueue_style( 'blanche-fonts', $url . '/assets/font-awesome/css/font-awesome.min.css', array(), null );

	// Theme stylesheet.
	wp_enqueue_style( 'blanche-style', $url . '/style.css', array(), $version );

	// comment reply.
	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'blanche_enqueue_scripts' );

/**
 * Adds extra scripts and styles.
 */
if ( ! function_exists( 'blanche_enqueue_inline_scripts' ) ) :
function blanche_enqueue_inline_scripts() {
	/*
	$custom_css = '
		.body {
			background: blue;
		}';
	wp_add_inline_style( 'blanche-base', $custom_css, 2 );
	*/
}
endif;
add_action( 'wp_enqueue_scripts', 'blanche_enqueue_inline_scripts' );
