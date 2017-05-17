<?php
/**
 * Template for displaying search forms.
 *
 * @package   blanche
 * @copyright Mignon Style
 * @version   1.0
 */
?>

<?php $unique_id = esc_attr( uniqid( 'search-form-' ) ); ?>

<form role="search" method="get" class="search-form" action="<?php echo esc_url( home_url( '/' ) ); ?>">

	<label for="<?php echo $unique_id; ?>">
		<span class="screen-reader-text"><?php echo esc_html_x( 'Search for:', 'label', 'blanche' ); ?></span>
	</label>

	<input type="search" id="<?php echo $unique_id; ?>" class="search-field" placeholder="<?php echo esc_attr_x( 'Search', 'placeholder', 'blanche' ); ?>" value="<?php echo get_search_query(); ?>" name="s" />
	<button type="submit" class="search-submit">
		<?php echo wp_kses_post( blanche_set_default_icons( 'search' ) ); ?>
		<span class="screen-reader-text"><?php echo esc_html_x( 'Search', 'submit button', 'blanche' ); ?></span></button>
</form>