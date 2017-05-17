<?php
/**
 * The template for displaying 404 pages (not found).
 *
 * @package   blanche
 * @copyright Mignon Style
 * @version   1.0
 */

get_header(); ?>

<div class="wrap">
	<div id="primary" class="content-area">
		<main id="main" class="site-main" role="main">

			<section class="error-404 not-found">
				<?php
				// Display the page header.
				blanche_page_header();

				// Print of the content of no posts and 404 page.
				blanche_no_post_content();
				?>
				</div><!-- .page-content -->
			</section><!-- .error-404 -->
		</main><!-- #main -->
	</div><!-- #primary -->
</div><!-- .wrap -->

<?php get_footer();
