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


add_action( 'woocommerce_archive_description', 'show_delivery_limitation_func', 10 );

function show_delivery_limitation_func (){
	if(is_product_category()){
		$args = array(
			'post_type' => 'delivery_limitations',
			'post_status' => 'publish',
			'category_name' => 'product_cat',
			'posts_per_page' => -1,
		);
		$query = new WP_Query( $args );

		if ( $query->have_posts() ) :while ( $query->have_posts() ) : $query->the_post();	?>
			<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
				<h1 class="entry-title"><?php the_title(); ?></h1>
				<div class="content">
					<?php the_content();?>
				</div>
			</article>
		<?php endwhile; endif;
	}
}  