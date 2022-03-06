jQuery(document).ready(function ($) {

    console.log('var', site_var)

    $('#minimum_amt_free_shipping_charge , #shipping_charge , #minimum_order_limit').on('change', function () {
        // $('.wc-shipping-zone-method-save').removeAttr('disabled')
        $('#zone_name').change();
    })
    $('.wc-shipping-zone-method-save').on('click', function () {
        console.log('clicked')
        $.ajax({
            type: 'POST',
            url: site_var.ajaxurl,
            data: {
                action: 'change_in_shipping_setting',
            },
            success: function (res) {
                console.log(res)
            }
        });
        return false;
    });
})