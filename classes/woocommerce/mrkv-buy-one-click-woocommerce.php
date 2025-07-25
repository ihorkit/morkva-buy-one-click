<?php
# Exit if accessed directly
if ( ! defined( 'ABSPATH' ) ) exit; 

# Check if class exist
if (!class_exists('MRKV_BUY_ONE_CLICK_WOOCOMMERCE'))
{
	/**
	 * Class for setup plugin settings WOOCOMMERCE
	 */
	class MRKV_BUY_ONE_CLICK_WOOCOMMERCE
	{
		/**
		 * Constructor for plugin settings WOOCOMMERCE
		 * */
		function __construct()
		{
			add_action( 'wp_ajax_mrkv_buy_one_click__create_order', array($this, 'mrkv_buy_one_click__create_order_func') );
			add_action( 'wp_ajax_nopriv_mrkv_buy_one_click__create_order', array($this, 'mrkv_buy_one_click__create_order_func') );

			add_action('woocommerce_single_product_summary', array($this, 'mrkv_buy_one_click__add_btn'), 31);
		}

		/**
		 * Create buy one click order
		 * */
		public function mrkv_buy_one_click__create_order_func()
		{
			if (!isset($_POST['nonce']) || !wp_verify_nonce(sanitize_text_field( wp_unslash($_POST['nonce'])), 'mrkv_buy_one_click_nonce')) {
		        wp_send_json_error(__('Invalid nonce.', 'morkva-buy-one-click'), 403);
		        wp_die();
		    }

		    $product_id = isset($_POST['product_id']) ? sanitize_text_field(wp_unslash($_POST['product_id'])) : '';
		    $first_name = isset($_POST['first_name']) ? sanitize_text_field(wp_unslash($_POST['first_name'])) : '';
		    $phone = isset($_POST['phone']) ? '380' . sanitize_text_field(wp_unslash($_POST['phone'])) : '';

		    $product = wc_get_product( $product_id );

		    $settings_data = get_option('mrkv_buy_one_settings');
			$is_active_show = isset($settings_data['enabled']) ? $settings_data['enabled'] : '';
			$order_status = 'on-hold';

		    if($is_active_show && $product && $first_name && $phone)
		    {
		    	if ( strpos( $order_status, 'wc-' ) !== 0 ) {
			        $order_status = 'wc-' . $order_status;
			    }

		    	$order = wc_create_order();
		    	$order->add_product( $product, 1 );
		    	$order->set_address( array(
			        'first_name' => sanitize_text_field( $first_name ),
			        'phone'      => sanitize_text_field( $phone ),
			    ), 'billing' );
			    $order->set_status( $order_status ); 
			    $order->calculate_totals();
			    $order->save();

			    WC()->mailer()->emails['WC_Email_New_Order']->trigger($order->get_id());

			    wp_send_json( array(
				    'order_number' => $order->get_id(),
				) );
		    }

		    wp_die();
		}

		public function mrkv_buy_one_click__add_btn()
		{
			$settings_data = get_option('mrkv_buy_one_settings');

		    if ( isset($settings_data['position']) && $settings_data['position'] === 'after_add_to_cart_button' ) {
		        echo do_shortcode('[mrkv_buy_one_click]');
		    }
		}
	}
}