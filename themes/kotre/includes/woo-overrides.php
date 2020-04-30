<?php
/**
 * Load files.
 *
 * @package Kotre
 */

//=============================================================
// Change number of product per row
//=============================================================

if (!function_exists('kotre_product_columns')) {

	function kotre_product_columns() {

		return 3; // number of products per row

	}
	
}

add_filter('loop_shop_columns', 'kotre_product_columns');

//=============================================================
// Change number of related product
//=============================================================

if (!function_exists('kotre_related_products_args')) {

	function kotre_related_products_args( $args ) {

		$args['columns']   		= 3;
		
		$args['posts_per_page'] = 3; // number of related products
		
		return $args;
	}

}

add_filter( 'woocommerce_output_related_products_args', 'kotre_related_products_args', 10 );


//=============================================================
// Change number of upsell products
//=============================================================

remove_action( 'woocommerce_after_single_product_summary', 'woocommerce_upsell_display', 15 );

add_action( 'woocommerce_after_single_product_summary', 'kotre_output_upsells', 15 );

if ( ! function_exists( 'kotre_output_upsells' ) ) {

	function kotre_output_upsells() {

	    woocommerce_upsell_display( 3, 3 ); // Display 3 products in rows of 3
	    
	}

}

remove_action( 'woocommerce_after_shop_loop_item', 'woocommerce_template_loop_product_link_close', 5 );

remove_action( 'woocommerce_shop_loop_item_title', 'woocommerce_template_loop_product_title', 10 );


add_action( 'woocommerce_shop_loop_item_title', 'kotre_woocommerce_template_loop_product_title', 10 );

if ( ! function_exists( 'kotre_woocommerce_template_loop_product_title' ) ) {

	/**
	 * Show the product title in the product loop. By default this is an H2.
	 */
	function kotre_woocommerce_template_loop_product_title() {
		echo '<h2 class="woocommerce-loop-product__title">' . get_the_title() . '</h2>';
		echo '</a>';
	}
}

// Remove sidebar in woocommerce page and add conditional sidebar
remove_action('woocommerce_sidebar', 'woocommerce_get_sidebar', 10); 

// Update number of items in cart and total after Ajax
add_filter( 'woocommerce_add_to_cart_fragments', 'kotre_header_add_to_cart_fragment' );

function kotre_header_add_to_cart_fragment( $fragments ) {
	
	global $woocommerce;
	
	ob_start(); ?>

	<span class="cart-value kotre-cart-fragment"> <?php echo wp_kses_data( WC()->cart->get_cart_contents_count() );?></span>

	<?php

	$fragments['span.kotre-cart-fragment'] = ob_get_clean();

	return $fragments;
	
}