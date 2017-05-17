<?php
/**
 * Enable icon functions.
 *
 * @package   blanche
 * @copyright Mignon Style
 * @version   1.0
 */

/**
 * Returns an array of supported social links (URL and icon name).
 */
function blanche_social_links_icons() {
	// Supported social links icons.
	$social_links_icons = array(
		'behance.net'     => 'behance',
		'codepen.io'      => 'codepen',
		'deviantart.com'  => 'deviantart',
		'digg.com'        => 'digg',
		'dribbble.com'    => 'dribbble',
		'dropbox.com'     => 'dropbox',
		'facebook.com'    => 'facebook',
		'flickr.com'      => 'flickr',
		'foursquare.com'  => 'foursquare',
		'plus.google.com' => 'google-plus',
		'github.com'      => 'github',
		'instagram.com'   => 'instagram',
		'linkedin.com'    => 'linkedin',
		'mailto:'         => 'envelope-o',
		'medium.com'      => 'medium',
		'pinterest.com'   => 'pinterest-p',
		'getpocket.com'   => 'get-pocket',
		'reddit.com'      => 'reddit-alien',
		'skype.com'       => 'skype',
		'skype:'          => 'skype',
		'slideshare.net'  => 'slideshare',
		'snapchat.com'    => 'snapchat-ghost',
		'soundcloud.com'  => 'soundcloud',
		'spotify.com'     => 'spotify',
		'stumbleupon.com' => 'stumbleupon',
		'tumblr.com'      => 'tumblr',
		'twitch.tv'       => 'twitch',
		'twitter.com'     => 'twitter',
		'vimeo.com'       => 'vimeo',
		'vine.co'         => 'vine',
		'vk.com'          => 'vk',
		'wordpress.org'   => 'wordpress',
		'wordpress.com'   => 'wordpress',
		'yelp.com'        => 'yelp',
		'youtube.com'     => 'youtube',
	);

	/**
	 * Filter social links icons.
	 * @param array $social_links_icons
	 */
	return apply_filters( 'blanche_social_links_icons', $social_links_icons );
}

/**
 * Returns an array of default icons.
 */
function blanche_default_icons() {
	$default_icons = array(
		'cat'          => 'folder-open',
		'tags'         => 'hashtag',
		'author'       => 'user',
		'date'         => 'calendar',
		'archive'      => 'archive',
		'file'         => 'file-o',
		'edit'         => 'pencil',
		'prev'         => 'arrow-left',
		'next'         => 'arrow-right',
		'sticky'       => 'thumb-tack',
		'scroll-down'  => 'arrow-right',
		'mail-reply'   => 'reply',
		'toggle-open'  => 'bars',
		'toggle-close' => 'times',
		'link'         => 'link',
		'comment'      => 'comment',
		'search'       => 'search',
		'play'         => 'play',
		'pause'        => 'pause',
	);

	/**
	 * Filter default icons.
	 */
	return apply_filters( 'blanche_default_icons', $default_icons );
}

/**
 * Display default icons.
 */
function blanche_set_default_icons( $item_output ) {
	$default_icons = blanche_default_icons();

	foreach ( $default_icons as $attr => $value ) {
		if ( false !== strpos( $item_output, $attr ) ) {
			$item_output = blanche_get_icon( array(
				'icon' => esc_attr( $value ),
			) );
		}
	}

	return $item_output;
}

/**
 * Displays icon font.
 */
if ( ! function_exists( 'blanche_get_icon' ) ) :
function blanche_get_icon( $args = array() ) {
	// Make sure $args are an array.
	if ( empty( $args ) ) {
		return;
	}

	// Set defaults.
	$defaults = array(
		'icon'        => '',
		'title'       => '',
		'desc'        => '',
		'fallback'    => false,
	);

	// Parse args.
	$args = wp_parse_args( $args, $defaults );

	// Set aria hidden.
	$aria_hidden = ' aria-hidden="true"';

	// Display the icon.
	$social_icon = '<i class="fa fa-' . esc_attr( $args['icon'] ) . '"' . $aria_hidden . '></i>';

	return $social_icon;
}
endif;

/**
 * Display icons in social links menu.
 */
function blanche_nav_menu_social_icons( $item_output, $item, $depth, $args ) {
	// Get supported social icons.
	$social_icons = blanche_social_links_icons();

	// Change icon inside social links menu if there is supported URL.
	if ( 'social' === $args->theme_location ) {
		foreach ( $social_icons as $attr => $value ) {
			if ( false !== strpos( $item_output, $attr ) ) {
				$item_output = str_replace( $args->link_before, '<span class="screen-reader-text">' . blanche_get_icon( array(
					'icon' => esc_attr( $value ),
				) ), $item_output );
			}
		}
	}

	return $item_output;
}
add_filter( 'walker_nav_menu_start_el', 'blanche_nav_menu_social_icons', 10, 4 );
