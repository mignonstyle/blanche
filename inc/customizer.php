<?php
/**
 * Theme Customizer.
 *
 * @package   blanche
 * @copyright Mignon Style
 * @version   1.0
 */

/**
 * Add postMessage support for site title and description for the Theme Customizer.
 *
 * @param WP_Customize_Manager $wp_customize Theme Customizer object.
 */
function blanche_customize_register( $wp_customize ) {
	$wp_customize->get_setting( 'blogname' )->transport         = 'postMessage';
	$wp_customize->get_setting( 'blogdescription' )->transport  = 'postMessage';
	$wp_customize->get_setting( 'header_textcolor' )->transport = 'postMessage';

	$wp_customize->selective_refresh->add_partial( 'blogname', array(
		'selector' => '.site-title a',
		'render_callback' => 'blanche_customize_partial_blogname',
	) );
	$wp_customize->selective_refresh->add_partial( 'blogdescription', array(
		'selector' => '.site-description',
		'render_callback' => 'blanche_customize_partial_blogdescription',
	) );

	/**
	 * Custom colors.
	 */

}
add_action( 'customize_register', 'blanche_customize_register' );

/**
 * Render the site title for the selective refresh partial.
 */
function blanche_customize_partial_blogname() {
	bloginfo( 'name' );
}

/**
 * Render the site tagline for the selective refresh partial.
 */
function blanche_customize_partial_blogdescription() {
	bloginfo( 'description' );
}





















/**
 * Binds JS handlers to make Theme Customizer preview reload changes asynchronously.
 */
function blanche_customize_preview_js() {
	wp_enqueue_script( 'blanche-customizer-preview', get_template_directory_uri() . '/js/customize-preview.js', array( 'customize-preview' ), '1.0', true );
}
add_action( 'customize_preview_init', 'blanche_customize_preview_js' );
