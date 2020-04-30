<?php
if ( ! function_exists( 'ecp_setup' ) ) :

function ecp_setup() {

    /*
     * Make theme available for translation.
     * Translations can be filed in the /languages/ directory.
     */
    /* Pinegrow generated Load Text Domain Begin */
    load_theme_textdomain( 'ecp', get_template_directory() . '/languages' );
    /* Pinegrow generated Load Text Domain End */

    // Add default posts and comments RSS feed links to head.
    add_theme_support( 'automatic-feed-links' );

    /*
     * Let WordPress manage the document title.
     */
    add_theme_support( 'title-tag' );
    
    /*
     * Enable support for Post Thumbnails on posts and pages.
     */
    add_theme_support( 'post-thumbnails' );
    set_post_thumbnail_size( 825, 510, true );

    // Add menus.
    register_nav_menus( array(
        'primary' => __( 'Primary Menu', 'ecp' ),
        'social'  => __( 'Social Links Menu', 'ecp' ),
    ) );

/*
     * Register custom menu locations
     */
    /* Pinegrow generated Register Menus Begin */

    /* Pinegrow generated Register Menus End */
    
/*
    * Set image sizes
     */
    /* Pinegrow generated Image sizes Begin */

    /* Pinegrow generated Image sizes End */
    
    /*
     * Switch default core markup for search form, comment form, and comments
     * to output valid HTML5.
     */
    add_theme_support( 'html5', array(
        'search-form', 'comment-form', 'comment-list', 'gallery', 'caption'
    ) );

    /*
     * Enable support for Post Formats.
     */
    add_theme_support( 'post-formats', array(
        'aside', 'image', 'video', 'quote', 'link', 'gallery', 'status', 'audio', 'chat'
    ) );

    /*
     * Enable support for Page excerpts.
     */
     add_post_type_support( 'page', 'excerpt' );
}
endif; // ecp_setup

add_action( 'after_setup_theme', 'ecp_setup' );


if ( ! function_exists( 'ecp_init' ) ) :

function ecp_init() {

    
    // Use categories and tags with attachments
    register_taxonomy_for_object_type( 'category', 'attachment' );
    register_taxonomy_for_object_type( 'post_tag', 'attachment' );

    /*
     * Register custom post types. You can also move this code to a plugin.
     */
    /* Pinegrow generated Custom Post Types Begin */

    /* Pinegrow generated Custom Post Types End */
    
    /*
     * Register custom taxonomies. You can also move this code to a plugin.
     */
    /* Pinegrow generated Taxonomies Begin */

    /* Pinegrow generated Taxonomies End */

}
endif; // ecp_setup

add_action( 'init', 'ecp_init' );


if ( ! function_exists( 'ecp_custom_image_sizes_names' ) ) :

function ecp_custom_image_sizes_names( $sizes ) {

    /*
     * Add names of custom image sizes.
     */
    /* Pinegrow generated Image Sizes Names Begin*/
    /* This code will be replaced by returning names of custom image sizes. */
    /* Pinegrow generated Image Sizes Names End */
    return $sizes;
}
add_action( 'image_size_names_choose', 'ecp_custom_image_sizes_names' );
endif;// ecp_custom_image_sizes_names



if ( ! function_exists( 'ecp_widgets_init' ) ) :

function ecp_widgets_init() {

    /*
     * Register widget areas.
     */
    /* Pinegrow generated Register Sidebars Begin */

    /* Pinegrow generated Register Sidebars End */
}
add_action( 'widgets_init', 'ecp_widgets_init' );
endif;// ecp_widgets_init



if ( ! function_exists( 'ecp_customize_register' ) ) :

function ecp_customize_register( $wp_customize ) {
    // Do stuff with $wp_customize, the WP_Customize_Manager object.

    /* Pinegrow generated Customizer Controls Begin */

    /* Pinegrow generated Customizer Controls End */

}
add_action( 'customize_register', 'ecp_customize_register' );
endif;// ecp_customize_register


if ( ! function_exists( 'ecp_enqueue_scripts' ) ) :
    function ecp_enqueue_scripts() {

        /* Pinegrow generated Enqueue Scripts Begin */

    wp_deregister_script( 'jquery' );
    wp_enqueue_script( 'jquery', get_template_directory_uri() . '/assets/js/jquery.min.js', false, null, true);

    wp_deregister_script( 'bootstrap' );
    wp_enqueue_script( 'bootstrap', get_template_directory_uri() . '/assets/bootstrap/js/bootstrap.min.js', false, null, true);

    wp_deregister_script( 'pikaday' );
    wp_enqueue_script( 'pikaday', 'https://cdnjs.cloudflare.com/ajax/libs/pikaday/1.6.1/pikaday.min.js', false, null, true);

    wp_deregister_script( 'theme' );
    wp_enqueue_script( 'theme', get_template_directory_uri() . '/assets/js/theme.js', false, null, true);

    /* Pinegrow generated Enqueue Scripts End */

        /* Pinegrow generated Enqueue Styles Begin */

    wp_deregister_style( 'bootstrap' );
    wp_enqueue_style( 'bootstrap', get_template_directory_uri() . '/assets/bootstrap/css/bootstrap.min.css', false, null, 'all');

    wp_deregister_style( 'style-1' );
    wp_enqueue_style( 'style-1', 'https://fonts.googleapis.com/css?family=Lato:300,400,700', false, null, 'all');

    wp_deregister_style( 'style-2' );
    wp_enqueue_style( 'style-2', 'https://fonts.googleapis.com/css?family=Baloo', false, null, 'all');

    wp_deregister_style( 'style-3' );
    wp_enqueue_style( 'style-3', 'https://fonts.googleapis.com/css?family=Boogaloo', false, null, 'all');

    wp_deregister_style( 'ionicons' );
    wp_enqueue_style( 'ionicons', get_template_directory_uri() . '/assets/fonts/ionicons.min.css', false, null, 'all');

    wp_deregister_style( 'pikaday' );
    wp_enqueue_style( 'pikaday', 'https://cdnjs.cloudflare.com/ajax/libs/pikaday/1.6.1/css/pikaday.min.css', false, null, 'all');

    wp_deregister_style( 'style' );
    wp_enqueue_style( 'style', get_bloginfo('stylesheet_url'), false, null, 'all');

    /* Pinegrow generated Enqueue Styles End */

    }
    add_action( 'wp_enqueue_scripts', 'ecp_enqueue_scripts' );
endif;

function pgwp_sanitize_placeholder($input) { return $input; }
/*
 * Resource files included by Pinegrow.
 */
/* Pinegrow generated Include Resources Begin */
require_once "inc/wp_pg_helpers.php";

    /* Pinegrow generated Include Resources End */
?>