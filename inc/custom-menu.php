<?php
/**
 * Enable custom menu functions.
 *
 * @package   blanche
 * @copyright Mignon Style
 * @version   1.0
 */

/**
 * This theme uses wp_nav_menu().
 */
function blanche_custom_menu_setup() {
	register_nav_menus( array(
		'main'   => __( 'Main Menu', 'blanche' ),
		'top'    => __( 'Top Menu', 'blanche' ),
		'footer' => __( 'Footer Menu', 'blanche' ),
		'social' => __( 'Social Links Menu', 'blanche' ),
	) );
}
add_action( 'after_setup_theme', 'blanche_custom_menu_setup' );

/**
 * Display main navigation.
 */
if ( ! function_exists( 'blanche_main_navigation' ) ) :
function blanche_main_navigation() {
	if ( has_nav_menu( 'main' ) ) : ?>
		<div class="navigation-main">
			<nav id="site-navigation" class="main-navigation" role="navigation" aria-label="<?php esc_attr_e( 'Main Menu', 'blanche' ); ?>">
				<button class="menu-toggle" aria-controls="main-menu" aria-expanded="false"><?php
				echo wp_kses_post( blanche_set_default_icons( 'toggle-open' ) );
				echo wp_kses_post( blanche_set_default_icons( 'toggle-close' ) );
				esc_html_e( 'Menu', 'blanche' );
				?></button>

				<?php wp_nav_menu( array(
					'theme_location' => 'main',
					'menu_id'        => 'main-menu',
				) );

				// Display header scroll down to content.
				if ( ( ( is_front_page() && ! is_home() ) || ( is_home() && is_front_page() ) ) && has_custom_header() ) {
					blanche_scroll_content();
				} ?>
			</nav><!-- #site-navigation -->
		</div><!-- .navigation-top -->
	<?php endif;
}
endif;

/**
 * Display top navigation.
 */
if ( ! function_exists( 'blanche_top_navigation' ) ) :
function blanche_top_navigation() {
	if ( has_nav_menu( 'top' ) ) : ?>
		<nav class="top-navigation" role="navigation" aria-label="<?php esc_attr_e( 'Top Menu', 'blanche' ); ?>">
			<?php
				wp_nav_menu( array(
					'theme_location' => 'top',
					'menu_class'     => 'top-menu',
					'depth'          => 1,
				) );
			?>
		</nav><!-- .social-navigation -->
	<?php endif;
}
endif;

/**
 * Display footer navigation.
 */
if ( ! function_exists( 'blanche_footer_navigation' ) ) :
function blanche_footer_navigation() {
	if ( has_nav_menu( 'footer' ) ) : ?>
		<nav class="footer-navigation" role="navigation" aria-label="<?php esc_attr_e( 'Footer Menu', 'blanche' ); ?>">
			<?php
				wp_nav_menu( array(
					'theme_location' => 'footer',
					'menu_class'     => 'footer-menu',
					'depth'          => 1,
				) );
			?>
		</nav><!-- .social-navigation -->
	<?php endif;
}
endif;

/**
 * Display social navigation.
 */
if ( ! function_exists( 'blanche_social_navigation' ) ) :
function blanche_social_navigation() {
	if ( has_nav_menu( 'social' ) ) : ?>
		<nav class="social-navigation" role="navigation" aria-label="<?php esc_attr_e( 'Footer Social Links Menu', 'blanche' ); ?>">
			<?php
				$icon = blanche_set_default_icons( 'link' );

				wp_nav_menu( array(
					'theme_location' => 'social',
					'menu_class'     => 'social-links-menu',
					'depth'          => 1,
					'link_before'    => '<span class="screen-reader-text">' . $icon,
					'link_after'     => '</span>',
				) );
			?>
		</nav><!-- .social-navigation -->
	<?php endif;
}
endif;
