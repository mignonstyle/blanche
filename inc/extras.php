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
 * Change display of archive title.
 */
function blanche_get_the_archive_title( $title ) {
	if ( is_category() ) {
		$title = single_cat_title( '', false );

	} elseif ( is_tag() ) {
		$title = single_tag_title( '', false );

	} elseif ( is_author() ) {
		$title = '<span class="vcard">' . get_the_author() . '</span>';

	} elseif ( is_year() ) {
		$title = get_the_date( _x( 'Y', 'yearly archives date format' ) );

	} elseif ( is_month() ) {
		$title = get_the_date( _x( 'F Y', 'monthly archives date format' ) );

	} elseif ( is_day() ) {
		$title = get_the_date( _x( 'F j, Y', 'daily archives date format' ) );

	} elseif ( is_post_type_archive() ) {
		$title = post_type_archive_title( '', false );

	}

	return $title;
}
add_action( 'get_the_archive_title', 'blanche_get_the_archive_title' );













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
	Comment
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
