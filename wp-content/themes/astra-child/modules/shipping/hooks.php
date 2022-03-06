<?php

/**
 * 
 * To add Custom template in Shipping Setting
 * 
 * */ 
add_action('woocommerce_shipping_zone_after_methods_table', 'woocommerce_custom_shipping_zones_func', 10, 1);

/**
 * 
 * To run ajax when shipping setting is saved
 * 
 * */ 
add_action( 'wp_ajax_change_in_shipping_setting', 'PickleDelivery::change_in_shipping_setting_func' );


