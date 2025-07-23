<?php
# Exit if accessed directly
if ( ! defined( 'ABSPATH' ) ) exit;

require_once 'mrkv-buy-one-click-assets.php';
require_once 'mrkv-buy-one-click-shortcodes.php';

# Check if class exist
if (!class_exists('MRKV_BUY_ONE_CLICK_CONTROLLER'))
{
	/**
	 * Class for setup plugin settings CONTROLLER
	 */
	class MRKV_BUY_ONE_CLICK_CONTROLLER
	{
		/**
		 * Constructor for plugin settings CONTROLLER
		 * */
		function __construct()
		{
			# Setup plugin assets
			new MRKV_BUY_ONE_CLICK_FRONT_ASSETS();

			# Setup plugin shortcodes
			new MRKV_BUY_ONE_CLICK_SHORTCODES();
		}
	}
}