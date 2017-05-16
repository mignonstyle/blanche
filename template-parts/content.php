<?php
/**
 * Template part for displaying posts.
 *
 * @package   blanche
 * @copyright Mignon Style
 * @version   1.0
 */
?>
<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<?php

	if ( is_sticky() && is_home() ) {
		echo wp_kses_post( blanche_set_default_icons( 'sticky' ) );
	}

	// Display the entry header.
	blanche_entry_header();

	// Display the blanche post thumbnail link.
	blanche_post_thumbnail_link();

	// Prints the entry content.
	blanche_entry_content();

	if ( is_single() ) {
		// Prints HTML with meta information.
		blanche_entry_footer();
	} ?>
</article><!-- #post-## -->
