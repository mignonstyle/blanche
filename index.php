<?php
/**
 * The main template file.
 *
 * @package   blanche
 * @copyright Mignon Style
 * @version   1.0
 */

get_header(); ?>

<div class="wrap">
	<?php
	// Display the page header.
	blanche_page_header();
	?>

	<div id="primary" class="content-area">
		<main id="main" class="site-main" role="main">

			<?php
			if ( have_posts() ) :
				// Start the Loop.
				while ( have_posts() ) : the_post();

					// Include the content template.
					get_template_part( 'template-parts/content' );

				endwhile; // End of the loop.

				// Displays the navigation of posts.
				blanche_posts_pagination();

			else :

				// Include the content none template.
				get_template_part( 'template-parts/content', 'none' );

			endif; ?>

		</main><!-- #main -->
	</div><!-- #primary -->

	<?php get_sidebar(); ?>
</div><!-- .wrap -->

<?php get_footer();
