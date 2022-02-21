jQuery(document).ready(function ($) {

    if($('.woocommerce-checkout').find('#tgpc_enable_checkout_gift_wrapper').prop('checked') == true)
    {
        $('p.gift-message').show();
    }
    else{
        $('p.gift-message').hide();
    }

    $('.woocommerce-checkout').find('#tgpc_enable_checkout_gift_wrapper').on('change', function () {
        if ($(this).prop("checked") == true) {
            $('p.gift-message').show();
        }
        else if ($(this).prop("checked") == false) {
            $('p.gift-message').hide();
        }
    })
    // show popup when product is added to cart

    $('body').on( 'added_to_cart', function(){
        $.magnificPopup.open({
            items: {
              src: '#offer-popup'
            },
            type: 'inline'
          });
    });

})