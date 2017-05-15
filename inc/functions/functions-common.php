<?php
/**
 * The header for our theme
 *
 * @package   blanche
 * @copyright Mignon Style
 * @version   1.0
 */

/**
 * prints head prefix.
 */
if ( ! function_exists( 'blanche_head_prefix' ) ) :
function blanche_head_prefix() {
	if ( is_single() || is_page() ) {
		$head_prefix_fb = 'fb: http://ogp.me/ns/fb# article: http://ogp.me/ns/article#';

	} else {
		$head_prefix_fb = 'fb: http://ogp.me/ns/fb# website: http://ogp.me/ns/website#';

	}

	$head_prefix = 'og: http://ogp.me/ns# ' . $head_prefix_fb;
	$head_prefix = apply_filters( 'blanche_head_prefix_text', $head_prefix );

	return $head_prefix;
}
endif;
