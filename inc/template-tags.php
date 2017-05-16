<?php
/**
 * Custom template tags for this theme.
 *
 * @package   blanche
 * @copyright Mignon Style
 * @version   1.0
 */

/**
 * Entry meta date time.
 */
if ( ! function_exists( 'blanche_entry_meta_date' ) ) :
function blanche_entry_meta_date() {
	$time_string = '<time class="entry-date published updated" datetime="%1$s">%2$s</time>';
	if ( get_the_time( 'U' ) !== get_the_modified_time( 'U' ) ) {
		$time_string = '<time class="entry-date published" datetime="%1$s">%2$s</time><time class="updated" datetime="%3$s">%4$s</time>';
	}

	$time_string = sprintf( $time_string,
		get_the_date( DATE_W3C ),
		get_the_date(),
		get_the_modified_date( DATE_W3C ),
		get_the_modified_date()
	);

	$time_text = sprintf(
		__( '<span class="screen-reader-text">Posted on</span> %s', 'blanche' ),
		'<a href="' . esc_url( get_permalink() ) . '" rel="bookmark">' . $time_string . '</a>'
	);

	echo '<span class="entry-meta-date  entry-metadata">';
	echo wp_kses_post( blanche_set_default_icons( 'date' ) );
	echo wp_kses_post( $time_text );
	echo '</span>';
}
endif;

/**
 * Entry meta author.
 */
if ( ! function_exists( 'blanche_entry_meta_author' ) ) :
function blanche_entry_meta_author() {
	echo '<span class="entry-meta-author  entry-metadata">';
	echo wp_kses_post( blanche_set_default_icons( 'author' ) );

	// Get the author name; wrap it in a link.
	echo '<span class="author vcard"><a class="url fn n" href="' . esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ) . '">' . esc_html( get_the_author() ) . '</a></span>';

	echo '</span>';
}
endif;

/**
 * Entry meta categorys.
 */
if ( ! function_exists( 'blanche_entry_meta_cat' ) ) :
function blanche_entry_meta_cat( $categories_list = '' ) {
	if ( empty( $categories_list ) ) {
		// Get Categories for posts.
		$categories_list = get_the_category_list( esc_html__( ', ', 'blanche' ) );
	}

	if ( $categories_list && blanche_categorized_blog() ) {
		echo '<span class="cat-links">';
		echo wp_kses_post( blanche_set_default_icons( 'cat' ) ) . '<span class="screen-reader-text">' . esc_html__( 'Categories', 'blanche' ) . '</span>' . wp_kses_post( $categories_list );
		echo '</span>';
	}
}
endif;

/**
 * Entry meta tags.
 */
if ( ! function_exists( 'blanche_entry_meta_tags' ) ) :
function blanche_entry_meta_tags( $tags_list = '' ) {
	// Get Tags for posts.
	$tags_list = get_the_tag_list( '', esc_html__( ', ', 'blanche' ) );

	if ( $tags_list ) {
		echo '<span class="tags-links">';
		echo wp_kses_post( blanche_set_default_icons( 'tags' ) ) . '<span class="screen-reader-text">' . esc_html__( 'Tags', 'blanche' ) . '</span>' . wp_kses_post( $tags_list );
		echo '</span>';
	}
}
endif;

/**
 * Entry meta edit.
 */
if ( ! function_exists( 'blanche_entry_meta_edit' ) ) :
function blanche_entry_meta_edit() {
	edit_post_link(
		sprintf(
			/* translators: %s: Name of current post */
			__( 'Edit<span class="screen-reader-text"> "%s"</span>', 'blanche' ),
			get_the_title()
		),
		'<span class="entry-meta-edit entry-metadata edit-link">' . blanche_set_default_icons( 'edit' ),
		'</span>'
	);
}
endif;

/**
 * Entry meta comments link.
 */

/*
// Entry meta
if ( ! function_exists( 'blanche_entry_meta_comments_link' ) ) :
function blanche_entry_meta_comments_link() {
	if (  is_singular() ) {
		return false;
	}

	$meta_icon = blanche_meta_comments_icon();

	if ( ! post_password_required() && ( comments_open() || get_comments_number() ) ) {
		echo '<span class="entry-meta-comments entry-metadata comments-link">';
		echo wp_kses( $meta_icon, blanche_wp_kses_allowed_html_icon() );
		// translators: %s: post title.
		comments_popup_link( sprintf( wp_kses( __( '<span class="screen-reader-text"> on %s</span>', 'blanche' ), array( 'span' => array( 'class' => array() ) ) ), get_the_title() ) );
		echo '</span>';
	}
}
endif;
*/

/**
 * Returns true if a blog has more than 1 category.
 */
if ( ! function_exists( 'blanche_categorized_blog' ) ) :
function blanche_categorized_blog() {
	$category_count = get_transient( 'blanche_categories' );

	if ( false === $category_count ) {
		// Create an array of all the categories that are attached to posts.
		$categories = get_categories( array(
			'fields'     => 'ids',
			'hide_empty' => 1,
			// We only need to know if there is more than one category.
			'number'     => 2,
		) );

		// Count the number of categories that are attached to the posts.
		$category_count = count( $categories );

		set_transient( 'blanche_categories', $category_count );
	}

	if ( $category_count > 1 ) {
		// This blog has more than 1 category so blanche_categorized_blog should return true.
		return true;
	} else {
		// This blog has only 1 category so blanche_categorized_blog should return false.
		return false;
	}
}
endif;
