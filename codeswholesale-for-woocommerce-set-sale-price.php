<?php
/*
Plugin Name: CodesWholesale for WooCommerce Set Sale Price
Description: Set price as sale price when updating product price in CodesWholesale for WooCommerce
Version: 1.0.0
Author: Olav Småriset
*/

add_filter('codeswholesale_update_product_price', 'updateProductPrice', 10, 3);

/**
 * @param true $doUpdatePrice
 * @param int $postId
 * @param double $newPrice
 * @return false
 */
function updateProductPrice($doUpdatePrice, $postId, $newPrice){
    if ($newPrice > 0) {
        update_post_meta($postId, '_price', $newPrice);
        update_post_meta($postId, '_sale_price', $newPrice);
    }
    return !$doUpdatePrice;
}