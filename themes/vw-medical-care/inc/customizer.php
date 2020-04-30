<?php
/**
 * VW Medical Care Theme Customizer
 *
 * @package VW Medical Care
 */

/**
 * Add postMessage support for site title and description for the Theme Customizer.
 *
 * @param WP_Customize_Manager $wp_customize Theme Customizer object.
 */
function vw_medical_care_custom_controls() {

    load_template( trailingslashit( get_template_directory() ) . '/inc/custom-controls.php' );
}
add_action( 'customize_register', 'vw_medical_care_custom_controls' );

function vw_medical_care_customize_register( $wp_customize ) {

	load_template( trailingslashit( get_template_directory() ) . 'inc/customize-homepage/class-customize-homepage.php' );

	load_template( trailingslashit( get_template_directory() ) . '/inc/icon-picker.php' );

	//add home page setting pannel
	$VWMedicalCareParentPanel = new VW_Medical_Care_WP_Customize_Panel( $wp_customize, 'vw_medical_care_panel_id', array(
		'capability' => 'edit_theme_options',
		'theme_supports' => '',
		'title' => 'VW Settings',
		'priority' => 10,
	));

	// Layout
	$wp_customize->add_section( 'vw_medical_care_left_right', array(
    	'title'      => __( 'General Settings', 'vw-medical-care' ),
		'panel' => 'vw_medical_care_panel_id'
	) );

	$wp_customize->add_setting('vw_medical_care_width_option',array(
        'default' => __('Full Width','vw-medical-care'),
        'sanitize_callback' => 'vw_medical_care_sanitize_choices'
	));
	$wp_customize->add_control(new VW_Medical_Care_Image_Radio_Control($wp_customize, 'vw_medical_care_width_option', array(
        'type' => 'select',
        'label' => __('Width Layouts','vw-medical-care'),
        'description' => __('Here you can change the width layout of Website.','vw-medical-care'),
        'section' => 'vw_medical_care_left_right',
        'choices' => array(
            'Full Width' => get_template_directory_uri().'/assets/images/full-width.png',
            'Wide Width' => get_template_directory_uri().'/assets/images/wide-width.png',
            'Boxed' => get_template_directory_uri().'/assets/images/boxed-width.png',
    ))));

	// Add Settings and Controls for Layout
	$wp_customize->add_setting('vw_medical_care_theme_options',array(
        'default' => __('Right Sidebar','vw-medical-care'),
        'sanitize_callback' => 'vw_medical_care_sanitize_choices'	        
	) );
	$wp_customize->add_control('vw_medical_care_theme_options', array(
        'type' => 'select',
        'label' => __('Post Sidebar Layout','vw-medical-care'),
        'description' => __('Here you can change the sidebar layout for posts. ','vw-medical-care'),
        'section' => 'vw_medical_care_left_right',
        'choices' => array(
            'Left Sidebar' => __('Left Sidebar','vw-medical-care'),
            'Right Sidebar' => __('Right Sidebar','vw-medical-care'),
            'One Column' => __('One Column','vw-medical-care'),
            'Three Columns' => __('Three Columns','vw-medical-care'),
            'Four Columns' => __('Four Columns','vw-medical-care'),
            'Grid Layout' => __('Grid Layout','vw-medical-care')
        ),
	));

	$wp_customize->add_setting('vw_medical_care_page_layout',array(
        'default' => __('One Column','vw-medical-care'),
        'sanitize_callback' => 'vw_medical_care_sanitize_choices'
	));
	$wp_customize->add_control('vw_medical_care_page_layout',array(
        'type' => 'select',
        'label' => __('Page Sidebar Layout','vw-medical-care'),
        'description' => __('Here you can change the sidebar layout for pages. ','vw-medical-care'),
        'section' => 'vw_medical_care_left_right',
        'choices' => array(
            'Left Sidebar' => __('Left Sidebar','vw-medical-care'),
            'Right Sidebar' => __('Right Sidebar','vw-medical-care'),
            'One Column' => __('One Column','vw-medical-care')
        ),
	) );

	//Woocommerce Shop Page Sidebar
	$wp_customize->add_setting( 'vw_medical_care_woocommerce_shop_page_sidebar',array(
		'default' => 1,
		'transport' => 'refresh',
		'sanitize_callback' => 'vw_medical_care_switch_sanitization'
    ) );
    $wp_customize->add_control( new VW_Medical_Care_Toggle_Switch_Custom_Control( $wp_customize, 'vw_medical_care_woocommerce_shop_page_sidebar',array(
		'label' => esc_html__( 'Shop Page Sidebar','vw-medical-care' ),
		'section' => 'vw_medical_care_left_right'
    )));

    //Woocommerce Single Product page Sidebar
	$wp_customize->add_setting( 'vw_medical_care_woocommerce_single_product_page_sidebar',array(
		'default' => 1,
		'transport' => 'refresh',
		'sanitize_callback' => 'vw_medical_care_switch_sanitization'
    ) );
    $wp_customize->add_control( new VW_Medical_Care_Toggle_Switch_Custom_Control( $wp_customize, 'vw_medical_care_woocommerce_single_product_page_sidebar',array(
		'label' => esc_html__( 'Single Product Sidebar','vw-medical-care' ),
		'section' => 'vw_medical_care_left_right'
    )));

	//Pre-Loader
	$wp_customize->add_setting( 'vw_medical_care_loader_enable',array(
        'default' => 1,
        'transport' => 'refresh',
        'sanitize_callback' => 'vw_medical_care_switch_sanitization'
    ) );
    $wp_customize->add_control( new VW_Medical_Care_Toggle_Switch_Custom_Control( $wp_customize, 'vw_medical_care_loader_enable',array(
        'label' => esc_html__( 'Pre-Loader','vw-medical-care' ),
        'section' => 'vw_medical_care_left_right'
    )));

	$wp_customize->add_setting('vw_medical_care_loader_icon',array(
        'default' => __('Two Way','vw-medical-care'),
        'sanitize_callback' => 'vw_medical_care_sanitize_choices'
	));
	$wp_customize->add_control('vw_medical_care_loader_icon',array(
        'type' => 'select',
        'label' => __('Pre-Loader Type','vw-medical-care'),
        'section' => 'vw_medical_care_left_right',
        'choices' => array(
            'Two Way' => __('Two Way','vw-medical-care'),
            'Dots' => __('Dots','vw-medical-care'),
            'Rotate' => __('Rotate','vw-medical-care')
        ),
	) );

	//Topbar
	$wp_customize->add_section( 'vw_medical_care_topbar', array(
    	'title'      => __( 'Topbar Settings', 'vw-medical-care' ),
		'panel' => 'vw_medical_care_panel_id'
	) );

	$wp_customize->add_setting( 'vw_medical_care_topbar_hide_show',array(
		'default' => 1,
		'transport' => 'refresh',
		'sanitize_callback' => 'vw_medical_care_switch_sanitization'
    ));  
    $wp_customize->add_control( new VW_Medical_Care_Toggle_Switch_Custom_Control( $wp_customize, 'vw_medical_care_topbar_hide_show',array(
		'label' => esc_html__( 'Show / Hide Topbar','vw-medical-care' ),
		'section' => 'vw_medical_care_topbar'
    )));

    $wp_customize->add_setting('vw_medical_care_topbar_padding_top_bottom',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('vw_medical_care_topbar_padding_top_bottom',array(
		'label'	=> __('Topbar Padding Top Bottom','vw-medical-care'),
		'description'	=> __('Enter a value in pixels. Example:20px','vw-medical-care'),
		'input_attrs' => array(
            'placeholder' => __( '10px', 'vw-medical-care' ),
        ),
		'section'=> 'vw_medical_care_topbar',
		'type'=> 'text'
	));

    //Sticky Header
	$wp_customize->add_setting( 'vw_medical_care_sticky_header',array(
        'default' => 1,
        'transport' => 'refresh',
        'sanitize_callback' => 'vw_medical_care_switch_sanitization'
    ) );
    $wp_customize->add_control( new VW_Medical_Care_Toggle_Switch_Custom_Control( $wp_customize, 'vw_medical_care_sticky_header',array(
        'label' => esc_html__( 'Sticky Header','vw-medical-care' ),
        'section' => 'vw_medical_care_topbar'
    )));

	$wp_customize->add_setting( 'vw_medical_care_header_search',
       array(
          'default' => 1,
          'transport' => 'refresh',
          'sanitize_callback' => 'vw_medical_care_switch_sanitization'
    ));  
    $wp_customize->add_control( new VW_Medical_Care_Toggle_Switch_Custom_Control( $wp_customize, 'vw_medical_care_header_search',
       array(
          'label' => esc_html__( 'Show / Hide Search','vw-medical-care' ),
          'section' => 'vw_medical_care_topbar'
    )));

    $wp_customize->add_setting('vw_medical_care_search_font_size',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('vw_medical_care_search_font_size',array(
		'label'	=> __('Search Font Size','vw-medical-care'),
		'description'	=> __('Enter a value in pixels. Example:20px','vw-medical-care'),
		'input_attrs' => array(
            'placeholder' => __( '10px', 'vw-medical-care' ),
        ),
		'section'=> 'vw_medical_care_topbar',
		'type'=> 'text'
	));

	$wp_customize->add_setting('vw_medical_care_search_padding_top_bottom',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('vw_medical_care_search_padding_top_bottom',array(
		'label'	=> __('Search Padding Top Bottom','vw-medical-care'),
		'description'	=> __('Enter a value in pixels. Example:20px','vw-medical-care'),
		'input_attrs' => array(
            'placeholder' => __( '10px', 'vw-medical-care' ),
        ),
		'section'=> 'vw_medical_care_topbar',
		'type'=> 'text'
	));

	$wp_customize->add_setting('vw_medical_care_search_padding_left_right',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('vw_medical_care_search_padding_left_right',array(
		'label'	=> __('Search Padding Left Right','vw-medical-care'),
		'description'	=> __('Enter a value in pixels. Example:20px','vw-medical-care'),
		'input_attrs' => array(
            'placeholder' => __( '10px', 'vw-medical-care' ),
        ),
		'section'=> 'vw_medical_care_topbar',
		'type'=> 'text'
	));

	$wp_customize->add_setting( 'vw_medical_care_search_border_radius', array(
		'default'              => "",
		'type'                 => 'theme_mod',
		'transport' 		   => 'refresh',
		'sanitize_callback'    => 'absint',
		'sanitize_js_callback' => 'absint',
	) );
	$wp_customize->add_control( 'vw_medical_care_search_border_radius', array(
		'label'       => esc_html__( 'Search Border Radius','vw-medical-care' ),
		'section'     => 'vw_medical_care_topbar',
		'type'        => 'range',
		'input_attrs' => array(
			'step'             => 1,
			'min'              => 1,
			'max'              => 50,
		),
	) );

	$wp_customize->add_setting('vw_medical_care_header_text',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('vw_medical_care_header_text',array(
		'label'	=> __('Add Text','vw-medical-care'),
		'input_attrs' => array(
            'placeholder' => __( 'Do you have any question?', 'vw-medical-care' ),
        ),
		'section'=> 'vw_medical_care_topbar',
		'type'=> 'text'
	));
    
	//Slider
	$wp_customize->add_section( 'vw_medical_care_slidersettings' , array(
    	'title'      => __( 'Slider Section', 'vw-medical-care' ),
		'panel' => 'vw_medical_care_panel_id'
	) );

	$wp_customize->add_setting( 'vw_medical_care_slider_hide_show',
       array(
          'default' => 1,
          'transport' => 'refresh',
          'sanitize_callback' => 'vw_medical_care_switch_sanitization'
    ));  
    $wp_customize->add_control( new VW_Medical_Care_Toggle_Switch_Custom_Control( $wp_customize, 'vw_medical_care_slider_hide_show',
       array(
          'label' => esc_html__( 'Show / Hide Slider','vw-medical-care' ),
          'section' => 'vw_medical_care_slidersettings'
    )));

	for ( $count = 1; $count <= 4; $count++ ) {

		$wp_customize->add_setting( 'vw_medical_care_slider_page' . $count, array(
			'default'           => '',
			'sanitize_callback' => 'vw_medical_care_sanitize_dropdown_pages'
		) );
		$wp_customize->add_control( 'vw_medical_care_slider_page' . $count, array(
			'label'    => __( 'Select Slider Page', 'vw-medical-care' ),
			'description' => __('Slider image size (1500 x 590)','vw-medical-care'),
			'section'  => 'vw_medical_care_slidersettings',
			'type'     => 'dropdown-pages'
		) );
	}

	$wp_customize->add_setting('vw_medical_care_slider_button_icon',array(
		'default'	=> 'fa fa-angle-right',
		'sanitize_callback'	=> 'sanitize_text_field'
	));	
	$wp_customize->add_control(new VW_Medical_Care_Fontawesome_Icon_Chooser(
        $wp_customize,'vw_medical_care_slider_button_icon',array(
		'label'	=> __('Add Slider Button Icon','vw-medical-care'),
		'transport' => 'refresh',
		'section'	=> 'vw_medical_care_slidersettings',
		'setting'	=> 'vw_medical_care_slider_button_icon',
		'type'		=> 'icon'
	)));

	//content layout
	$wp_customize->add_setting('vw_medical_care_slider_content_option',array(
        'default' => __('Center','vw-medical-care'),
        'sanitize_callback' => 'vw_medical_care_sanitize_choices'
	));
	$wp_customize->add_control(new VW_Medical_Care_Image_Radio_Control($wp_customize, 'vw_medical_care_slider_content_option', array(
        'type' => 'select',
        'label' => __('Slider Content Layouts','vw-medical-care'),
        'section' => 'vw_medical_care_slidersettings',
        'choices' => array(
            'Left' => get_template_directory_uri().'/assets/images/slider-content1.png',
            'Center' => get_template_directory_uri().'/assets/images/slider-content2.png',
            'Right' => get_template_directory_uri().'/assets/images/slider-content3.png',
    ))));

    //Slider excerpt
	$wp_customize->add_setting( 'vw_medical_care_slider_excerpt_number', array(
		'default'              => 30,
		'type'                 => 'theme_mod',
		'transport' 		   => 'refresh',
		'sanitize_callback'    => 'absint',
		'sanitize_js_callback' => 'absint',
	) );
	$wp_customize->add_control( 'vw_medical_care_slider_excerpt_number', array(
		'label'       => esc_html__( 'Slider Excerpt length','vw-medical-care' ),
		'section'     => 'vw_medical_care_slidersettings',
		'type'        => 'range',
		'settings'    => 'vw_medical_care_slider_excerpt_number',
		'input_attrs' => array(
			'step'             => 5,
			'min'              => 0,
			'max'              => 50,
		),
	) );

	//Opacity
	$wp_customize->add_setting('vw_medical_care_slider_opacity_color',array(
      'default'              => 0.5,
      'sanitize_callback' => 'vw_medical_care_sanitize_choices'
	));

	$wp_customize->add_control( 'vw_medical_care_slider_opacity_color', array(
	'label'       => esc_html__( 'Slider Image Opacity','vw-medical-care' ),
	'section'     => 'vw_medical_care_slidersettings',
	'type'        => 'select',
	'settings'    => 'vw_medical_care_slider_opacity_color',
	'choices' => array(
      '0' =>  esc_attr('0','vw-medical-care'),
      '0.1' =>  esc_attr('0.1','vw-medical-care'),
      '0.2' =>  esc_attr('0.2','vw-medical-care'),
      '0.3' =>  esc_attr('0.3','vw-medical-care'),
      '0.4' =>  esc_attr('0.4','vw-medical-care'),
      '0.5' =>  esc_attr('0.5','vw-medical-care'),
      '0.6' =>  esc_attr('0.6','vw-medical-care'),
      '0.7' =>  esc_attr('0.7','vw-medical-care'),
      '0.8' =>  esc_attr('0.8','vw-medical-care'),
      '0.9' =>  esc_attr('0.9','vw-medical-care')
	),
	));

	//Contact us
	$wp_customize->add_section( 'vw_medical_care_contact', array(
    	'title'      => __( 'Contact us', 'vw-medical-care' ),
		'panel' => 'vw_medical_care_panel_id'
	) );

	$wp_customize->add_setting('vw_medical_care_phone_icon',array(
		'default'	=> 'fas fa-phone',
		'sanitize_callback'	=> 'sanitize_text_field'
	));	
	$wp_customize->add_control(new VW_Medical_Care_Fontawesome_Icon_Chooser(
        $wp_customize,'vw_medical_care_phone_icon',array(
		'label'	=> __('Add Phone Icon','vw-medical-care'),
		'transport' => 'refresh',
		'section'	=> 'vw_medical_care_contact',
		'setting'	=> 'vw_medical_care_phone_icon',
		'type'		=> 'icon'
	)));

	$wp_customize->add_setting('vw_medical_care_call_text',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('vw_medical_care_call_text',array(
		'label'	=> __('Add Call Text','vw-medical-care'),
		'input_attrs' => array(
            'placeholder' => __( 'Phone No.', 'vw-medical-care' ),
        ),
		'section'=> 'vw_medical_care_contact',
		'type'=> 'text'
	));

	$wp_customize->add_setting('vw_medical_care_call',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('vw_medical_care_call',array(
		'label'	=> __('Add Phone No.','vw-medical-care'),
		'input_attrs' => array(
            'placeholder' => __( '+00 987 654 1230', 'vw-medical-care' ),
        ),
		'section'=> 'vw_medical_care_contact',
		'type'=> 'text'
	));

	$wp_customize->add_setting('vw_medical_care_location_icon',array(
		'default'	=> 'fas fa-map-marker-alt',
		'sanitize_callback'	=> 'sanitize_text_field'
	));	
	$wp_customize->add_control(new VW_Medical_Care_Fontawesome_Icon_Chooser(
        $wp_customize,'vw_medical_care_location_icon',array(
		'label'	=> __('Add Location Icon','vw-medical-care'),
		'transport' => 'refresh',
		'section'	=> 'vw_medical_care_contact',
		'setting'	=> 'vw_medical_care_location_icon',
		'type'		=> 'icon'
	)));

	$wp_customize->add_setting('vw_medical_care_address_text',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('vw_medical_care_address_text',array(
		'label'	=> __('Add Location Text','vw-medical-care'),
		'input_attrs' => array(
            'placeholder' => __( 'Hospital Address', 'vw-medical-care' ),
        ),
		'section'=> 'vw_medical_care_contact',
		'type'=> 'text'
	));

	$wp_customize->add_setting('vw_medical_care_address',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('vw_medical_care_address',array(
		'label'	=> __('Add Location','vw-medical-care'),
		'input_attrs' => array(
            'placeholder' => __( '123 dummy street opp to dummy appartment, DUMMY', 'vw-medical-care' ),
        ),
		'section'=> 'vw_medical_care_contact',
		'type'=> 'text'
	));

	$wp_customize->add_setting('vw_medical_care_email_address_icon',array(
		'default'	=> 'fas fa-envelope-open',
		'sanitize_callback'	=> 'sanitize_text_field'
	));	
	$wp_customize->add_control(new VW_Medical_Care_Fontawesome_Icon_Chooser(
        $wp_customize,'vw_medical_care_email_address_icon',array(
		'label'	=> __('Add Email Icon','vw-medical-care'),
		'transport' => 'refresh',
		'section'	=> 'vw_medical_care_contact',
		'setting'	=> 'vw_medical_care_email_address_icon',
		'type'		=> 'icon'
	)));

	$wp_customize->add_setting('vw_medical_care_email_text',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('vw_medical_care_email_text',array(
		'label'	=> __('Add Email Text','vw-medical-care'),
		'input_attrs' => array(
            'placeholder' => __( 'Email Address', 'vw-medical-care' ),
        ),
		'section'=> 'vw_medical_care_contact',
		'type'=> 'text'
	));

	$wp_customize->add_setting('vw_medical_care_email',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('vw_medical_care_email',array(
		'label'	=> __('Add Email','vw-medical-care'),
		'input_attrs' => array(
            'placeholder' => __( 'example@gmail.com', 'vw-medical-care' ),
        ),
		'section'=> 'vw_medical_care_contact',
		'type'=> 'text'
	));
    
	//Facilities section
	$wp_customize->add_section( 'vw_medical_care_facilities_section' , array(
    	'title'      => __( 'Our Facilities Section', 'vw-medical-care' ),
		'priority'   => null,
		'panel' => 'vw_medical_care_panel_id'
	) );

	$categories = get_categories();
	$cat_post = array();
	$cat_post[]= 'select';
	$i = 0;	
	foreach($categories as $category){
		if($i==0){
			$default = $category->slug;
			$i++;
		}
		$cat_post[$category->slug] = $category->name;
	}

	$wp_customize->add_setting('vw_medical_care_facilities',array(
		'default'	=> 'select',
		'sanitize_callback' => 'vw_medical_care_sanitize_choices',
	));
	$wp_customize->add_control('vw_medical_care_facilities',array(
		'type'    => 'select',
		'choices' => $cat_post,
		'label' => __('Select Category to display facilities','vw-medical-care'),
		'description' => __('Image Size (250 x 250)','vw-medical-care'),
		'section' => 'vw_medical_care_facilities_section',
	));

	//Facilities excerpt
	$wp_customize->add_setting( 'vw_medical_care_facilities_excerpt_number', array(
		'default'              => 30,
		'type'                 => 'theme_mod',
		'transport' 		   => 'refresh',
		'sanitize_callback'    => 'absint',
		'sanitize_js_callback' => 'absint',
	) );
	$wp_customize->add_control( 'vw_medical_care_facilities_excerpt_number', array(
		'label'       => esc_html__( 'Facilities Excerpt length','vw-medical-care' ),
		'section'     => 'vw_medical_care_facilities_section',
		'type'        => 'range',
		'settings'    => 'vw_medical_care_facilities_excerpt_number',
		'input_attrs' => array(
			'step'             => 5,
			'min'              => 0,
			'max'              => 50,
		),
	) );

	//Blog Post
	$wp_customize->add_panel( $VWMedicalCareParentPanel );

	$BlogPostParentPanel = new VW_Medical_Care_WP_Customize_Panel( $wp_customize, 'blog_post_parent_panel', array(
		'title' => __( 'Blog Post Settings', 'vw-medical-care' ),
		'panel' => 'vw_medical_care_panel_id',
	));

	$wp_customize->add_panel( $BlogPostParentPanel );

	// Add example section and controls to the middle (second) panel
	$wp_customize->add_section( 'vw_medical_care_post_settings', array(
		'title' => __( 'Post Settings', 'vw-medical-care' ),
		'panel' => 'blog_post_parent_panel',
	));

	$wp_customize->add_setting( 'vw_medical_care_toggle_postdate',array(
        'default' => 1,
        'transport' => 'refresh',
        'sanitize_callback' => 'vw_medical_care_switch_sanitization'
    ) );
    $wp_customize->add_control( new VW_Medical_Care_Toggle_Switch_Custom_Control( $wp_customize, 'vw_medical_care_toggle_postdate',array(
        'label' => esc_html__( 'Post Date','vw-medical-care' ),
        'section' => 'vw_medical_care_post_settings'
    )));

    $wp_customize->add_setting( 'vw_medical_care_toggle_author',array(
		'default' => 1,
		'transport' => 'refresh',
		'sanitize_callback' => 'vw_medical_care_switch_sanitization'
    ) );
    $wp_customize->add_control( new VW_Medical_Care_Toggle_Switch_Custom_Control( $wp_customize, 'vw_medical_care_toggle_author',array(
		'label' => esc_html__( 'Author','vw-medical-care' ),
		'section' => 'vw_medical_care_post_settings'
    )));

    $wp_customize->add_setting( 'vw_medical_care_toggle_comments',array(
		'default' => 1,
		'transport' => 'refresh',
		'sanitize_callback' => 'vw_medical_care_switch_sanitization'
    ) );
    $wp_customize->add_control( new VW_Medical_Care_Toggle_Switch_Custom_Control( $wp_customize, 'vw_medical_care_toggle_comments',array(
		'label' => esc_html__( 'Comments','vw-medical-care' ),
		'section' => 'vw_medical_care_post_settings'
    )));

    $wp_customize->add_setting( 'vw_medical_care_toggle_tags',array(
		'default' => 1,
		'transport' => 'refresh',
		'sanitize_callback' => 'vw_medical_care_switch_sanitization'
	));
    $wp_customize->add_control( new VW_Medical_Care_Toggle_Switch_Custom_Control( $wp_customize, 'vw_medical_care_toggle_tags', array(
		'label' => esc_html__( 'Tags','vw-medical-care' ),
		'section' => 'vw_medical_care_post_settings'
    )));

    $wp_customize->add_setting( 'vw_medical_care_excerpt_number', array(
		'default'              => 30,
		'type'                 => 'theme_mod',
		'transport' 		   => 'refresh',
		'sanitize_callback'    => 'absint',
		'sanitize_js_callback' => 'absint',
	) );
	$wp_customize->add_control( 'vw_medical_care_excerpt_number', array(
		'label'       => esc_html__( 'Excerpt length','vw-medical-care' ),
		'section'     => 'vw_medical_care_post_settings',
		'type'        => 'range',
		'settings'    => 'vw_medical_care_excerpt_number',
		'input_attrs' => array(
			'step'             => 5,
			'min'              => 0,
			'max'              => 50,
		),
	) );

	//Blog layout
    $wp_customize->add_setting('vw_medical_care_blog_layout_option',array(
        'default' => __('Default','vw-medical-care'),
        'sanitize_callback' => 'vw_medical_care_sanitize_choices'
    ));
    $wp_customize->add_control(new VW_Medical_Care_Image_Radio_Control($wp_customize, 'vw_medical_care_blog_layout_option', array(
        'type' => 'select',
        'label' => __('Blog Layouts','vw-medical-care'),
        'section' => 'vw_medical_care_post_settings',
        'choices' => array(
            'Default' => get_template_directory_uri().'/assets/images/blog-layout1.png',
            'Center' => get_template_directory_uri().'/assets/images/blog-layout2.png',
            'Left' => get_template_directory_uri().'/assets/images/blog-layout3.png',
    ))));

    // Button Settings
	$wp_customize->add_section( 'vw_medical_care_button_settings', array(
		'title' => __( 'Button Settings', 'vw-medical-care' ),
		'panel' => 'blog_post_parent_panel',
	));

	$wp_customize->add_setting('vw_medical_care_button_padding_top_bottom',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('vw_medical_care_button_padding_top_bottom',array(
		'label'	=> __('Padding Top Bottom','vw-medical-care'),
		'description'	=> __('Enter a value in pixels. Example:20px','vw-medical-care'),
		'input_attrs' => array(
            'placeholder' => __( '10px', 'vw-medical-care' ),
        ),
		'section'=> 'vw_medical_care_button_settings',
		'type'=> 'text'
	));

	$wp_customize->add_setting('vw_medical_care_button_padding_left_right',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('vw_medical_care_button_padding_left_right',array(
		'label'	=> __('Padding Left Right','vw-medical-care'),
		'description'	=> __('Enter a value in pixels. Example:20px','vw-medical-care'),
		'input_attrs' => array(
            'placeholder' => __( '10px', 'vw-medical-care' ),
        ),
		'section'=> 'vw_medical_care_button_settings',
		'type'=> 'text'
	));

	$wp_customize->add_setting( 'vw_medical_care_button_border_radius', array(
		'default'              => '',
		'type'                 => 'theme_mod',
		'transport' 		   => 'refresh',
		'sanitize_callback'    => 'absint',
		'sanitize_js_callback' => 'absint',
	) );
	$wp_customize->add_control( 'vw_medical_care_button_border_radius', array(
		'label'       => esc_html__( 'Button Border Radius','vw-medical-care' ),
		'section'     => 'vw_medical_care_button_settings',
		'type'        => 'range',
		'input_attrs' => array(
			'step'             => 1,
			'min'              => 1,
			'max'              => 50,
		),
	) );

    $wp_customize->add_setting('vw_medical_care_button_text',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('vw_medical_care_button_text',array(
		'label'	=> __('Add Button Text','vw-medical-care'),
		'input_attrs' => array(
            'placeholder' => __( 'READ MORE', 'vw-medical-care' ),
        ),
		'section'=> 'vw_medical_care_button_settings',
		'type'=> 'text'
	));

	$wp_customize->add_setting('vw_medical_care_blog_button_icon',array(
		'default'	=> 'fa fa-angle-right',
		'sanitize_callback'	=> 'sanitize_text_field'
	));	
	$wp_customize->add_control(new VW_Medical_Care_Fontawesome_Icon_Chooser(
        $wp_customize,'vw_medical_care_blog_button_icon',array(
		'label'	=> __('Add Button Icon','vw-medical-care'),
		'transport' => 'refresh',
		'section'	=> 'vw_medical_care_button_settings',
		'setting'	=> 'vw_medical_care_blog_button_icon',
		'type'		=> 'icon'
	)));

	// Related Post Settings
	$wp_customize->add_section( 'vw_medical_care_related_posts_settings', array(
		'title' => __( 'Related Posts Settings', 'vw-medical-care' ),
		'panel' => 'blog_post_parent_panel',
	));

    $wp_customize->add_setting( 'vw_medical_care_related_post',array(
		'default' => 1,
		'transport' => 'refresh',
		'sanitize_callback' => 'vw_medical_care_switch_sanitization'
    ) );
    $wp_customize->add_control( new VW_Medical_Care_Toggle_Switch_Custom_Control( $wp_customize, 'vw_medical_care_related_post',array(
		'label' => esc_html__( 'Related Post','vw-medical-care' ),
		'section' => 'vw_medical_care_related_posts_settings'
    )));

    $wp_customize->add_setting('vw_medical_care_related_post_title',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('vw_medical_care_related_post_title',array(
		'label'	=> __('Add Related Post Title','vw-medical-care'),
		'input_attrs' => array(
            'placeholder' => __( 'Related Post', 'vw-medical-care' ),
        ),
		'section'=> 'vw_medical_care_related_posts_settings',
		'type'=> 'text'
	));

   	$wp_customize->add_setting('vw_medical_care_related_posts_count',array(
		'default'=> '3',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('vw_medical_care_related_posts_count',array(
		'label'	=> __('Add Related Post Count','vw-medical-care'),
		'input_attrs' => array(
            'placeholder' => __( '3', 'vw-medical-care' ),
        ),
		'section'=> 'vw_medical_care_related_posts_settings',
		'type'=> 'number'
	));

     //404 Page Setting
	$wp_customize->add_section('vw_medical_care_404_page',array(
		'title'	=> __('404 Page Settings','vw-medical-care'),
		'panel' => 'vw_medical_care_panel_id',
	));	

	$wp_customize->add_setting('vw_medical_care_404_page_title',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));

	$wp_customize->add_control('vw_medical_care_404_page_title',array(
		'label'	=> __('Add Title','vw-medical-care'),
		'input_attrs' => array(
            'placeholder' => __( '404 Not Found', 'vw-medical-care' ),
        ),
		'section'=> 'vw_medical_care_404_page',
		'type'=> 'text'
	));

	$wp_customize->add_setting('vw_medical_care_404_page_content',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));

	$wp_customize->add_control('vw_medical_care_404_page_content',array(
		'label'	=> __('Add Text','vw-medical-care'),
		'input_attrs' => array(
            'placeholder' => __( 'Looks like you have taken a wrong turn, Dont worry, it happens to the best of us.', 'vw-medical-care' ),
        ),
		'section'=> 'vw_medical_care_404_page',
		'type'=> 'text'
	));

	$wp_customize->add_setting('vw_medical_care_404_page_button_text',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('vw_medical_care_404_page_button_text',array(
		'label'	=> __('Add Button Text','vw-medical-care'),
		'input_attrs' => array(
            'placeholder' => __( 'Return to the home page', 'vw-medical-care' ),
        ),
		'section'=> 'vw_medical_care_404_page',
		'type'=> 'text'
	));

	//Responsive Media Settings
	$wp_customize->add_section('vw_medical_care_responsive_media',array(
		'title'	=> __('Responsive Media','vw-medical-care'),
		'panel' => 'vw_medical_care_panel_id',
	));

	$wp_customize->add_setting( 'vw_medical_care_resp_topbar_hide_show',array(
          'default' => 1,
          'transport' => 'refresh',
          'sanitize_callback' => 'vw_medical_care_switch_sanitization'
    ));  
    $wp_customize->add_control( new VW_Medical_Care_Toggle_Switch_Custom_Control( $wp_customize, 'vw_medical_care_resp_topbar_hide_show',array(
          'label' => esc_html__( 'Show / Hide Topbar','vw-medical-care' ),
          'section' => 'vw_medical_care_responsive_media'
    )));

    $wp_customize->add_setting( 'vw_medical_care_stickyheader_hide_show',array(
          'default' => 1,
          'transport' => 'refresh',
          'sanitize_callback' => 'vw_medical_care_switch_sanitization'
    ));  
    $wp_customize->add_control( new VW_Medical_Care_Toggle_Switch_Custom_Control( $wp_customize, 'vw_medical_care_stickyheader_hide_show',array(
          'label' => esc_html__( 'Sticky Header','vw-medical-care' ),
          'section' => 'vw_medical_care_responsive_media'
    )));

    $wp_customize->add_setting( 'vw_medical_care_resp_slider_hide_show',array(
          'default' => 1,
          'transport' => 'refresh',
          'sanitize_callback' => 'vw_medical_care_switch_sanitization'
    ));  
    $wp_customize->add_control( new VW_Medical_Care_Toggle_Switch_Custom_Control( $wp_customize, 'vw_medical_care_resp_slider_hide_show',array(
          'label' => esc_html__( 'Show / Hide Slider','vw-medical-care' ),
          'section' => 'vw_medical_care_responsive_media'
    )));

	$wp_customize->add_setting( 'vw_medical_care_metabox_hide_show',array(
          'default' => 1,
          'transport' => 'refresh',
          'sanitize_callback' => 'vw_medical_care_switch_sanitization'
    ));  
    $wp_customize->add_control( new VW_Medical_Care_Toggle_Switch_Custom_Control( $wp_customize, 'vw_medical_care_metabox_hide_show',array(
          'label' => esc_html__( 'Show / Hide Metabox','vw-medical-care' ),
          'section' => 'vw_medical_care_responsive_media'
    )));

    $wp_customize->add_setting( 'vw_medical_care_sidebar_hide_show',array(
          'default' => 1,
          'transport' => 'refresh',
          'sanitize_callback' => 'vw_medical_care_switch_sanitization'
    ));  
    $wp_customize->add_control( new VW_Medical_Care_Toggle_Switch_Custom_Control( $wp_customize, 'vw_medical_care_sidebar_hide_show',array(
          'label' => esc_html__( 'Show / Hide Sidebar','vw-medical-care' ),
          'section' => 'vw_medical_care_responsive_media'
    )));

     $wp_customize->add_setting('vw_medical_care_res_open_menu_icon',array(
		'default'	=> 'fas fa-bars',
		'sanitize_callback'	=> 'sanitize_text_field'
	));	
	$wp_customize->add_control(new VW_Medical_Care_Fontawesome_Icon_Chooser(
        $wp_customize,'vw_medical_care_res_open_menu_icon',array(
		'label'	=> __('Add Open Menu Icon','vw-medical-care'),
		'transport' => 'refresh',
		'section'	=> 'vw_medical_care_responsive_media',
		'setting'	=> 'vw_medical_care_res_open_menu_icon',
		'type'		=> 'icon'
	)));

	$wp_customize->add_setting('vw_medical_care_res_close_menus_icon',array(
		'default'	=> 'fas fa-times',
		'sanitize_callback'	=> 'sanitize_text_field'
	));	
	$wp_customize->add_control(new VW_Medical_Care_Fontawesome_Icon_Chooser(
        $wp_customize,'vw_medical_care_res_close_menus_icon',array(
		'label'	=> __('Add Close Menu Icon','vw-medical-care'),
		'transport' => 'refresh',
		'section'	=> 'vw_medical_care_responsive_media',
		'setting'	=> 'vw_medical_care_res_close_menus_icon',
		'type'		=> 'icon'
	)));

	//Content Creation
	$wp_customize->add_section( 'vw_medical_care_content_section' , array(
    	'title' => __( 'Customize Home Page', 'vw-medical-care' ),
		'priority' => null,
		'panel' => 'vw_medical_care_panel_id'
	) );

	$wp_customize->add_setting('vw_medical_care_content_creation_main_control', array(
		'sanitize_callback' => 'esc_html',
	) );

	$homepage= get_option( 'page_on_front' );

	$wp_customize->add_control(	new VW_Medical_Care_Content_Creation( $wp_customize, 'vw_medical_care_content_creation_main_control', array(
		'options' => array(
			esc_html__( 'First select static page in homepage setting for front page.Below given edit button is to customize Home Page. Just click on the edit option, add whatever elements you want to include in the homepage, save the changes and you are good to go.','vw-medical-care' ),
		),
		'section' => 'vw_medical_care_content_section',
		'button_url'  => admin_url( 'post.php?post='.$homepage.'&action=edit'),
		'button_text' => esc_html__( 'Edit', 'vw-medical-care' ),
	) ) );

	//Footer Text
	$wp_customize->add_section('vw_medical_care_footer',array(
		'title'	=> __('Footer','vw-medical-care'),
		'panel' => 'vw_medical_care_panel_id',
	));	
	
	$wp_customize->add_setting('vw_medical_care_footer_text',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));	
	$wp_customize->add_control('vw_medical_care_footer_text',array(
		'label'	=> __('Copyright Text','vw-medical-care'),
		'input_attrs' => array(
            'placeholder' => __( 'Copyright 2019, .....', 'vw-medical-care' ),
        ),
		'section'=> 'vw_medical_care_footer',
		'type'=> 'text'
	));

	$wp_customize->add_setting('vw_medical_care_copyright_alingment',array(
        'default' => __('center','vw-medical-care'),
        'sanitize_callback' => 'vw_medical_care_sanitize_choices'
	));
	$wp_customize->add_control(new VW_Medical_Care_Image_Radio_Control($wp_customize, 'vw_medical_care_copyright_alingment', array(
        'type' => 'select',
        'label' => __('Copyright Alignment','vw-medical-care'),
        'section' => 'vw_medical_care_footer',
        'settings' => 'vw_medical_care_copyright_alingment',
        'choices' => array(
            'left' => get_template_directory_uri().'/assets/images/copyright1.png',
            'center' => get_template_directory_uri().'/assets/images/copyright2.png',
            'right' => get_template_directory_uri().'/assets/images/copyright3.png'
    ))));

    $wp_customize->add_setting('vw_medical_care_copyright_padding_top_bottom',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('vw_medical_care_copyright_padding_top_bottom',array(
		'label'	=> __('Copyright Padding Top Bottom','vw-medical-care'),
		'description'	=> __('Enter a value in pixels. Example:20px','vw-medical-care'),
		'input_attrs' => array(
            'placeholder' => __( '10px', 'vw-medical-care' ),
        ),
		'section'=> 'vw_medical_care_footer',
		'type'=> 'text'
	));

	$wp_customize->add_setting( 'vw_medical_care_hide_show_scroll',array(
    	'default' => 1,
      	'transport' => 'refresh',
      	'sanitize_callback' => 'vw_medical_care_switch_sanitization'
    ));  
    $wp_customize->add_control( new VW_Medical_Care_Toggle_Switch_Custom_Control( $wp_customize, 'vw_medical_care_hide_show_scroll',array(
      	'label' => esc_html__( 'Show / Hide Scroll To Top','vw-medical-care' ),
      	'section' => 'vw_medical_care_footer'
    )));

    $wp_customize->add_setting('vw_medical_care_scroll_to_top_icon',array(
		'default'	=> 'fas fa-long-arrow-alt-up',
		'sanitize_callback'	=> 'sanitize_text_field'
	));	
	$wp_customize->add_control(new VW_Medical_Care_Fontawesome_Icon_Chooser(
        $wp_customize,'vw_medical_care_scroll_to_top_icon',array(
		'label'	=> __('Add Scroll to Top Icon','vw-medical-care'),
		'transport' => 'refresh',
		'section'	=> 'vw_medical_care_footer',
		'setting'	=> 'vw_medical_care_scroll_to_top_icon',
		'type'		=> 'icon'
	)));

	$wp_customize->add_setting('vw_medical_care_scroll_top_alignment',array(
        'default' => __('Right','vw-medical-care'),
        'sanitize_callback' => 'vw_medical_care_sanitize_choices'
	));
	$wp_customize->add_control(new VW_Medical_Care_Image_Radio_Control($wp_customize, 'vw_medical_care_scroll_top_alignment', array(
        'type' => 'select',
        'label' => __('Scroll To Top','vw-medical-care'),
        'section' => 'vw_medical_care_footer',
        'settings' => 'vw_medical_care_scroll_top_alignment',
        'choices' => array(
            'Left' => get_template_directory_uri().'/assets/images/layout1.png',
            'Center' => get_template_directory_uri().'/assets/images/layout2.png',
            'Right' => get_template_directory_uri().'/assets/images/layout3.png'
    ))));	

    // Has to be at the top
	$wp_customize->register_panel_type( 'VW_Medical_Care_WP_Customize_Panel' );
	$wp_customize->register_section_type( 'VW_Medical_Care_WP_Customize_Section' );
}

add_action( 'customize_register', 'vw_medical_care_customize_register' );

load_template( trailingslashit( get_template_directory() ) . '/inc/logo/logo-resizer.php' );

if ( class_exists( 'WP_Customize_Panel' ) ) {

  class VW_Medical_Care_WP_Customize_Panel extends WP_Customize_Panel {

    public $panel;
    public $type = 'vw_medical_care_panel';
    public function json() {

      $array = wp_array_slice_assoc( (array) $this, array( 'id', 'description', 'priority', 'type', 'panel', ) );
      $array['title'] = html_entity_decode( $this->title, ENT_QUOTES, get_bloginfo( 'charset' ) );
      $array['content'] = $this->get_content();
      $array['active'] = $this->active();
      $array['instanceNumber'] = $this->instance_number;
      return $array;
    }
  }
}

if ( class_exists( 'WP_Customize_Section' ) ) {
  class VW_Medical_Care_WP_Customize_Section extends WP_Customize_Section {
  	
    public $section;
    public $type = 'vw_medical_care_section';
    public function json() {

      $array = wp_array_slice_assoc( (array) $this, array( 'id', 'description', 'priority', 'panel', 'type', 'description_hidden', 'section', ) );
      $array['title'] = html_entity_decode( $this->title, ENT_QUOTES, get_bloginfo( 'charset' ) );
      $array['content'] = $this->get_content();
      $array['active'] = $this->active();
      $array['instanceNumber'] = $this->instance_number;

      if ( $this->panel ) {
        $array['customizeAction'] = sprintf( 'Customizing &#9656; %s', esc_html( $this->manager->get_panel( $this->panel )->title ) );
      } else {
        $array['customizeAction'] = 'Customizing';
      }
      return $array;
    }
  }
}

// Enqueue our scripts and styles
function vw_medical_care_customize_controls_scripts() {
  wp_enqueue_script( 'customizer-controls', get_theme_file_uri( '/assets/js/customizer-controls.js' ), array(), '1.0', true );
}
add_action( 'customize_controls_enqueue_scripts', 'vw_medical_care_customize_controls_scripts' );

/**
 * Singleton class for handling the theme's customizer integration.
 *
 * @since  1.0.0
 * @access public
 */
final class VW_Medical_Care_Customize {

	/**
	 * Returns the instance.
	 *
	 * @since  1.0.0
	 * @access public
	 * @return object
	 */
	public static function get_instance() {

		static $instance = null;

		if ( is_null( $instance ) ) {
			$instance = new self;
			$instance->setup_actions();
		}

		return $instance;
	}

	/**
	 * Constructor method.
	 *
	 * @since  1.0.0
	 * @access private
	 * @return void
	 */
	private function __construct() {}

	/**
	 * Sets up initial actions.
	 *
	 * @since  1.0.0
	 * @access private
	 * @return void
	 */
	private function setup_actions() {

		// Register panels, sections, settings, controls, and partials.
		add_action( 'customize_register', array( $this, 'sections' ) );

		// Register scripts and styles for the controls.
		add_action( 'customize_controls_enqueue_scripts', array( $this, 'enqueue_control_scripts' ), 0 );
	}

	/**
	 * Sets up the customizer sections.
	 *
	 * @since  1.0.0
	 * @access public
	 * @param  object  $manager
	 * @return void
	 */
	public function sections( $manager ) {

		// Load custom sections.
		load_template( trailingslashit( get_template_directory() ) . '/inc/section-pro.php' );

		// Register custom section types.
		$manager->register_section_type( 'VW_Medical_Care_Customize_Section_Pro' );

		// Register sections.
		$manager->add_section(new VW_Medical_Care_Customize_Section_Pro($manager,'example_1',array(
				'priority'   => 1,
				'title'    => esc_html__( 'VW Medical Care', 'vw-medical-care' ),
				'pro_text' => esc_html__( 'UPGRADE PRO', 'vw-medical-care' ),
				'pro_url'  => esc_url('https://www.vwthemes.com/themes/medical-wordpress-theme/'),
			)));

		// Register sections.
		$manager->add_section(new VW_Medical_Care_Customize_Section_Pro($manager,'example_2',array(
				'priority'   => 1,
				'title'    => esc_html__( 'DOCUMENTATION', 'vw-medical-care' ),
				'pro_text' => esc_html__( 'DOCS', 'vw-medical-care' ),
				'pro_url'  => admin_url('themes.php?page=vw_medical_care_guide'),
			)));
	}
	

	/**
	 * Loads theme customizer CSS.
	 *
	 * @since  1.0.0
	 * @access public
	 * @return void
	 */
	public function enqueue_control_scripts() {

		wp_enqueue_script( 'vw-medical-care-customize-controls', trailingslashit( get_template_directory_uri() ) . '/assets/js/customize-controls.js', array( 'customize-controls' ) );

		wp_enqueue_style( 'vw-medical-care-customize-controls', trailingslashit( get_template_directory_uri() ) . '/assets/css/customize-controls.css' );
	}
}

// Doing this customizer thang!
VW_Medical_Care_Customize::get_instance();