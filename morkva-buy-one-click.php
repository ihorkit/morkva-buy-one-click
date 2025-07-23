<?php 
/**
 * Plugin Name: Morkva Buy One Click
 * Description: Add a quick "Buy in One Click" button to your WooCommerce product pages. Let customers place orders instantly with minimal steps.
 * Version: 0.1.0
 * Tested up to: 6.8
 * Requires at least: 5.2
 * Requires PHP: 7.4
 * Author: MORKVA
 * Author URI: https://morkva.co.ua
 * Text Domain: morkva-buy-one-click
 * WC requires at least: 5.4.0
 * WC tested up to: 9.8.0
 * Domain Path: /i18n/
 * License: GPLv2 or later
 * License URI: https://www.gnu.org/licenses/gpl-2.0.html
 */

#  Stop access .php files through URL
if (! defined('ABSPATH')){
    exit;
}

add_action( 'before_woocommerce_init', function() {
    if ( class_exists( \Automattic\WooCommerce\Utilities\FeaturesUtil::class ) ) {
        \Automattic\WooCommerce\Utilities\FeaturesUtil::declare_compatibility( 'custom_order_tables', __FILE__, true );
    }
} );

# To check the woocommerce plugin is active or not 
if ( ! in_array( 'woocommerce/woocommerce.php', apply_filters( 'active_plugins', get_option( 'active_plugins' ) ) ) ) return;

# Global File
define('MRKV_BUY_ONE_CLICK_PLUGIN_FILE', __FILE__);
define('MRKV_BUY_ONE_CLICK_PLUGIN_PATH', plugin_dir_path(__FILE__));
define('MRKV_BUY_ONE_CLICK_PLUGIN_URL', plugin_dir_url(__FILE__));

/**
 * Initialize the plugin after all plugins are loaded.
 */
function mrkv_buy_one_click_init() 
{
    if ( ! class_exists( 'WooCommerce' ) ) 
    {
        return;
    }

    # Include and initialize the main plugin class
    require_once 'classes/mrkv-buy-one-click-run.php';
    new MRKV_BUY_ONE_CLICK_RUN();
}

add_action( 'init', 'mrkv_buy_one_click_init' );