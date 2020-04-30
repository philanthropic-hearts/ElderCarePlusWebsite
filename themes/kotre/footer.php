<?php
/**
 * The template for displaying the footer.
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Kotre
 */

	/**
	 * Hook - kotre_after_content.
	 *
	 * @hooked kotre_after_content_action - 10
	 */
	do_action( 'kotre_after_content' );

?>

	<?php get_template_part( 'template-parts/footer-widgets' ); ?>
	
	<footer id="colophon" class="site-footer" role="contentinfo">
		<div class="container-full">
			<div class="site-footer-wrap">
				<?php

				$copyright_text = kotre_get_option( 'copyright_text' );

				if ( ! empty( $copyright_text ) ) : ?>

					<div class="copyright">

						<?php

						$copyright = kotre_apply_theme_shortcode( wp_kses_post( $copyright_text ) );

						echo do_shortcode( $copyright );

						?>

					</div><!-- .copyright -->

					<?php

				endif;

				do_action( 'kotre_credit' );
				?>
			</div>
		</div><!-- .container -->
	</footer><!-- #colophon -->
</div><!-- #page -->

<?php wp_footer(); ?>
</body>
</html>
