<?php
# Exit if accessed directly
if ( ! defined( 'ABSPATH' ) ) exit; 

# Check if class exist
if (!class_exists('MRKV_BUY_ONE_CLICK_SHORTCODES'))
{
	/**
	 * Class for setup plugin shortcodes
	 */
	class MRKV_BUY_ONE_CLICK_SHORTCODES
	{
		/**
		 * Constructor for plugin shortcodes
		 * */
		function __construct()
		{
			add_shortcode( 'mrkv_buy_one_click', [$this, 'mrkv_render_buy_one_click_shortcode'] );
		}

		/**
		 * Render product buy one click form
		 * */
		public function mrkv_render_buy_one_click_shortcode()
		{
			ob_start();

			$template_path = MRKV_BUY_ONE_CLICK_PLUGIN_PATH . 'templates/front/template-buy-one-click-button.php';
			$settings_data = get_option('mrkv_buy_one_settings');
			$is_active_show = isset($settings_data['enabled']) ? $settings_data['enabled'] : '';
			global $product;

			if ( file_exists( $template_path ) && $is_active_show && $product && $product->is_type( 'simple' )) 
			{
				$settings_data = apply_filters( 'mrkv_buy_one_click_settings_data', $settings_data );

				# Content
				$open_call_btn_text = isset($settings_data['content']['btn_front']) && $settings_data['content']['btn_front'] ? $settings_data['content']['btn_front'] : esc_html__('Buy now', 'morkva-buy-one-click');

				# Styles Flatsome
				$theme      = wp_get_theme();
			    $parent     = $theme->parent();
			    $flatsome_btn_class = '';

				if ( ($parent && $parent->get( 'Name' ) === 'Flatsome') || $theme->get( 'Name' ) === 'Flatsome') 
				{
					$flatsome_btn_class = isset($settings_data['style']['flatsome']) ? $settings_data['style']['flatsome'] : '';
				}

		        include $template_path;

		        add_action('wp_footer', [$this, 'mrkv_buy_one_click_footer_content']);
		    }

			return ob_get_clean();
		}

		/**
		 * Render content in footer
		 * */
		public function mrkv_buy_one_click_footer_content()
		{
			$settings_data = get_option('mrkv_buy_one_settings');

			$form_title = isset($settings_data['content']['title']) ? $settings_data['content']['title'] : '';
			$form_subtitle = isset($settings_data['content']['subtitle']) ? $settings_data['content']['subtitle'] : '';
			$before_btn_text = isset($settings_data['content']['before_btn']) ? $settings_data['content']['before_btn'] : '';
			$button_form_txt = isset($settings_data['content']['button']) && $settings_data['content']['button'] ? $settings_data['content']['button'] : esc_html__('Buy now', 'morkva-buy-one-click');
			$result_text = isset($settings_data['content']['result_text']) ? $settings_data['content']['result_text'] : '';
			$result_title = isset($settings_data['content']['result_title']) ? $settings_data['content']['result_title'] : '';

			if(!$result_title)
			{
				$result_title = esc_html__( 'Order created', 'morkva-buy-one-click' ) . ' №<span class="mrkv_buy-one-click__order_number"></span>';
			}

			$result_title = str_replace("[mrkv_boc_order_id]", ' №<span class="mrkv_buy-one-click__order_number"></span>', $result_title);

			# Styles Flatsome
			$theme      = wp_get_theme();
		    $parent     = $theme->parent();
		    $flatsome_btn_class = '';

			if ( ($parent && $parent->get( 'Name' ) === 'Flatsome') || $theme->get( 'Name' ) === 'Flatsome') 
			{
				$flatsome_btn_class = isset($settings_data['style']['flatsome']) ? $settings_data['style']['flatsome'] : '';
			}

			global $product;
			$product_id    = $product->get_id();

			$template_path = MRKV_BUY_ONE_CLICK_PLUGIN_PATH . 'templates/front/template-buy-one-click-form.php';

			include $template_path;
		}
	}
}