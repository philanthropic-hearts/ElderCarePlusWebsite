<?php
/**
 * Blog Options.
 *
 * @package Kotre
 */

// Layout Section.
$wp_customize->add_section( 'section_layout',
	array(
		'title'      => esc_html__( 'Blog/Archive', 'kotre' ),
		'priority'   => 100,
		'panel'      => 'theme_option_panel',
	)
);

// Setting excerpt_length.
$wp_customize->add_setting( 'theme_options[excerpt_length]',
	array(
		'default'           => $default['excerpt_length'],
		'sanitize_callback' => 'kotre_sanitize_positive_integer',
	)
);
$wp_customize->add_control( 'theme_options[excerpt_length]',
	array(
		'label'       => esc_html__( 'Excerpt Length', 'kotre' ),
		'description' => esc_html__( 'in words', 'kotre' ),
		'section'     => 'section_layout',
		'type'        => 'number',
		'priority'    => 100,
		'input_attrs' => array( 'min' => 1, 'max' => 200, 'style' => 'width: 55px;' ),
	)
);

// Setting readmore_text.
$wp_customize->add_setting( 'theme_options[readmore_text]',
	array(
		'default'           => $default['readmore_text'],
		'sanitize_callback' => 'sanitize_text_field',
	)
);
$wp_customize->add_control( 'theme_options[readmore_text]',
	array(
		'label'    => esc_html__( 'Read More Text', 'kotre' ),
		'section'  => 'section_layout',
		'type'     => 'text',
		'priority' => 100,
	)
);