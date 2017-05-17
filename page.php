<?php
/**
 * The template for displaying all pages.
 *
 * @package   blanche
 * @copyright Mignon Style
 * @version   1.0
 */

get_header(); ?>

<div class="wrap">
	<div id="primary" class="content-area">
		<main id="main" class="site-main" role="main">

			<?php
				// Start the Loop.
				while ( have_posts() ) : the_post();

					// Include the content template.
					get_template_part( 'template-parts/content', 'page' );

					// If comments are open or we have at least one comment, load up the comment template.
					if ( comments_open() || get_comments_number() ) {
						comments_template();
					}

				endwhile; // End of the loop.
			?>

		</main><!-- #main -->
	</div><!-- #primary -->

	<?php get_sidebar(); ?>
</div><!-- .wrap -->

<?php get_footer();
