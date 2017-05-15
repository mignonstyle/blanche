<?php
/**
 * Custom template tag of header.
 *
 * @package   blanche
 * @copyright Mignon Style
 * @version   1.0
 */

/**
 * Display the markup for a custom header.
 */
if ( ! function_exists( 'blanche_header_image' ) ) :
function blanche_header_image() {
?>
	<div class="custom-header-media">
		<?php
		the_custom_header_markup();
		?>
	</div>
<?php
}
endif;

/**
 * Display header site branding.
 */
if ( ! function_exists( 'blanche_site_header_branding' ) ) :
function blanche_site_header_branding() {
?>
	<div class="site-branding">
		<?php
		// Display a custom logo, linked to home.
		the_custom_logo();
		?>

		<div class="site-branding-text">
			<?php
			// Display header site branding title.
			blanche_site_header_title();

			// Display header site branding description.
			blanche_site_header_description();
			?>
		</div><!-- .site-branding-text -->

		<?php
		// Display header scroll down to content.
		if ( ( ( is_front_page() && ! is_home() ) || ( is_home() && is_front_page() ) ) && ! has_nav_menu( 'top' ) ) {
			blanche_scroll_content();
		}
	?>
	</div><!-- .site-branding -->
<?php
}
endif;

/**
 * Display header site branding title.
 */
if ( ! function_exists( 'blanche_site_header_title' ) ) :
function blanche_site_header_title() {
	if ( is_front_page() ) : ?>
		<h1 class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></h1>
	<?php else : ?>
		<p class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></p>
	<?php endif;
}
endif;

/**
 * Display header site branding description.
 */
if ( ! function_exists( 'blanche_site_header_description' ) ) :
function blanche_site_header_description() {
	$description = get_bloginfo( 'description', 'display' );

	if ( $description || is_customize_preview() ) : ?>
		<p class="site-description"><?php echo $description; ?></p>
	<?php endif;
}
endif;

/**
 * Display header scroll down to content.
 */
if ( ! function_exists( 'blanche_scroll_content' ) ) :
function blanche_scroll_content() {
	?>
	<a href="#content" class="menu-scroll-down"><?php echo blanche_set_default_icons( 'scroll_down' ); ?><span class="screen-reader-text"><?php _e( 'Scroll down to content', 'blanche' ); ?></span></a>
	<?php
}
endif;