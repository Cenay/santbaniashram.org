<?php
// Exit if accessed directly
if ( !defined( 'ABSPATH' ) ) exit;

// BEGIN ENQUEUE PARENT ACTION
// AUTO GENERATED - Do not modify or remove comment markers above or below:

if ( !function_exists( 'chld_thm_cfg_parent_css' ) ):
    function chld_thm_cfg_parent_css() {
        wp_enqueue_style( 'chld_thm_cfg_parent', trailingslashit( get_template_directory_uri() ) . 'style.css', array(  ) );
    }
endif;
add_action( 'wp_enqueue_scripts', 'chld_thm_cfg_parent_css', 10 );

// END ENQUEUE PARENT ACTION
// register add to cart action
function woocommerce_template_loop_add_new_button()
{
		$value = get_field( "download_pdf_link" );

		if( $value ) {
		    
		    echo '<div class="download_pdf"><a rel="nofollow" href="'.$value.'" class="button product_type_simple add_to_cart_button ">Download PDf</a></div>';
		}
}
function dac_add_cart_button () {
    add_action( 'woocommerce_after_shop_loop_item_title', 'woocommerce_template_loop_add_new_button', 10 );
    add_action( 'woocommerce_after_shop_loop_item_title', 'woocommerce_template_loop_add_to_cart', 10 );
}
add_action( 'after_setup_theme', 'dac_add_cart_button' );

add_action( 'woocommerce_single_product_summary', 'woocommerce_template_loop_add_new_button', 30 );

?>