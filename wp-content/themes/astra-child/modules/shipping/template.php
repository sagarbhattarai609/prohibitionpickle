<?php
    function woocommerce_custom_shipping_zones_func($zone){
        ?>
        <div class="additional-shipping-wrap">
                <table class="form-table wc-shipping-zone-settings">
                    <tbody>
                        <tr valign="top" class="">
                            <th scope="row" class="titledesc">
                                <label for="minimum_order_limit">
                                    <?php esc_html_e( 'Zone Minimum order', 'woocommerce' ); ?>
                                    <?php echo wc_help_tip( __( 'This is minimum order amount for this shipping zone.', 'woocommerce' ) ); ?>
                                </label>
                            </th>
                            <td class="forminp">
                                <input type="number" name="zone_minimum_amt" id="minimum_order_limit" />
                            </td>
                        </tr>
                        <tr valign="top" class="">
                            <th scope="row" class="titledesc">
                                <label for="shipping_charge">
                                    <?php esc_html_e( 'Delivery Charge', 'woocommerce' ); ?>
                                    <?php echo wc_help_tip( __( 'This is delivery amount for this shipping zone.', 'woocommerce' ) ); ?>
                                </label>
                            </th>
                            <td class="forminp">
                                <input type="number" name="zone_delivery_amt" id ="shipping_charge"/>
                            </td>
                        </tr>
                        <tr valign="top" class="">
                            <th scope="row" class="titledesc">
                                <label for="minimum_amt_free_shipping_charge">
                                    <?php esc_html_e( 'Minimum Amount For Free Shipping', 'woocommerce' ); ?>
                                    <?php echo wc_help_tip( __( 'This is minimum order amount for free shipping for this shipping zone.', 'woocommerce' ) ); ?>
                                </label>
                            </th>
                            <td class="forminp">
                                <input type="number" name="zone_delivery_amt" id="minimum_amt_free_shipping_charge" />
                            </td>
                        </tr>
                    </tbody>
                </table>                
                <input type="hidden" name="zone_id" id="zone_id" value="<?php echo $zone->get_id(); ?>">
            </div>
            <style>
                h2+.wc-shipping-zone-settings tbody tr:nth-child(3) {
                    display: none;
                }
            </style>
        <?php
    }