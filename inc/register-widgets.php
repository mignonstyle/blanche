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
	$footer_4_desc = __( 'Add widgets here will display in 4 sequntial footer widget areas. The width is auto-adjusted based on how many you use.', 'blanche' );

	register_sidebar( array(
		'name'          => __( 'Sidebar Top', 'blanche' ),
		'id'            => 'sidebar-widget-top',
		'description'   => __( 'Add widgets here will display it at the top of the sidebar.', 'blanche' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );

	register_sidebar( array(
		'name'          => __( 'Sidebar Bottom', 'blanche' ),
		'id'            => 'sidebar-widget-bottom',
		'description'   => __( 'Add widgets here will display it at the bottom of the sidebar.', 'blanche' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );

	register_sidebar( array(
		'name'          => __( 'Footer Top', 'blanche' ),
		'id'            => 'footer-widget-top',
		'description'   => __( 'Add widgets here will display it at the top of the footer.', 'blanche' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );

	register_sidebar( array(
		'name'          => __( 'Footer 1', 'blanche' ),
		'id'            => 'footer-widget-1',
		'description'   => $footer_4_desc,
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );

	register_sidebar( array(
		'name'          => __( 'Footer 2', 'blanche' ),
		'id'            => 'footer-widget-2',
		'description'   => $footer_4_desc,
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );

	register_sidebar( array(
		'name'          => __( 'Footer 3', 'blanche' ),
		'id'            => 'footer-widget-3',
		'description'   => $footer_4_desc,
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );

	register_sidebar( array(
		'name'          => __( 'Footer 4', 'blanche' ),
		'id'            => 'footer-widget-4',
		'description'   => $footer_4_desc,
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );
}
add_action( 'widgets_init', 'blanche_widgets_init' );

/**
 * Displays sidebar widgets if assigned.
 */
if ( ! function_exists( 'blanche_sidebar_widget' ) ) :
function blanche_sidebar_widget() {
	if ( is_active_sidebar( 'sidebar-widget-top' ) || is_active_sidebar( 'sidebar-widget-bottom' ) ) : ?>
	<aside id="secondary" class="widget-area sidebar-widget" role="complementary">
		<div class="widget-column sidebar-widget-top">
		<?php dynamic_sidebar( 'sidebar-widget-top' ); ?>
		</div>

		<div class="widget-column sidebar-widget-bottom">
		<?php dynamic_sidebar( 'sidebar-widget-bottom' ); ?>
		</div>
	</aside><!-- #secondary -->

	<?php endif;
}
endif;

/**
 * Displays footer widgets if assigned.
 */
if ( ! function_exists( 'blanche_footer_top_widgets' ) ) :
function blanche_footer_top_widgets() {
	if ( is_active_sidebar( 'footer-widget-top' ) ) {
		echo '<aside class="widget-area footer-widget-top" role="complementary">';
		dynamic_sidebar( 'footer-widget-top' );
		echo '</aside><!-- .widget-area -->';

	}
}
endif;

/**
 * Displays footer widget columns if assigned.
 */
if ( ! function_exists( 'blanche_footer_widget_columns' ) ) :
function blanche_footer_widget_columns() {
	if ( is_active_sidebar( 'footer-widget-1' ) || is_active_sidebar( 'footer-widget-2' ) || is_active_sidebar( 'footer-widget-3' ) || is_active_sidebar( 'footer-widget-4' ) ) {
		echo '<aside class="widget-area footer-widget-column" role="complementary">';

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

		if ( is_active_sidebar( 'footer-widget-3' ) ) {
			echo '<div class="widget-column footer-widget-3">';
			dynamic_sidebar( 'footer-widget-3' );
			echo '</div>';

		}

		if ( is_active_sidebar( 'footer-widget-4' ) ) {
			echo '<div class="widget-column footer-widget-4">';
			dynamic_sidebar( 'footer-widget-4' );
			echo '</div>';

		}

		echo '</aside><!-- .widget-area -->';
	}
}
endif;
