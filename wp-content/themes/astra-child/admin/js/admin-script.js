jQuery(document).ready(function($){
    $('#minimum_amt_free_shipping_charge','#shipping_charge','#minimum_order_limit').on('change',function(){
        $('.wc-shipping-zone-method-save').removeAttr('disabled')
    })
})