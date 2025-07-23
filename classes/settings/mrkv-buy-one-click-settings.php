<?php
# Exit if accessed directly
if ( ! defined( 'ABSPATH' ) ) exit; 

# Include options
require_once 'global/mrkv-buy-one-click-options.php'; 
# Include menu
require_once 'admin/mrkv-buy-one-click-menu.php'; 
# Include assets
require_once 'admin/mrkv-buy-one-click-admin-assets.php';

# Check if class exist
if (!class_exists('MRKV_BUY_ONE_CLICK_SETTINGS'))
{
	/**
	 * Class for setup plugin settings
	 */
	class MRKV_BUY_ONE_CLICK_SETTINGS
	{
		/**
		 * Constructor for plugin settings
		 * */
		function __construct()
		{
			# Setup plugin settings options
			new MRKV_BUY_ONE_CLICK_OPTIONS();

			# Setup plugin settings menu
			new MRKV_BUY_ONE_CLICK_MENU();

			# Setup woo plugin settings assets
			new MRKV_BUY_ONE_CLICK_ASSETS();
		}
	}
}