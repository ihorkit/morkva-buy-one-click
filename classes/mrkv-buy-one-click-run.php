<?php
# Exit if accessed directly
if ( ! defined( 'ABSPATH' ) ) exit; 

# Include settings
require_once 'settings/mrkv-buy-one-click-settings.php'; 
require_once 'controller/mrkv-buy-one-click-controller.php';
require_once 'woocommerce/mrkv-buy-one-click-woocommerce.php';

# Check if class exist
if (!class_exists('MRKV_BUY_ONE_CLICK_RUN'))
{
	/**
	 * Class for setup plugin 
	 */
	class MRKV_BUY_ONE_CLICK_RUN
	{
		/**
		 * Constructor for plugin setup
		 * */
		function __construct()
		{
			# Setup plugin settings
			new MRKV_BUY_ONE_CLICK_SETTINGS();

			# Setup plugin settings controller
			new MRKV_BUY_ONE_CLICK_CONTROLLER();

			# Setup plugin settings woocommerce
			new MRKV_BUY_ONE_CLICK_WOOCOMMERCE();
		}
	}
}