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
add_action( 'wp_ajax_save_shipping_setting', 'PickleShipping::save_shipping_setting_func' );


