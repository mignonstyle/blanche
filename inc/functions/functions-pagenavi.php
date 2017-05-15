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
 * Displays page-links for paginated posts. use <!--nextpage-->.
 */
if ( ! function_exists( 'blanche_post_nextpage' ) ) :
function blanche_post_nextpage() {
	$translated = __( 'Page', 'blanche' );

	wp_link_pages( array(
		'before'      => '<div class="page-links">',
		'after'       => '</div>',
		'link_before' => '<span class="numbers"><span class="screen-reader-text">' . $translated . ' </span>',
		'link_after'  => '</span>',
	) );
}
endif;
