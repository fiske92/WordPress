<?php
// Exit if accessed directly
if ( !defined( 'ABSPATH' ) ) exit;

// BEGIN ENQUEUE PARENT ACTION
// AUTO GENERATED - Do not modify or remove comment markers above or below:

if ( !function_exists( 'chld_thm_cfg_locale_css' ) ):
    function chld_thm_cfg_locale_css( $uri ){
        if ( empty( $uri ) && is_rtl() && file_exists( get_template_directory() . '/rtl.css' ) )
            $uri = get_template_directory_uri() . '/rtl.css';
        return $uri;
    }
endif;
add_filter( 'locale_stylesheet_uri', 'chld_thm_cfg_locale_css' );

// END ENQUEUE PARENT ACTION

// dodavanje autora nakon add to cart forme
add_action('woocommerce_after_add_to_cart_form', 'dodaj_tekst');

function dodaj_tekst(){
    // stil je mogao verovatno i kroz custom field, ali sam hteo ovde da isprobam
   $short_code = '<h3 style="margin-top: 10px;"><em>[acf field="autor"]</em></h3>';
   echo do_shortcode($short_code);
}


// menjanje 'Related products' teksta
add_filter('gettext', 'change_relatedproducts_text', 10, 3);

function change_relatedproducts_text($new_text, $related_text, $source)
{
     if ($related_text === 'Related products' && $source === 'woocommerce') {
         $new_text = esc_html__('Možda Vam se dopadne:', $source);
     }
     return $new_text;
}

add_filter('woocommerce_sale_flash', 'woocommerce_custom_sale_text', 10, 3);


// promena SELL texta na proizvodima
function woocommerce_custom_sale_text($text, $post, $_product)
{
return '<span class="onsale">50% Off</span>';
}

add_filter('gettext', 'change_product_text', 10, 3);

function change_product_text($new_text, $related_text, $source)
{
     if ($related_text === 'Product' && $source === 'woocommerce') {
         $new_text = esc_html__('Proizvod', $source);
     
     }
        return $new_text;
}


