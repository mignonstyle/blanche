<?php
/**
 * The template for displaying the footer
 *
 * @package   blanche
 * @copyright Mignon Style
 * @version   1.0
 */
?>
	</div><!-- #content -->

	<footer id="colophon" class="site-footer" role="contentinfo">
		<?php
		// Displays footer widgets if assigned.
		blanche_footer_widgets();

		// Display footer navigation.
		blanche_footer_navigation();

		// Displays social navigation.
		blanche_social_navigation();

		// Displays footer copyright.
		blanche_footer_copyright(); ?>
	</footer><!-- #colophon -->
</div><!-- #page -->

<?php wp_footer(); ?>

</body>
</html>
