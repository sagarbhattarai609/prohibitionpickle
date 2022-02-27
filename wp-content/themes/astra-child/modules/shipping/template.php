<?php
    function woocommerce_custom_shipping_zones_func($zone){
        ?>
        <div class="additional-shipping-wrap">
                <table class="form-table wc-shipping-zone-settings">
                    <tbody>
                        <tr valign="top" class="">
                            <th scope="row" class="titledesc">
                                <label for="zone_delivery_time">
                                    <?php esc_html_e( 'Zone delivery time', 'tvw' ); ?>
                                    <?php echo wc_help_tip( __( 'This is default delivery time (days) for this shipping zone. Can be changed for each product', 'tvw' ) ); // @codingStandardsIgnoreLine ?>
                                </label>
                            </th>
                            <td class="forminp">
                                <input type="number" data-attribute="zone_delivery_time" name="zone_delivery_time" id="zone_delivery_time" value="<?php echo $shipping->get_zone_option($zone->get_id(), 'zone_delivery_time'); ?>" placeholder="<?php esc_attr_e( 'Zone delivery time in Days', 'tvw' ); ?>" step="1" min="0">
                            </td>
                        </tr>
                        <tr valign="top" class="">
                            <th scope="row" class="titledesc">
                                <label for="zone_delivery_rate">
                                    
                                </label>
                            </th>
                            <td class="forminp">
                                <input type="number" data-attribute="zone_delivery_rate" name="zone_delivery_rate" id="zone_delivery_rate" value="<?php echo $shipping->get_zone_option($zone->get_id(), 'zone_delivery_rate'); ?>" placeholder="0" min="0">
                            </td>
                        </tr>
                        <tr valign="top" class="">
                            <th scope="row" class="titledesc">
                                <label for="zone_additional_email">
                                    <?php esc_html_e( 'Send email to Foreign fulfillment company?', 'tvw' ); ?>
                                </label>
                            </th>
                            <td class="forminp">
                                <input type="checkbox" name="zone_additional_email" id="zone_additional_email" value="1" <?php checked('true', $shipping->get_zone_option($zone->get_id(), 'zone_additional_email')); ?>>
                            </td>
                        </tr>
                    </tbody>
                </table>

                
                <input type="hidden" name="zone_id" id="zone_id" value="<?php echo $zone->get_id(); ?>">
            </div>
        <?php
    }