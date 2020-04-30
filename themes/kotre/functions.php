<?php
 /**
 * Kotre functions and definitions.
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package Kotre
 */

if ( ! function_exists( 'kotre_setup' ) ) :
 /**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which
 * runs before the init hook. The init hook is too late for some features, such
 * as indicating support for post thumbnails.
 */
function kotre_setup() {
	/*
	 * Make theme available for translation.
	 * Translations can be filed in the /languages/ directory.
	 * If you're building a theme based on Kotre, use a find and replace
	 * to change 'kotre' to the name of your theme in all the template files.
	 */
	load_theme_textdomain( 'kotre', get_template_directory() . '/languages' );

	// Add default posts and comments RSS feed links to head.
	add_theme_support( 'automatic-feed-links' );

	/*
	 * Let WordPress manage the document title.
	 * By adding theme support, we declare that this theme does not use a
	 * hard-coded <title> tag in the document head, and expect WordPress to
	 * provide it for us.
	 */
	add_theme_support( 'title-tag' );

	/*
	 * Enable support for custom logo.
	 */
	add_theme_support( 'custom-logo' );

	/*
	 * Enable support for Post Thumbnails on posts and pages.
	 *
	 * @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
	 */
	add_theme_support( 'post-thumbnails' );

	// Register navigation menu locations.
	register_nav_menus( array(
		'primary' 	=> esc_html__( 'Main Header Menu', 'kotre' ),
		'social'  	=> esc_html__( 'Social Links', 'kotre' ),
	) );

	/*
	 * Switch default core markup for search form, comment form, and comments
	 * to output valid HTML5.
	 */
	add_theme_support( 'html5', array(
		'search-form',
		'comment-form',
		'comment-list',
		'gallery',
		'caption',
	) );

	// Add theme support for selective refresh for widgets.
	add_theme_support( 'customize-selective-refresh-widgets' );

	// Add support for Block Styles.
	add_theme_support( 'wp-block-styles' );

	// Add support for full and wide align images.
	add_theme_support( 'align-wide' );

	// Add support for responsive embedded content.
	add_theme_support( 'responsive-embeds' );

	// Set up the WordPress core custom background feature.
	add_theme_support( 'custom-background', apply_filters( 'kotre_custom_background_args', array(
		'default-color' => 'ffffff',
		'default-image' => '',
	) ) );

	// Add woocommerce support, lightbox and thumbnail slider.
	add_theme_support( 'woocommerce' );
	add_theme_support( 'wc-product-gallery-lightbox' );
	add_theme_support( 'wc-product-gallery-slider' );

}
endif;
add_action( 'after_setup_theme', 'kotre_setup' );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function kotre_content_width() {
	$GLOBALS['content_width'] = apply_filters( 'kotre_content_width', 760 );
}
add_action( 'after_setup_theme', 'kotre_content_width', 0 );

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function kotre_widgets_init() {

	for( $i = 1; $i <= 3; $i++ ) {
	    register_sidebar( array(
	        /* translators: 1: Widget number. */
	        'name'          => sprintf( esc_html__( 'Footer %d', 'kotre' ), $i ),
	        'id'            => 'footer-'.$i,
	        'before_widget' => '<div id="%1$s" class="widget footer-widgets %2$s">',
	        'after_widget'  => '</div>',
	        'before_title'  => '<h2 class="widget-title">',
	        'after_title'   => '</h2>',
	    ) );
	}
}
add_action( 'widgets_init', 'kotre_widgets_init' );

/**
* Enqueue scripts and styles.
*/
function kotre_scripts() {

	wp_enqueue_style( 'kotre-fonts', kotre_fonts_url(), array(), null );

	wp_enqueue_style( 'jquery-meanmenu', get_template_directory_uri() . '/assets/third-party/meanmenu/meanmenu.min.css' );

	wp_enqueue_style( 'font-awesome', get_template_directory_uri() . '/assets/third-party/font-awesome/css/font-awesome.min.css', '', '4.7.0' );

	wp_enqueue_style( 'kotre-style', get_stylesheet_uri() );

	wp_enqueue_script( 'kotre-navigation', get_template_directory_uri() . '/assets/js/navigation.js', array(), '20151215', true );

	wp_enqueue_script( 'kotre-skip-link-focus-fix', get_template_directory_uri() . '/assets/js/skip-link-focus-fix.js', array(), '20151215', true );

	wp_enqueue_script( 'jquery-meanmenu', get_template_directory_uri() . '/assets/third-party/meanmenu/jquery.meanmenu.min.js', array('jquery'), '2.0.8', true );

	wp_enqueue_script( 'kotre-custom', get_template_directory_uri() . '/assets/js/custom.js', array( 'jquery' ), '1.0.7', true );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'kotre_scripts' );

// Load main file.
require_once trailingslashit( get_template_directory() ) . '/includes/main.php';