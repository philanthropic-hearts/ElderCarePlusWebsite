<?php
/**
 * Header Options.
 *
 * @package Kotre
 */

//Logo Options Setting Starts
$wp_customize->add_setting('theme_options[site_identity]', 
	array(
		'default' 			=> $default['site_identity'],
		'sanitize_callback' => 'kotre_sanitize_select'
	)
);

$wp_customize->add_control('theme_options[site_identity]', 
	array(
		'type' 		=> 'radio',
		'label' 	=> esc_html__('Logo Options', 'kotre'),
		'section' 	=> 'title_tagline',
		'choices' 	=> array(
			'logo-only' 	=> esc_html__('Logo Only', 'kotre'),
			'title-only' 	=> esc_html__('Title Only', 'kotre'),
			'title-text' 	=> esc_html__('Title + Tagline', 'kotre'),
			)
	)
);

// Header Section.
$wp_customize->add_section( 'section_header',
	array(
		'title'      => esc_html__( 'Main Header', 'kotre' ),
		'priority'   => 100,
		'panel'      => 'theme_option_panel',
	)
);

// Setting show_social_icons.
$wp_customize->add_setting( 'theme_options[show_social_icons]',
	array(
		'default'           => $default['show_social_icons'],
		'sanitize_callback' => 'kotre_sanitize_checkbox',
	)
);
$wp_customize->add_control( 'theme_options[show_social_icons]',
	array(
		'label'    			=> esc_html__( 'Show Social Icons', 'kotre' ),
		'section'  			=> 'section_header',
		'type'     			=> 'checkbox',
		'priority' 			=> 100,
	)
);

// Setting show_search_form.
$wp_customize->add_setting( 'theme_options[show_search_form]',
	array(
		'default'           => $default['show_search_form'],
		'sanitize_callback' => 'kotre_sanitize_checkbox',
	)
);
$wp_customize->add_control( 'theme_options[show_search_form]',
	array(
		'label'    			=> esc_html__( 'Show Search Form', 'kotre' ),
		'section'  			=> 'section_header',
		'type'     			=> 'checkbox',
		'priority' 			=> 100,
	)
);