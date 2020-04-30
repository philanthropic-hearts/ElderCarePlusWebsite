<?php
/**
 * About configuration
 *
 * @package Kotre
 */

$config = array(
	'menu_name' => esc_html__( 'About Kotre', 'kotre' ),
	'page_name' => esc_html__( 'About Kotre', 'kotre' ),

	/* translators: theme version */
	'welcome_title' => sprintf( esc_html__( 'Welcome to %s - ', 'kotre' ), 'Kotre' ),

	/* translators: 1: theme name */
	'welcome_content' => esc_html__( 'Kotre is a simple, clean and lightweight multi-purpose WordPress theme compatible with Elementor and Gutenberg.', 'kotre' ),

	// Quick links.
	'quick_links' => array(
		'theme_url' => array(
			'text' => esc_html__( 'Theme Details','kotre' ),
			'url'  => 'https://wpcharms.com/item/kotre/',
			),
		'demo_url' => array(
			'text' => esc_html__( 'View Demo','kotre' ),
			'url'  => 'https://demo.wpcharms.com/kotre/',
			),
		'documentation_url' => array(
			'text'   => esc_html__( 'View Documentation','kotre' ),
			'url'    => 'https://wpcharms.com/documentation/kotre/',
			),
		'rate_url' => array(
			'text' => esc_html__( 'Rate This Theme','kotre' ),
			'url'  => 'https://wordpress.org/support/theme/kotre/reviews/',
			),
		'pro_url' => array(
			'text' => esc_html__( 'Upgrade To Pro Theme','kotre' ),
			'url'  => 'https://wpcharms.com/item/kotre-pro/',
			'button' => 'primary',
			),
		),

	// Tabs.
	'tabs' => array(
		'getting_started'     => esc_html__( 'Getting Started', 'kotre' ),
		'recommended_actions' => esc_html__( 'Recommended Actions', 'kotre' ),
		'demo_content'        => esc_html__( 'Demo Content', 'kotre' ),
		'free_pro'            => esc_html__( 'FREE VS. PRO', 'kotre' ),
	),

	// Getting started.
	'getting_started' => array(
		array(
			'title'               => esc_html__( 'Theme Documentation', 'kotre' ),
			'text'                => esc_html__( 'Find step by step instructions with video documentation to setup theme easily.', 'kotre' ),
			'button_label'        => esc_html__( 'View documentation', 'kotre' ),
			'button_link'         => 'https://wpcharms.com/documentation/kotre/',
			'is_button'           => false,
			'recommended_actions' => false,
			'is_new_tab'          => true,
		),
		array(
			'title'               => esc_html__( 'Recommended Actions', 'kotre' ),
			'text'                => esc_html__( 'We recommend few steps to take so that you can get complete site like shown in demo.', 'kotre' ),
			'button_label'        => esc_html__( 'Check recommended actions', 'kotre' ),
			'button_link'         => esc_url( admin_url( 'themes.php?page=kotre-about&tab=recommended_actions' ) ),
			'is_button'           => false,
			'recommended_actions' => false,
			'is_new_tab'          => false,
		),
		array(
			'title'               => esc_html__( 'Customize Everything', 'kotre' ),
			'text'                => esc_html__( 'Start customizing every aspect of the website with customizer.', 'kotre' ),
			'button_label'        => esc_html__( 'Go to Customizer', 'kotre' ),
			'button_link'         => esc_url( wp_customize_url() ),
			'is_button'           => true,
			'recommended_actions' => false,
			'is_new_tab'          => false,
		),

		array(
			'title'        			=> esc_html__( 'Pro Version', 'kotre' ),
			'text'         			=> esc_html__( 'Upgrade to pro version for additional features and options.', 'kotre' ),
			'button_label' 			=> esc_html__( 'View Pro Version', 'kotre' ),
			'button_link'  			=> 'https://wpcharms.com/item/kotre-pro/',
			'is_button'    			=> true,
			'recommended_actions' 	=> false,
			'is_new_tab'   			=> true,
		),

		array(
			'title'        			=> esc_html__( 'Contact Support', 'kotre' ),
			'text'         			=> esc_html__( 'If you have any problem, feel free to create ticket and our dedicated Support team will help you to fix it.', 'kotre' ),
			'button_label' 			=> esc_html__( 'Contact Support', 'kotre' ),
			'button_link'  			=> esc_url( 'https://wpcharms.com/support/item/kotre/' ),
			'is_button'    			=> false,
			'recommended_actions' 	=> false,
			'is_new_tab'   			=> true,
		),

		array(
			'title'        => esc_html__( 'Customization Request', 'kotre' ),
			'text'         => esc_html__( 'We have dedicated team members for theme customization. Feel free to contact us any time if you need any customization service.', 'kotre' ),
			'button_label' => esc_html__( 'Customization Request', 'kotre' ),
			'button_link'  => 'https://wpcharms.com/contact/',
			'is_button'    => false,
			'recommended_actions' 	=> false,
			'is_new_tab'   => true,
		),
	),

	// Recommended actions.
	'recommended_actions' => array(
		'content' => array(
			'one-click-demo-import' => array(
				'title'       => esc_html__( 'One Click Demo Import', 'kotre' ),
				'description' => esc_html__( 'Please install the One Click Demo Import plugin to import the demo content. After activation go to Appearance >> Import Demo Data and import it.', 'kotre' ),
				'check'       => class_exists( 'OCDI_Plugin' ),
				'plugin_slug' => 'one-click-demo-import',
				'id'          => 'one-click-demo-import',
			),
		),
	),

	// Demo content.
	'demo_content' => array(
		'description' => sprintf( esc_html__( 'Install %1$s plugin to import demo content. Demo data are bundled within the theme, Please make sure plugin is installed and activated. After plugin activation, go to Import Demo Data menu under Appearance and import it.', 'kotre' ), '<a href="https://wordpress.org/plugins/one-click-demo-import/" target="_blank">' . esc_html__( 'One Click Demo Import', 'kotre' ) . '</a>' ),
		),

    // Free vs pro array.
    'free_pro' => array(

	    array(
		    'title'     => esc_html__( 'Gutenberg & Elementor Compatible', 'kotre' ),
		    'desc'      => esc_html__( 'Theme supports/works perfectly with Gutenberg and Elementor', 'kotre' ),
		    'free'      => esc_html__('yes','kotre'),
		    'pro'       => esc_html__('yes','kotre'),
	    ),

	    array(
		    'title'     => esc_html__( 'Sticky Header', 'kotre' ),
		    'desc'      => esc_html__( 'Option to make header sticky at top', 'kotre' ),
		    'free'      => esc_html__('no','kotre'),
		    'pro'       => esc_html__('yes','kotre'),
	    ),

	    array(
		    'title'     => esc_html__( 'Font Options', 'kotre' ),
		    'desc' 		=> esc_html__( 'Google fonts options for changing the overall site fonts', 'kotre' ),
		    'free'  	=> 'no',
		    'pro'   	=> esc_html__('100+','kotre'),
	    ),

        array(
    	    'title'     => esc_html__( 'Color Options', 'kotre' ),
    	    'desc'      => esc_html__( 'Options to change the primary color of a site', 'kotre' ),
    	    'free'      => esc_html__('no','kotre'),
    	    'pro'       => esc_html__('yes','kotre'),
        ),

        array(
    	    'title'     => esc_html__( 'WooCommerce Options', 'kotre' ),
    	    'desc'      => esc_html__( 'Options to manage your store using WooCommerce plugin', 'kotre' ),
    	    'free'      => esc_html__('Basic','kotre'),
    	    'pro'       => esc_html__('Advanced','kotre'),
        ),

        array(
    	    'title'     => esc_html__( 'Sticky Footer', 'kotre' ),
    	    'desc'      => esc_html__( 'Option to make footer sticky at bottom with parallax effect', 'kotre' ),
    	    'free'      => esc_html__('no','kotre'),
    	    'pro'       => esc_html__('yes','kotre'),
        ),

        array(
    	    'title'     => esc_html__( 'Hide or Override Footer Credit', 'kotre' ),
    	    'desc'      => esc_html__( 'Option to enable/disable or override Powerby text in footer', 'kotre' ),
    	    'free'      => esc_html__('no','kotre'),
    	    'pro'       => esc_html__('yes','kotre'),
        ),

	    array(
		    'title'     => esc_html__( 'Support Forum', 'kotre' ),
		    'desc'      => esc_html__( 'Highly experienced and dedicated support team for your help plus online chat.', 'kotre' ),
		    'free'      => esc_html__('yes', 'kotre'),
		    'pro'       => esc_html__('High Priority', 'kotre'),
	    )

    ),

);
Kotre_About::init( apply_filters( 'kotre_about_filter', $config ) );
