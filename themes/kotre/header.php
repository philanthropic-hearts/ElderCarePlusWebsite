<?php
/**
 * The header for our theme.
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Kotre
 */

?>
<?php
	/**
	 * Hook - kotre_doctype.
	 *
	 * @hooked kotre_doctype_action - 10
	 */
	do_action( 'kotre_doctype' );
?>
<head>
	<?php
	/**
	 * Hook - kotre_head.
	 *
	 * @hooked kotre_head_action - 10
	 */
	do_action( 'kotre_head' );
	
	wp_head(); ?>
</head>

<body <?php body_class(); ?>>

	<?php wp_body_open(); ?>

	<div id="page" class="site">
		<?php
		/**
		* Hook - kotre_before_header.
		*
		* @hooked kotre_before_header_action - 10
		*/
		do_action( 'kotre_before_header' );

		/**
		* Hook - kotre_header.
		*
		* @hooked kotre_header_action - 10
		*/
		do_action( 'kotre_header' );

		/**
		* Hook - kotre_after_header.
		*
		* @hooked kotre_after_header_action - 10
		*/
		do_action( 'kotre_after_header' );

		/**
		* Hook - kotre_before_content.
		*
		* @hooked kotre_before_content_action - 10
		*/
		do_action( 'kotre_before_content' );