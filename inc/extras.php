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
