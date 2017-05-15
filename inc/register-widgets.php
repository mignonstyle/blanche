<?php
/**
 * Widget register widget function.
 *
 * @package   blanche
 * @copyright Mignon Style
 * @version   1.0
 */

/**
 * Register widget area.
 */
function blanche_widgets_init() {
	register_sidebar( array(
		'name'          => __( 'Sidebar', 'blanche' ),
		'id'            => 'sidebar-widget-1',
		'description'   => __( 'Add widgets here to appear in your sidebar.', 'blanche' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );

	register_sidebar( array(
		'name'          => __( 'Footer 1', 'blanche' ),
		'id'            => 'footer-widget-1',
		'description'   => __( 'Add widgets here to appear in your footer.', 'blanche' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );

	register_sidebar( array(
		'name'          => __( 'Footer 2', 'blanche' ),
		'id'            => 'footer-widget-2',
		'description'   => __( 'Add widgets here to appear in your footer.', 'blanche' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );
}
add_action( 'widgets_init', 'blanche_widgets_init' );

/**
 * Displays footer widgets if assigned
 */
if ( ! function_exists( 'blanche_footer_widgets' ) ) :
function blanche_footer_widgets() {
	if ( is_active_sidebar( 'footer-widget-1' ) || is_active_sidebar( 'footer-widget-2' ) ) {
		echo '<aside class="widget-area" role="complementary">';

		if ( is_active_sidebar( 'footer-widget-1' ) ) {
			echo '<div class="widget-column footer-widget-1">';
			dynamic_sidebar( 'footer-widget-1' );
			echo '</div>';

		}

		if ( is_active_sidebar( 'footer-widget-2' ) ) {
			echo '<div class="widget-column footer-widget-2">';
			dynamic_sidebar( 'footer-widget-2' );
			echo '</div>';

		}

		echo '</aside><!-- .widget-area -->';
	}
}
endif;
