<?php
/**
 * Thumbnails settings.
 *
 * @package   blanche
 * @copyright Mignon Style
 * @version   1.0
 */

/**
 * Enable support for Post Thumbnails on posts and pages.
 */
function blanche_setup_thumbnails() {
	add_theme_support( 'post-thumbnails' );

	// Set the default Featured Image (formerly Post Thumbnail) dimensions.
	set_post_thumbnail_size( 300, 300, true );

	// Register a new image size.
	add_image_size( 'blanche-featured-image', 2000, 1200, true );
	add_image_size( 'blanche-thumbnail-avatar', 100, 100, true );
}
add_action( 'after_setup_theme', 'blanche_setup_thumbnails' );

/**
 * Display the featured image.
 */
if ( ! function_exists( 'blanche_featured_image' ) ) :
function blanche_featured_image() {
	// If a regular post or page, and not the front page, show the featured image.
	if ( has_post_thumbnail() && ( is_single() || ( is_page() && ! ( is_front_page() && ! is_home() ) ) ) ) : ?>
		<div class="single-featured-image-header">
			<?php the_post_thumbnail( 'blanche-featured-image' ); ?>
		</div><!-- .single-featured-image-header -->
	<?php endif;
}
endif;

/**
 * Display the blanche post thumbnail link.
 */
if ( ! function_exists( 'blanche_post_thumbnail_link' ) ) :
function blanche_post_thumbnail_link() {
	if ( '' !== get_the_post_thumbnail() && ! is_single() ) :
	?>
	<div class="post-thumbnail">
		<a href="<?php the_permalink(); ?>">
			<?php the_post_thumbnail( 'blanche-featured-image' ); ?>
		</a>
	</div><!-- .post-thumbnail -->
	<?php endif;
}
endif;
