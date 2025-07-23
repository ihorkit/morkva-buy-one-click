<?php
# Exit if accessed directly
if ( ! defined( 'ABSPATH' ) ) exit; 

# Check if class exist
if (!class_exists('MRKV_BUY_ONE_CLICK_OPTIONS'))
{
	/**
	 * Class for setup plugin global options
	 */
	class MRKV_BUY_ONE_CLICK_OPTIONS
	{
		/**
		 * Constructor for plugin global options
		 * */
		function __construct()
		{
			# Register settings
			add_action('admin_init', array($this, 'mrkv_buy_one_click_register_settings'));
		}

		/**
		 * Register plugin options
		 * 
		 * */
	    public function mrkv_buy_one_click_register_settings() {
		    register_setting(
		        'mrkv-buy-one-click-settings-group', 
		        'm_boclick_settings',                
		        [
		            'sanitize_callback' => [ $this, 'sanitize_m_boclick_settings' ],
		        ]
		    );
		}

		/**
		 * Sanitize all settings field
		 * */
		public function sanitize_m_boclick_settings( $input ) {
		    $output = [];

		    if ( is_array( $input ) ) {
		        foreach ( $input as $key => $value ) {
		            if ( is_array( $value ) ) {
		                $output[ sanitize_key( $key ) ] = array_map( 'sanitize_text_field', $value );
		            } else {
		                $output[ sanitize_key( $key ) ] = sanitize_text_field( $value );
		            }
		        }
		    }

		    return $output;
		}
	}
}