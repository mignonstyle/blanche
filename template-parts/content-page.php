<?php
/**
 * Template part for displaying page content in page.
 *
 * @package   blanche
 * @copyright Mignon Style
 * @version   1.0
 */
?>
<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<?php
	// Display the entry header.
	blanche_entry_header();

	// Prints the entry content.
	blanche_entry_content();
	?>
</article><!-- #post-## -->
