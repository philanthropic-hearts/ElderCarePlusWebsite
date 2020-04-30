<?php
/**
 * Kotre Theme Customizer.
 *
 * @package Kotre
 */

/**
 * Theme Customizer.
 *
 * @param WP_Customize_Manager $wp_customize Theme Customizer object.
 */
function kotre_customize_register( $wp_customize ) {

	if ( isset( $wp_customize->selective_refresh ) ) {
		$wp_customize->get_setting( 'blogname' )->transport        = 'postMessage';
		$wp_customize->get_setting( 'blogdescription' )->transport = 'postMessage';

		$wp_customize->selective_refresh->add_partial( 'blogname', array(
			'selector'            => '.site-title a',
			'container_inclusive' => false,
			'render_callback'     => 'kotre_customize_partial_blogname',
		) );
		$wp_customize->selective_refresh->add_partial( 'blogdescription', array(
			'selector'            => '.site-description',
			'container_inclusive' => false,
			'render_callback'     => 'kotre_customize_partial_blogdescription',
		) );
	}

	// Sanitization.
	require_once trailingslashit( get_template_directory() ) . '/includes/customizer/sanitize.php';

	// Load options.
	require_once trailingslashit( get_template_directory() ) . '/includes/customizer/options/options.php';

	// Load Upgrade to Pro control.
	require_once trailingslashit( get_template_directory() ) . '/includes/upgrade-to-pro/control.php';

	// Register custom section types.
	$wp_customize->register_section_type( 'Kotre_Customize_Section_Upsell' );

	// Register sections.
	$wp_customize->add_section(
		new Kotre_Customize_Section_Upsell(
			$wp_customize,
			'theme_upsell',
			array(
				'title'    => esc_html__( 'Kotre Pro', 'kotre' ),
				'pro_text' => esc_html__( 'Buy Now', 'kotre' ),
				'pro_url'  => 'https://wpcharms.com/item/kotre-pro/',
				'priority' => 1,
			)
		)
	);

}
add_action( 'customize_register', 'kotre_customize_register' );

/**
 * Render the site title for the selective refresh partial.
 *
 * @since 1.0.0
 *
 * @return void
 */
function kotre_customize_partial_blogname() {
	bloginfo( 'name' );
}

/**
 * Render the site tagline for the selective refresh partial.
 *
 * @since 1.0.0
 *
 * @return void
 */
function kotre_customize_partial_blogdescription() {
	bloginfo( 'description' );
}

/**
 * Enqueue style for custom customize control.
 */
function kotre_custom_customize_enqueue() {

	wp_enqueue_script( 'kotre-customize-controls', get_template_directory_uri() . '/includes/upgrade-to-pro/customize-controls.js', array( 'customize-controls' ) );

	wp_enqueue_style( 'kotre-customize-controls', get_template_directory_uri() . '/includes/upgrade-to-pro/customize-controls.css' );
}
add_action( 'customize_controls_enqueue_scripts', 'kotre_custom_customize_enqueue' );