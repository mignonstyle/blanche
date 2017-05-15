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
		'author'      => 'user',
		'date'        => 'calendar',
		'edit'        => 'pencil',
		'cat'         => 'folder-open',
		'tags'        => 'hashtag',
		'prev'        => 'arrow-left',
		'next'        => 'arrow-right',
		'sticky'      => 'thumb-tack',
		'scroll_down' => 'arrow-right',
	);

	/**
	 * Filter default icons.
	 */
	return apply_filters( 'blanche_default_icons', $default_icons );
}
