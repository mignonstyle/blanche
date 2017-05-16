<?php
/**
 * Custom template tag of paginavi.
 *
 * @package   blanche
 * @copyright Mignon Style
 * @version   1.0
 */

/**
 * Display posts pagination.
 */
if ( ! function_exists( 'blanche_posts_pagination' ) ) :
function blanche_posts_pagination() {
	$args = array(
		'mid_size'           => 1,
		'prev_text'          => blanche_set_default_icons( 'prev' ) . '<span class="screen-reader-text">' . __( 'Previous', 'blanche' ) . '</span>',
		'next_text'          => '<span class="screen-reader-text">' . __( 'Next', 'blanche' ) . '</span>' . blanche_set_default_icons( 'next' ),
		'before_page_number' => '<span class="meta-nav screen-reader-text">' . __( 'Page', 'blanche' ) . ' </span>',
	);

	$args = apply_filters( 'blanche_posts_pagination_array', $args );

	echo '<div class="page-nav">';
	the_posts_pagination( $args );
	echo '</div>';
}
endif;

/**
 * Displays the navigation to next/previous post, when applicable.
 */
if ( ! function_exists( 'blanche_post_navigation' ) ) :
function blanche_post_navigation() {
	$nav_text = '<span class="screen-reader-text">%1$s</span><span aria-hidden="true" class="nav-subtitle">%2$s</span>';

	$prev_text = sprintf(
		$nav_text,
		__( 'Previous Post', 'blanche' ),
		__( 'Previous', 'blanche' )
	);

	$next_text = sprintf(
		$nav_text,
		__( 'Next Post', 'blanche' ),
		__( 'Next', 'blanche' )
	);

	$args = array(
		'prev_text' => $prev_text . '<span class="nav-title"><span class="nav-title-icon-wrapper">' . blanche_set_default_icons( 'prev' ) . '</span>%title</span>',
		'next_text' => $next_text . '<span class="nav-title">%title<span class="nav-title-icon-wrapper">' . blanche_set_default_icons( 'next' ) . '</span></span>',
	);

	echo '<div class="page-nav">';
	the_post_navigation( $args );
	echo '</div>';
}
endif;

/**
 * Displays page-links for paginated posts. use <!--nextpage-->.
 */
if ( ! function_exists( 'blanche_post_nextpage' ) ) :
function blanche_post_nextpage() {
	$translated = __( 'Page', 'blanche' );

	$args = array(
		'before'      => '<div class="page-links">',
		'after'       => '</div>',
		'link_before' => '<span class="numbers"><span class="screen-reader-text">' . $translated . ' </span>',
		'link_after'  => '</span>',
	);

	wp_link_pages( $args );
}
endif;

/**
 * Prints the comments paginate links.
 */
if ( ! function_exists( 'blanche_comments_pagination' ) ) :
function blanche_comments_pagination() {
	$nav_text = '<span class="screen-reader-text">%s</span>';

	$prev_text = sprintf(
		$nav_text,
		__( 'Previous', 'blanche' )
	);

	$next_text = sprintf(
		$nav_text,
		__( 'Next', 'blanche' )
	);

	$args = array(
		'prev_text' => blanche_set_default_icons( 'prev' ) . $prev_text,
		'next_text' => $next_text . blanche_set_default_icons( 'next' ),
		'type'      => 'plain',
	);

	echo '<div class="pagination cf"><div class="page-links">';
	the_comments_pagination( $args );
	echo '</div></div>';
}
endif;
