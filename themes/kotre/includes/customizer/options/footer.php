<?php
/**
 * Footer Options.
 *
 * @package Kotre
 */

// Footer Section.
$wp_customize->add_section( 'section_footer',
	array(
		'title'      => esc_html__( 'Footer', 'kotre' ),
		'priority'   => 100,
		'panel'      => 'theme_option_panel',
	)
);

// Setting copyright_text.
$wp_customize->add_setting( 'theme_options[copyright_text]',
	array(
		'default'           => $default['copyright_text'],
		'sanitize_callback' => 'sanitize_textarea_field',
	)
);
$wp_customize->add_control( 'theme_options[copyright_text]',
	array(
		'label'    => esc_html__( 'Copyright Text', 'kotre' ),
		'description' => esc_html__( 'HTML tags are not allowed', 'kotre' ),
		'section'  => 'section_footer',
		'type'     => 'textarea',
		'priority' => 100,
	)
);