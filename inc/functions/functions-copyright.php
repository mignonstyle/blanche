<?php
/**
 * Custom template tag of copyright.
 *
 * @package   blanche
 * @copyright Mignon Style
 * @version   1.0
 */

/**
 * Display footer copyright.
 */
if ( ! function_exists( 'blanche_footer_copyright' ) ) :
function blanche_footer_copyright() {
	$theme_url     = 'http://mignonstyle.com/';
	$wordpress_url = 'https://wordpress.org/';

	echo '<div class="footer-copyright">';

	printf(
		esc_html__( '%1$s theme by %2$s', 'blanche' ),
		'Blanche',
		'<a href="' . $theme_url . '" rel="designer">Mignon Style</a>'
	);

	echo '<span class="sep"> | </span>';

	printf(
		esc_html__( 'Powered by %s', 'blanche' ),
		'<a href="' . $wordpress_url . '" rel="designer">WordPress</a>'
	);

	echo '</div><!-- .footer-copyright -->';
}
endif;
