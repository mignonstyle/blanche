<?php
/**
 * Functions and definitions for this theme
 *
 * @package   blanche
 * @copyright Mignon Style
 * @version   1.0
 */

/**
 * Sets up theme defaults and registers support
 */
function blanche_setup() {
	/*
	 * Make theme available for translation.
	 * Translations can be filed in the /languages/ directory.
	 */
	load_theme_textdomain( 'blanche', get_template_directory() . '/languages' );

	// Add default posts and comments RSS feed links to head.
	add_theme_support( 'automatic-feed-links' );

	// Let WordPress manage the document title.
	add_theme_support( 'title-tag' );

	/*
	 * Switch default core markup for search form, comment form, and comments
	 * to output valid HTML5.
	 */
	add_theme_support( 'html5', array(
		'search-form',
		'comment-form',
		'comment-list',
		'gallery',
		'caption',
	) );

	// Enable support for Post Formats.
	add_theme_support( 'post-formats', array(
		'aside',
		'image',
		'video',
		'quote',
		'link',
		'gallery',
		'audio',
	) );

	// Add theme support for Custom Logo.
	add_theme_support( 'custom-logo', array(
		'width'      => 250,
		'height'     => 250,
		'flex-width' => true,
	) );

	// Add theme support for selective refresh for widgets.
	add_theme_support( 'customize-selective-refresh-widgets' );

	// This theme styles the visual editor to resemble the theme style.
	add_editor_style( array( './editor-style.css' ) );
}
add_action( 'after_setup_theme', 'blanche_setup' );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function blanche_content_width() {
	$content_width = 525;

	$GLOBALS['content_width'] = apply_filters( 'blanche_content_width', $content_width );
}
add_action( 'template_redirect', 'blanche_content_width', 0 );

/**
 * Include files.
 */
//require get_parent_theme_file_path( '/inc/template-tags.php' );


foreach ( glob( get_parent_theme_file_path( '/inc/*.php' ) ) as $theme_files ) {
	require $theme_files;
}

foreach ( glob( get_parent_theme_file_path( '/inc/functions/*.php' ) ) as $theme_functions ) {
	require $theme_functions;
}

/*

foreach ( glob( MS_WCR_PATH . 'admin/widget/widget-settings/*.php' ) as $theme_functions ) {
			include_once $widget_item;
			$basename = basename( $widget_item, '.php' );
			$widget_name = preg_replace( '/^class\.widget\-(.+)$/', '$1', $basename );
			$class_name = MS_WCR_WIDGET_PREFIX . '_' . $widget_name;
			add_action( 'widgets_init', array( $class_name, 'init' ) );
		}

*/
