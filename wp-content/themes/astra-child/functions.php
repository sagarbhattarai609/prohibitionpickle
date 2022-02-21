<?php
/**
 * Astra Child Theme functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package Astra Child
 * @since 1.0.0
 */

/**
 * Define Constants
 */
define( 'CHILD_THEME_ASTRA_CHILD_VERSION', '1.0.0' );

/**
 * Enqueue styles
 */
function child_enqueue_styles() {

	wp_enqueue_style( 'custom-css', get_stylesheet_directory_uri() . '/css/custom.css' );
	wp_enqueue_style( 'astra-child-theme-css', get_stylesheet_directory_uri() . '/style.css', array('astra-theme-css'), CHILD_THEME_ASTRA_CHILD_VERSION, 'all' );
	
	wp_enqueue_script( 'custom-script', get_stylesheet_directory_uri() . '/js/script.js', array( 'jquery' ) );
}

add_action( 'wp_enqueue_scripts', 'child_enqueue_styles', 15 );


/**
* Add the field to the checkout page
*/

add_action( 'woocommerce_after_order_notes', 'tl_some_custom_checkout_field' );
function tl_some_custom_checkout_field( $checkout ) 
{
	woocommerce_form_field( 'gift_message', array(
		'type'         => 'textarea',
		'class'         => array('gift-message form-row-wide'),
		'label'         => __('Gift Message'),
		'placeholder'   => __('Notes to appear in your gift...'),
		'required'     => false,
	), $checkout->get_value( 'gift_message' ));
}

/**
* Update the order meta with field value
*/

add_action( 'woocommerce_checkout_update_order_meta', 'tl_some_custom_checkout_field_update_order_meta' );

function tl_some_custom_checkout_field_update_order_meta( $order_id ) {

	if ( ! empty( $_POST['gift_message'] ) ) {
		update_post_meta( $order_id, 'gift_message', sanitize_text_field( $_POST['gift_message'] ) );
	}
}


/**
 * 
 * Show offer products as popup after adding product to cart
 * 
 * */ 

add_action( 'woocommerce_after_single_product_summary', 'show_smart_offer_single_product_func', 10 );
function show_smart_offer_single_product_func() { 
    ?>
		<div class="smart-offers-popup-content-wrapper">
			<div class="popup-content mfp-hide" id="offer-popup">
				<?php echo do_shortcode("[so_show_offers]");?>
			</div>
		</div>
	<?php
}; 
         
/**
 * 
 * Scheduled Popup
 * 
 * */ 

function schedule_my_popup( $is_loadable, $popup_id ) {

	if( $popup_id == 2743 ) {	
		date_default_timezone_set('Asia/Jerusalem'); // Change to your time zone.				
		$now = strtotime( 'now' );		
		if( date('w', $now) != 1 ||  date('w',$now) !=2 )
		{
			if(date('w',$now) == 3 && date('H',$now) < 15)
			{
				$is_loadable = 0;
			}
			else if(date('w',$now) == 0  && date('H',$now) > 9 )
			{
				$is_loadable = 0;
			}
			else{
				$is_loadable = 1;
			}
		}
		else{
			$is_loadable = 0;
		}
	}
	return $is_loadable;
}
add_filter( 'pum_popup_is_loadable', 'schedule_my_popup', 2, 1000 );

/**
 * 
 * show delivery limitation in product archive page
 * 
 * */ 

add_action( 'woocommerce_archive_description', 'show_delivery_limitation_func', 10 );

function show_delivery_limitation_func (){
	$category = get_queried_object();	
	if(is_product_category()){
		$args = array(
			'post_type' => 'delivery_limitations',
			'post_status' => 'publish',
			'posts_per_page' => -1,
			'tax_query' => array(
				array(
					'taxonomy' => 'product_cat',
					'field' => 'slug',
					'terms' => $category->slug
				)
		  	)
		);
		$query = new WP_Query( $args );
		if ( $query->have_posts() ) :
			while ( $query->have_posts() ) : $query->the_post();?>
				<div class="delivery_limitaion_wrapper">
					<div class="title">
						<h1><?php the_title();?>
					</div>
					<div class="content">
						<?php the_content();?>
					</div>
				</div>
			<?php endwhile;
		endif;

	}
}  

/**
 * 
 * Show delivery limitaion in the single product page 
 * 
 * */ 
add_action('woocommerce_before_add_to_cart_form', 'delivery_limitaion_single_product_func',10);

function delivery_limitaion_single_product_func()
{
	if(is_product()){
		$post = get_field('delivery_limitation');
		if( $post ): ?>
			<div class="delivery_limitaion_wrapper">
				<div class="title">	<h3><?php echo esc_html( $post->post_title ); ?></h3></div>
				<div class="content"><?php echo $post->post_content;?></div>
			</div>
		<?php endif; 
	}
}