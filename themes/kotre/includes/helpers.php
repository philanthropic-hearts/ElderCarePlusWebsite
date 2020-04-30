<?php
/**
 * Helper functions.
 *
 * @package Kotre
 */

if ( ! function_exists( 'kotre_get_the_excerpt' ) ) :

	/**
	 * Returns post excerpt.
	 *
	 * @since 1.0.0
	 *
	 * @param int     $length      Excerpt length in words.
	 * @param WP_Post $post_object The post object.
	 * @return string Post excerpt.
	 */
	function kotre_get_the_excerpt( $length = 0, $post_object = null ) {
		global $post;

		if ( is_null( $post_object ) ) {
			$post_object = $post;
		}

		$length = absint( $length );
		if ( 0 === $length ) {
			return;
		}

		$source_content = $post_object->post_content;

		if ( ! empty( $post_object->post_excerpt ) ) {
			$source_content = $post_object->post_excerpt;
		}

		$source_content = strip_shortcodes( $source_content );
		$trimmed_content = wp_trim_words( $source_content, $length, '...' );
		return $trimmed_content;
	}

endif;

if ( ! function_exists( 'kotre_fonts_url' ) ) {
	/**
	 * Register Google fonts.
	 *
	 * @return string Google fonts URL for the theme.
	 */
	function kotre_fonts_url() {
		$fonts_url = '';
		$fonts     = array();
		$subsets   = 'latin,latin-ext';

		/* translators: If there are characters in your language that are not supported by Barlow, translate this to 'off'. Do not translate into your own language. */
		if ( 'off' !== _x( 'on', 'Raleway font: on or off', 'kotre' ) ) {
			$fonts[] = 'Raleway:300,300i,400,400i,500,500i,600,600i,700,700i';
		}

		/* translators: If there are characters in your language that are not supported by Playfair Display, translate this to 'off'. Do not translate into your own language. */
		if ( 'off' !== _x( 'on', 'Muli font: on or off', 'kotre' ) ) {
			$fonts[] = 'Muli:300,300i,400,400i,600,600i,700,700i';
		}
		
		if ( $fonts ) {
			$fonts_url = add_query_arg( array(
				'family' => urlencode( implode( '|', $fonts ) ),
				'subset' => urlencode( $subsets ),
			), '//fonts.googleapis.com/css' );
		}

		return $fonts_url;
	}
}

if ( ! function_exists( 'kotre_apply_theme_shortcode' ) ) :

	/**
	 * Apply theme shortcode.
	 *
	 * @since 1.0.0
	 *
	 * @param string $string Content.
	 * @return string Modified content.
	 */
	function kotre_apply_theme_shortcode( $string ) {

		if ( empty( $string ) ) {
			return $string;
		}

		$search = array( '[the-year]', '[the-site-title]' );

		$replace = array(
			date_i18n( esc_html_x( 'Y', 'year date format', 'kotre' ) ),
			esc_html( get_bloginfo( 'name', 'display' ) ),
		);

		$string = str_replace( $search, $replace, $string );

		return $string;

	}

endif;