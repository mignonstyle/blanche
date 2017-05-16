<?php
/**
 * The template for displaying comments.
 *
 * @package   blanche
 * @copyright Mignon Style
 * @version   1.0
 */

/*
 * If the current post is protected by a password and
 * the visitor has not yet entered the password we will
 * return early without loading the comments.
 */
if ( post_password_required() ) {
	return;
}
?>

<div id="comments" class="comments-area">

	<?php
	// You can start editing here -- including this comment!
	if ( have_comments() ) : ?>
		<h2 class="comments-title">
			<?php
				$comments_number = get_comments_number();
				if ( '1' === $comments_number ) {
					/* translators: %s: post title */
					printf( esc_attr_x( 'One Reply to &ldquo;%s&rdquo;', 'comments title', 'blanche' ), get_the_title() );
				} else {
					printf(
						/* translators: 1: number of comments, 2: post title */
						esc_html( _nx(
							'%1$s Reply to &ldquo;%2$s&rdquo;',
							'%1$s Replies to &ldquo;%2$s&rdquo;',
							$comments_number,
							'comments title',
							'blanche'
						),
						esc_html( number_format_i18n( $comments_number ) ),
						get_the_title()
					) );
				}
			?>
		</h2>

		<ol class="comment-list">
			<?php
				wp_list_comments( array(
					'avatar_size' => 100,
					'style'       => 'ol',
					'short_ping'  => true,
					'reply_text'  => blanche_set_default_icons( 'mail_reply' ) . __( 'Reply', 'blanche' ),
				) );
			?>
		</ol>

		<?php
		// Prints the comments paginate links.
		blanche_comments_pagination();

	endif; // Check for have_comments().

	// If comments are closed and there are comments, let's leave a little note, shall we?
	if ( ! comments_open() && get_comments_number() && post_type_supports( get_post_type(), 'comments' ) ) : ?>

		<p class="no-comments"><?php esc_html_e( 'Comments are closed.', 'blanche' ); ?></p>
	<?php
	endif;

	comment_form();
	?>

</div><!-- #comments -->
