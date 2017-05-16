<?php
/**
 * The header for our theme
 *
 * @package   blanche
 * @copyright Mignon Style
 * @version   1.0
 */

?><!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head<?php echo ( ! empty( blanche_head_prefix() ) ) ? ' prefix="' . esc_attr( blanche_head_prefix() ) . '"' : ''; ?>>
<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<div id="page" class="site">
	<a class="skip-link screen-reader-text" href="#content"><?php esc_html_e( 'Skip to content', 'blanche' ); ?></a>

	<header id="masthead" class="site-header" role="banner">
		<div class="custom-header">
			<?php
			// Print the markup for a custom header.
			blanche_header_image();

			// Display header site branding.
			blanche_site_header_branding();
			?>
		</div><!-- .custom-header -->

		<?php
		// Display main navigation.
		blanche_main_navigation();
		?>
	</header><!-- #masthead -->

	<?php
	// If a regular post or page, and not the front page, show the featured image.
	blanche_featured_image();
	?>

	<div id="content" class="site-content">
