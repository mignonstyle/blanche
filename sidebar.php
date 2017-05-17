<?php
/**
 * The sidebar containing the main widget area
 *
 * @package   blanche
 * @copyright Mignon Style
 * @version   1.0
 */

if ( ! is_active_sidebar( 'sidebar-widget-1' ) ) {
	return;
}
?>

<aside id="secondary" class="widget-area" role="complementary">
	<?php dynamic_sidebar( 'sidebar-widget-1' ); ?>
</aside><!-- #secondary -->
