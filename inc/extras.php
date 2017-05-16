<?php
/**
 * Custom functions that act independently of the theme templates.
 *
 * @package   blanche
 * @copyright Mignon Style
 * @version   1.0
 */

/**
 * Add a pingback url auto-discovery header for singularly identifiable articles.
 */
function blanche_pingback_header() {
	echo '<meta charset="' . esc_attr( get_bloginfo( 'charset' ) ) . '">' . "\n";
	echo '<meta name="viewport" content="width=device-width, initial-scale=1">' . "\n";
	echo '<link rel="profile" href="http://gmpg.org/xfn/11">' . "\n";

	if ( is_singular() && pings_open() ) {
		echo '<link rel="pingback" href="', bloginfo( 'pingback_url' ), '">' . "\n";

	}
}
add_action( 'wp_head', 'blanche_pingback_header', -9999 );

/**
 * Specify the number of characters in the excerpt.
 */
if ( ! function_exists( 'blanche_excerpt_length' ) ) :
function blanche_excerpt_length( $length ) {
	/*
	$length = 100;

	return $length;
	*/
}
endif;
add_filter( 'excerpt_mblength', 'blanche_excerpt_length' );
add_filter( 'excerpt_length',   'blanche_excerpt_length' );

/**
 * Change the last character of the excerpt [...].
 */

if ( ! function_exists( 'blanche_excerpt_more' ) ) :
function blanche_excerpt_more( $link ) {
	/*
	if ( is_admin() ) {
		return $link;
	}


	$link = __( '&nbsp;&hellip;', 'blanche' );

$link = 'hogehoge';
	return $link;
	*/
}
endif;
add_filter( 'excerpt_more', 'blanche_excerpt_more' );
