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
	<?php if ( is_home() && ! is_front_page() ) : ?>
		<header class="page-header">
			<h1 class="page-title"><?php single_post_title(); ?></h1>
		</header>
	<?php else : ?>
	<header class="page-header">
		<h2 class="page-title"><?php esc_html_e( 'Posts', 'blanche' ); ?></h2>
	</header>
	<?php endif; ?>

	<div id="primary" class="content-area">
		<main id="main" class="site-main" role="main">

			<?php
			if ( have_posts() ) :
				// Start the Loop.
				while ( have_posts() ) : the_post();

					// Include the content template.
					get_template_part( 'template-parts/content' );

				endwhile;

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
