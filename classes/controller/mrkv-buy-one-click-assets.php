<?php
# Exit if accessed directly
if ( ! defined( 'ABSPATH' ) ) exit; 

# Check if class exist
if (!class_exists('MRKV_BUY_ONE_CLICK_FRONT_ASSETS'))
{
	/**
	 * Class for setup plugin front assets
	 */
	class MRKV_BUY_ONE_CLICK_FRONT_ASSETS
	{
		/**
		 * Constructor for plugin front assets
		 * */
		function __construct()
		{
			add_action( 'wp_enqueue_scripts', [$this, 'mrkv_enqueue_assets_on_product_page'] );
		}

		public function mrkv_enqueue_assets_on_product_page()
		{
			if ( is_product() ) 
			{
				$settings_data = get_option('m_boclick_settings');
				$is_active_show = isset($settings_data['enabled']) ? $settings_data['enabled'] : '';

				if($is_active_show)
				{
					# Styles
					$form_background = isset($settings_data['style']['form_background']) ? $settings_data['style']['form_background'] : '#ffffff';
					$form_text_color = isset($settings_data['style']['form_text_color']) ? $settings_data['style']['form_text_color'] : '#000000';
					$form_btn_back = isset($settings_data['style']['form_btn_back']) ? $settings_data['style']['form_btn_back'] : '#ed6230';
					$form_btn_txt = isset($settings_data['style']['form_btn_txt']) ? $settings_data['style']['form_btn_txt'] : '#ffffff';
					$open_btn_back = isset($settings_data['style']['open_btn_back']) ? $settings_data['style']['open_btn_back'] : '#ed6230';
					$open_btn_txt = isset($settings_data['style']['open_btn_txt']) ? $settings_data['style']['open_btn_txt'] : '#ffffff';
					$border_style = isset($settings_data['style']['type']) ? $settings_data['style']['type'] : 'flat';

					$border_radius = ($border_style == 'flat') ? '30px' : '0px'; 

					# Typography
					$title_fs = isset($settings_data['style']['title_fs']) ? $settings_data['style']['title_fs'] : '';
					$subtitle_fs = isset($settings_data['style']['subtitle_fs']) ? $settings_data['style']['subtitle_fs'] : '';
					$label_fs = isset($settings_data['style']['label_fs']) ? $settings_data['style']['label_fs'] : '';
					$button_fs = isset($settings_data['style']['button_fs']) ? $settings_data['style']['button_fs'] : '';

					$settings_css = "
						.mrkv_buy-one-click__form__inner, .mrkv_buy-one-click__open-call,
						#mrkv_buy-one-click__username, #mrkv_buy-one-click__phone, .mrkv_buy-one-click__create_order,
						.mrkv_buy-one-click__product__img img, .mrkv_buy-one-click__form__inner .iti__selected-flag{
							border-radius: {$border_radius};
						}
						.mrkv_buy-one-click__form__inner{ background-color: {$form_background}; color: {$form_text_color};  }
						.mrkv_buy-one-click__form__inner h2, .mrkv_buy-one-click__form__inner p,
						.mrkv_buy-one-click__form__inner label, .mrkv_buy-one-click__product__info h5{
							color: {$form_text_color};
						}
						.mrkv_buy-one-click__title{ font-size: {$title_fs}px; }
						.mrkv_buy-one-click__form__inner p{ font-size: {$subtitle_fs}px; }
						.mrkv_buy-one-click__form__inner label{ font-size: {$label_fs}px; }
						.mrkv_buy-one-click__open-call{ background-color: {$open_btn_back}; color: {$open_btn_txt}; font-size: {$button_fs}px; }
						.mrkv_buy-one-click__create_order{ background-color: {$form_btn_back}; color: {$form_btn_txt}; font-size: {$button_fs}px; }
					";

					$args = array(
			        	'ajax_url' => admin_url( 'admin-ajax.php' ), 
			        	'nonce'    => wp_create_nonce('mrkv_buy_one_click_nonce')
			        );

					# Custom style and script
			        wp_enqueue_style('front-mrkv-buy-one-click', MRKV_BUY_ONE_CLICK_PLUGIN_URL . 'assets/css/front/front-mrkv-buy-one-click.css', array(), '0.1.0');
			        wp_enqueue_script('front-buy-one-click', MRKV_BUY_ONE_CLICK_PLUGIN_URL . 'assets/js/front/front-buy-one-click.js', array('jquery'), '0.1.0', true);
			        wp_localize_script('front-buy-one-click', 'mrkv_buy_one_click_helper', $args);

			        wp_add_inline_style( 'front-mrkv-buy-one-click', $settings_css );

			        wp_enqueue_style(
					    'intl-tel-input',
					    MRKV_BUY_ONE_CLICK_PLUGIN_URL . 'assets/css/front/front-mrkv-but-one-click-tel.css',
					    array(),
					    '17.0.8'
					);

					wp_enqueue_script(
					    'intl-tel-input',
					    MRKV_BUY_ONE_CLICK_PLUGIN_URL . 'assets/js/front/front-mrkv-but-one-click-tel.js',
					    array('jquery'),
					    '17.0.8',
					    true
					);

					wp_enqueue_script(
					    'intl-tel-input-utils',
					    MRKV_BUY_ONE_CLICK_PLUGIN_URL . 'assets/js/front/utils.js',
					    array('intl-tel-input'),
					    '17.0.8',
					    true
					);

				}
			}
		}
	}
}