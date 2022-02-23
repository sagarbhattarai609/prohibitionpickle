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

    /**
     * 
     * Cart Page
     * 
    */
    if ($('body.woocommerce-cart').find('div.so-offer-content.so-inline').length !== 0) {
        $('div.so-offer-content.so-inline').eq(0).before('<div class="so-offer-top-heading"><div class="text">Frequently Bought Together</div><div class="skip_link mobile_sticky"><a href="#" id="goToCouponCart">Skip & Continue to Checkout <span class="ri ri-chevron-down"></span></a></div></div>')
    }
    jQuery(document).on('click', '#goToCouponCart', function () {
        jQuery('html,body').animate({
            scrollTop: jQuery("form.woocommerce-cart-form").offset().top -= 100
        }, 1000)
        return false;
    })
    if ($('body.woocommerce-checkout').find('div.so-offer-content.so-inline').length !== 0) {
        $('div.so-offer-content.so-inline').eq(0).before('<div class="so-offer-top-heading"><div class="text">Frequently Bought Together</div><div class="skip_link mobile_sticky"><a href="#" id="goToCheckout">Skip & Continue to Checkout <span class="ri ri-chevron-down"></span></a></div></div>')
    }

    jQuery(document).on('click', '#goToCheckout', function () {
        jQuery('html,body').animate({
            scrollTop: jQuery("form.woocommerce-checkout").offset().top -= 100
        }, 1000)
        return false;
    })

})