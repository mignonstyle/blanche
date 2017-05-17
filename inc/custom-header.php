<?php
/**
 * Custom header implementation.
 *
 * @package   blanche
 * @copyright Mignon Style
 * @version   1.0
 */

/**
 * Set up the WordPress core custom header feature.
 *
 * @uses blanche_header_style()
 */
function blanche_custom_header_setup() {
	$defaults = array(
		'default-image'      => get_parent_theme_file_uri( '/images/header/header.jpg' ),
		'width'              => 2000,
		'height'             => 1200,
		'flex-height'        => true,
		'flex-width'         => true,
		'video'              => true,
		'wp-head-callback'   => 'blanche_header_style',
		'default-text-color' => '000000',
	);

	add_theme_support( 'custom-header', apply_filters( 'blanche_custom_header_args', $defaults ) );

	register_default_headers( array(
		'default-image' => array(
			'url'           => '%s/images/header/header.jpg',
			'thumbnail_url' => '%s/images/header/header.jpg',
			'description'   => __( 'Default Header Image', 'blanche' ),
		),
	) );
}
add_action( 'after_setup_theme', 'blanche_custom_header_setup' );

/**
 * Styles the header image and text displayed on the blog.
 *
 * @see blanche_custom_header_setup().
 */
if ( ! function_exists( 'blanche_header_style' ) ) :
function blanche_header_style() {
	$header_text_color = get_header_textcolor();

	// If no custom options for text are set, let's bail.
	// get_header_textcolor() options: add_theme_support( 'custom-header' ) is default, hide text (returns 'blank') or any hex value.
	if ( get_theme_support( 'custom-header', 'default-text-color' ) === $header_text_color ) {
		return;
	}

	// If we get this far, we have custom styles. Let's do this.
	?>
	<style id="blanche-custom-header-styles" type="text/css">
	<?php
		// Has the text been hidden?
		if ( 'blank' === $header_text_color ) :
	?>
		.site-title,
		.site-description {
			position: absolute;
			clip: rect(1px, 1px, 1px, 1px);
		}
	<?php
		// If the user has set a custom color for the text use that.
		else :
	?>
		.site-title a,
		.site-description {
			color: #<?php echo esc_attr( $header_text_color ); ?>;
		}
	<?php endif; ?>
	</style>
	<?php
}
endif;

/**
 * Customize video play/pause button in the custom header.
 */
function blanche_video_controls( $settings ) {
	$settings['l10n']['play'] = '<span class="screen-reader-text">' . __( 'Play background video', 'blanche' ) . '</span>' . blanche_set_default_icons( 'play' );
	$settings['l10n']['pause'] = '<span class="screen-reader-text">' . __( 'Pause background video', 'blanche' ) . '</span>' . blanche_set_default_icons( 'pause' );

	return $settings;
}
add_filter( 'header_video_settings', 'blanche_video_controls' );
