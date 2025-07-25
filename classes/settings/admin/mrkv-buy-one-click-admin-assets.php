<?php
# Exit if accessed directly
if ( ! defined( 'ABSPATH' ) ) exit; 

# Check if class exist
if (!class_exists('MRKV_BUY_ONE_CLICK_ASSETS'))
{
	/**
	 * Class for setup plugin admin assets
	 */
	class MRKV_BUY_ONE_CLICK_ASSETS
	{
		/**
		 * Constructor for plugin admin assets
		 * */
		function __construct()
		{
			# Add plugin scripts and styles
			add_action('admin_enqueue_scripts', array($this, 'mrkv_buy_one_click_styles_and_scripts'));
		}

		/**
		 * Register plugin admin assets
		 * 
		 * */
	    public function mrkv_buy_one_click_styles_and_scripts($hook)
	    {
	    	global $pagenow, $typenow;
	    	
	    	$all_hooks = array('toplevel_page_mrkv_buy_one_click_settings', 'morkva-ua-shipping_page_mrkv_buy_one_click_about_us');

	    	# Check page
	    	if (!in_array($hook, $all_hooks)) {
	            return;
	        }

	        # Custom style and script
	        wp_enqueue_style('mrkv-buy-one-click', MRKV_BUY_ONE_CLICK_PLUGIN_URL . 'assets/css/admin/mrkv-buy-one-click.css', array(), '0.0.1');
	        wp_enqueue_script('mrkv-buy-one-click', MRKV_BUY_ONE_CLICK_PLUGIN_URL . 'assets/js/admin/mrkv-buy-one-click.js', array('jquery'), '0.0.1', true);
	        wp_enqueue_style( 'wp-color-picker' );
    		wp_enqueue_script( 'wp-color-picker' );

	        wp_localize_script('mrkv-buy-one-click', 'mrkv_buy_one_click_helper', [
	            	'ajax_url' => admin_url( "admin-ajax.php" ),
	            	'nonce'    => wp_create_nonce('mrkv_buy_one_click_nonce'),
	        	]);
	    }
	}
}