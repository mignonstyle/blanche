<?php
/**
 * Custom template tag of posts.
 *
 * @package   blanche
 * @copyright Mignon Style
 * @version   1.0
 */

/**
 * Display the entry header.
 */
if ( ! function_exists( 'blanche_entry_header' ) ) :
function blanche_entry_header() {
	echo '<header class="entry-header">';

	if ( 'post' === get_post_type() ) {
		echo '<div class="entry-meta">';

			if ( is_single() ) {
				// Prints HTML with meta information for the current post-date.
				blanche_posted_on();
			} else {
				// Entry meta date time.
				blanche_entry_meta_date();

				// Entry meta edit.
				blanche_entry_meta_edit();
			}

		echo '</div><!-- .entry-meta -->';
	}

	// Prints the post title.
	blanche_entry_title();

	echo '</header><!-- .entry-header -->';
}
endif;

/**
 * Prints the post title.
 */
if ( ! function_exists( 'blanche_entry_title' ) ) :
function blanche_entry_title() {
	if ( is_singular() ) {
		the_title( '<h2 class="entry-title">', '</h2>' );

	} elseif ( is_front_page() && is_home() ) {
		the_title( '<h3 class="entry-title"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h3>' );

	} else {
		the_title( '<h2 class="entry-title"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h2>' );

	}
}
endif;

/**
 * Prints HTML with meta information for the current post-date.
 */
if ( ! function_exists( 'blanche_posted_on' ) ) :
function blanche_posted_on() {
	echo '<span class="posted-on">';

	// Entry meta author.
	blanche_entry_meta_author();

	// Entry meta date time.
	blanche_entry_meta_date();

	echo '</span>';
}
endif;

/**
 * Prints the entry content.
 */
if ( ! function_exists( 'blanche_entry_content' ) ) :
function blanche_entry_content() {
	echo '<div class="entry-content">';

	// Display entry content post.
	blanche_entry_content_post();

	// Displays page-links for paginated posts.
	blanche_post_nextpage();

	echo '</div><!-- .entry-content -->';
}
endif;

/**
 * Display entry content post.
 */
if ( ! function_exists( 'blanche_entry_content_post' ) ) :
function blanche_entry_content_post() {
	the_content( sprintf(
		__( 'Continue reading<span class="screen-reader-text"> "%s"</span>', 'blanche' ),
		get_the_title()
	) );
}
endif;

/**
 * Prints HTML with meta information for the categories, tags and comments.
 */
if ( ! function_exists( 'blanche_entry_footer' ) ) :
function blanche_entry_footer() {

	/* translators: used between list items, there is a space after the comma */
	$separate_meta = __( ', ', 'blanche' );

	// Get Categories for posts.
	$categories_list = get_the_category_list( $separate_meta );

	// Get Tags for posts.
	$tags_list = get_the_tag_list( '', $separate_meta );

	// We don't want to output .entry-footer if it will be empty, so make sure its not.
	if ( ( ( blanche_categorized_blog() && $categories_list ) || $tags_list ) || get_edit_post_link() ) {

		echo '<footer class="entry-footer">';

			if ( 'post' === get_post_type() ) {
				if ( ( $categories_list && blanche_categorized_blog() ) || $tags_list ) {
					echo '<span class="cat-tags-links">';

						// Entry meta categorys.
						blanche_entry_meta_cat( $categories_list );

						// Entry meta tags.
						blanche_entry_meta_tags( $tags_list );
					echo '</span>';
				}
			}

			blanche_entry_meta_edit();

		echo '</footer> <!-- .entry-footer -->';
	}
}
endif;

/**
 * Print of the page header.
 */
if ( ! function_exists( 'blanche_post_header' ) ) :
function blanche_post_header() {
	if ( is_search() ) {
		$pege_title_text = sprintf( __( 'Search Results for: %s', 'blanche' ), '<span>' . get_search_query() . '</span>' );

	} else if ( is_archive() ) {
		$blanche_meta_icon = blanche_meta_icon();
		$pege_title_text = $blanche_meta_icon . get_the_archive_title();

	} else if ( is_404() ) {
		$pege_title_text = __( '404 Not found', 'blanche' );

	} else {
		$pege_title_text = __( 'Nothing Found', 'blanche' );

	}
	?>
	<header class="page-header">
		<h1 class="page-title"><?php echo esc_html( $pege_title_text ); ?></h1>
	</header>
	<?php
}
endif;

/**
 * Print of the content of no posts and 404 page.
 */
if ( ! function_exists( 'blanche_no_post_content' ) ) :
function blanche_no_post_content() {
	$content_text = '';
	$search_form = true;

	if ( is_home() && current_user_can( 'publish_posts' ) ) {
		$content_text = sprintf( __( 'Ready to publish your first post? <a href="%1$s">Get started here</a>.', 'blanche' ), esc_url( admin_url( 'post-new.php' ) ) );

		$search_form = false;

	} elseif ( is_404() ) {
		?>
		test
		<?php

		/*
		// Comments
		$no_post_404_text = __( 'It looks like nothing was found at this location. Maybe try one of the links below or a search?', 'blanche' );
		$no_post_text = apply_filters( 'blanche_no_post_404_text', $no_post_404_text );

		$search_form = 'true';
		*/

	} elseif ( is_search() ) {
		?>
		test
		<?php

		/*
		// Comments
		$no_post_search_text = __( 'Sorry, but nothing matched your search terms. Please try again with some different keywords.', 'blanche' );
		$no_post_text = apply_filters( 'blanche_no_post_search_text', $no_post_search_text );

		$search_form = 'true';
		*/

	} else {
		$content_text = __( 'It seems we can&rsquo;t find what you&rsquo;re looking for. Perhaps searching can help.', 'blanche' );

	}

	?>
	<div class="page-content">
		<p><?php echo esc_html( $content_text ); ?></p>
		<?php
		if ( $search_form ) {
			get_search_form();
		}
		?>
	</div><!-- .page-content -->
	<?php
}
endif;
