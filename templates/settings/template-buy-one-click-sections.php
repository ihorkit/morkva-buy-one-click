<?php if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly ?>
<section id="basic_settings" class="mrkv_up_ship_shipping_tab_block active">
	<h2>
		<img src="<?php echo esc_url( MRKV_BUY_ONE_CLICK_PLUGIN_URL . 'assets/images/settings-icon.svg' ); ?>" alt="Basic settings" title="Basic settings">
		<?php echo esc_html__( 'Basic settings', 'morkva-buy-one-click' ); ?>
	</h2>
	<hr class="mrkv-ua-ship__hr">
	<div class="admin_ua_ship_morkva_settings_row">
		<div class="col-mrkv-5">
			<div class="admin_ua_ship_morkva_settings_line">
				<?php
					$data = isset($settings_data['enabled']) ? $settings_data['enabled'] : '';
					echo wp_kses($field_creator->get_input_checkbox(esc_html__('Enable/Disable', 'morkva-buy-one-click'), $settings_slug . '[enabled]', $data, $settings_slug . '_enabled'), $allowed_tags);
				?>
				<p class="mrkv-ua-ship-description">
				    <?php echo esc_html__( 'Enable to activate the buy one click functionality on your website', 'morkva-buy-one-click' ); ?>
				</p>
			</div>
		</div>
		<div class="col-mrkv-5">
			<div class="admin_ua_ship_morkva_settings_line">
				<label for="nova-poshta_m_ua_settings_api_key">
					<?php echo esc_html__('Shortcode', 'morkva-buy-one-click'); ?>
				</label>
				<input type="text" value="[mrkv_buy_one_click]" readonly>
			</div>
		</div>
	</div>
	<div class="admin_ua_ship_morkva_settings_row">
		<div class="col-mrkv-5">
			<div class="admin_ua_ship_morkva_settings_line">
				<?php 
					$data = isset($settings_data['order_status']) ? $settings_data['order_status'] : '';
					echo wp_kses($field_creator->get_select_simple(__('Choose a status created order', 'morkva-buy-one-click'), $settings_slug . '[order_status]', $all_order_statuses, $data, $settings_slug . '_order_status' , __('Choose a status', 'morkva-buy-one-click')), $allowed_tags);
				?>
			</div>
		</div>
		<div class="col-mrkv-5">
		</div>
	</div>
	<h3><img src="<?php echo esc_url(MRKV_BUY_ONE_CLICK_PLUGIN_URL . 'assets/images/clapperboard-edit-icon.svg'); ?>" alt="Form content" title="Form content"><?php echo esc_html__('Form content', 'morkva-buy-one-click'); ?></h3>
	<p><?php echo esc_html__('Introduce additional content to your form', 'morkva-buy-one-click'); ?></p>
	<hr class="mrkv-ua-ship__hr">
	<div class="admin_ua_ship_morkva_settings_row">
		<div class="col-mrkv-5">
			<div class="admin_ua_ship_morkva_settings_line">
				<?php 
					$data = isset($settings_data['content']['title']) ? $settings_data['content']['title'] : '';
					$description = '';

					echo wp_kses($field_creator->get_input_text(esc_html__('Title', 'morkva-buy-one-click'), $settings_slug . '[content][title]', $data, $settings_slug. '_content_title' , '', esc_html__('Enter the title...', 'morkva-buy-one-click'), $description), $allowed_tags);
				?>
			</div>
		</div>
		<div class="col-mrkv-5">
			<div class="admin_ua_ship_morkva_settings_line">
				<?php 
					$data = isset($settings_data['content']['subtitle']) ? $settings_data['content']['subtitle'] : '';
					$description = '';

					echo wp_kses($field_creator->get_input_text(esc_html__('Subtitle', 'morkva-buy-one-click'), $settings_slug . '[content][subtitle]', $data, $settings_slug. '_content_subtitle' , '', esc_html__('Enter the subtitle...', 'morkva-buy-one-click'), $description), $allowed_tags);
				?>
			</div>
		</div>
	</div>
	<div class="admin_ua_ship_morkva_settings_row">
		<div class="col-mrkv-5">
			<div class="admin_ua_ship_morkva_settings_line">
				<?php 
					$data = isset($settings_data['content']['before_btn']) ? $settings_data['content']['before_btn'] : '';
					$description = '';

					echo wp_kses($field_creator->get_input_text(esc_html__('Text before button', 'morkva-buy-one-click'), $settings_slug . '[content][before_btn]', $data, $settings_slug. '_content_before_btn' , '', esc_html__('Enter the text...', 'morkva-buy-one-click'), $description), $allowed_tags);
				?>
			</div>
		</div>
		<div class="col-mrkv-5">
			<div class="admin_ua_ship_morkva_settings_line">
				<?php 
					$data = isset($settings_data['content']['button']) ? $settings_data['content']['button'] : '';
					$description = '';

					echo wp_kses($field_creator->get_input_text(esc_html__('Button text (Default: Buy now)', 'morkva-buy-one-click'), $settings_slug . '[content][button]', $data, $settings_slug. '_content_button' , '', esc_html__('Enter the text...', 'morkva-buy-one-click'), $description), $allowed_tags);
				?>
			</div>
		</div>
	</div>
	<div class="admin_ua_ship_morkva_settings_row">
		<div class="col-mrkv-5">
			<div class="admin_ua_ship_morkva_settings_line">
				<?php 
					$data = isset($settings_data['content']['btn_front']) ? $settings_data['content']['btn_front'] : '';
					$description = '';

					echo wp_kses($field_creator->get_input_text(esc_html__('Open form button text (Default: Buy now)', 'morkva-buy-one-click'), $settings_slug . '[content][btn_front]', $data, $settings_slug. '_content_btn_front' , '', esc_html__('Enter the text...', 'morkva-buy-one-click'), $description), $allowed_tags);
				?>
			</div>
		</div>
		<div class="col-mrkv-5">
			<div class="admin_ua_ship_morkva_settings_line">
				<?php 
					$data = isset($settings_data['content']['result_text']) ? $settings_data['content']['result_text'] : '';
					$description = '';

					echo wp_kses($field_creator->get_input_text(esc_html__('Result text', 'morkva-buy-one-click'), $settings_slug . '[content][result_text]', $data, $settings_slug. '_content_result_text' , '', esc_html__('Enter the text...', 'morkva-buy-one-click'), $description), $allowed_tags);
				?>
			</div>
		</div>
	</div>
	<div class="admin_ua_ship_morkva_settings_row">
		<div class="col-mrkv-5">
			<div class="admin_ua_ship_morkva_settings_line">
				<?php 
					$data = isset($settings_data['content']['result_title']) ? $settings_data['content']['result_title'] : '';
					$description = esc_html__('Write the text for result title. Use shortcode [mrkv_boc_order_id] for show order number', 'morkva-buy-one-click');

					echo wp_kses($field_creator->get_input_text(esc_html__('Result title', 'morkva-buy-one-click'), $settings_slug . '[content][result_title]', $data, $settings_slug. '_content_result_title' , '', esc_html__('Enter the text...', 'morkva-buy-one-click'), $description), $allowed_tags);
				?>
			</div>
		</div>
	</div>
</section>
<section id="styles_settings" class="mrkv_up_ship_shipping_tab_block">
	<h2>
		<img src="<?php echo esc_url( MRKV_BUY_ONE_CLICK_PLUGIN_URL . 'assets/images/paint.svg' ); ?>" alt="Styles settings" title="Styles settings">
		<?php echo esc_html__( 'Styles settings', 'morkva-buy-one-click' ); ?>
	</h2>
	<hr class="mrkv-ua-ship__hr">
	<div class="admin_ua_ship_morkva_settings_row">
		<div class="col-mrkv-5">
			<div class="admin_ua_ship_morkva_settings_line">
				<label for="m_boclick_settings_style_form_background"><?php echo esc_html__( 'Form Background', 'morkva-buy-one-click' ); ?></label>
				<?php
					$data = isset($settings_data['style']['form_background']) ? $settings_data['style']['form_background'] : '#ffffff';
				?>
				<input id="m_boclick_settings_style_form_background" type="text"
					name="<?php echo esc_attr($settings_slug); ?>[style][form_background]"
					value="<?php echo esc_attr($data); ?>"
					class="color-picker"
					data-default-color="#ffffff" />
			</div>
		</div>
		<div class="col-mrkv-5">
			<div class="admin_ua_ship_morkva_settings_line">
				<label for="m_boclick_settings_style_form_text_color"><?php echo esc_html__( 'Form text color', 'morkva-buy-one-click' ); ?></label>
				<?php
					$data = isset($settings_data['style']['form_text_color']) ? $settings_data['style']['form_text_color'] : '#000000';
				?>
				<input id="m_boclick_settings_style_form_text_color" type="text"
					name="<?php echo esc_attr($settings_slug); ?>[style][form_text_color]"
					value="<?php echo esc_attr($data); ?>"
					class="color-picker"
					data-default-color="#000000" />
			</div>
		</div>
	</div>
	<div class="admin_ua_ship_morkva_settings_row">
		<div class="col-mrkv-5">
			<div class="admin_ua_ship_morkva_settings_line">
				<label for="m_boclick_settings_style_form_btn_back"><?php echo esc_html__( 'Button background', 'morkva-buy-one-click' ); ?></label>
				<?php
					$data = isset($settings_data['style']['form_btn_back']) ? $settings_data['style']['form_btn_back'] : '#ed6230';
				?>
				<input id="m_boclick_settings_style_form_btn_back" type="text"
					name="<?php echo esc_attr($settings_slug); ?>[style][form_btn_back]"
					value="<?php echo esc_attr($data); ?>"
					class="color-picker"
					data-default-color="#ed6230" />
			</div>
		</div>
		<div class="col-mrkv-5">
			<div class="admin_ua_ship_morkva_settings_line">
				<label for="m_boclick_settings_style_form_btn_txt"><?php echo esc_html__( 'Button text color', 'morkva-buy-one-click' ); ?></label>
				<?php
					$data = isset($settings_data['style']['form_btn_txt']) ? $settings_data['style']['form_btn_txt'] : '#ffffff';
				?>
				<input id="m_boclick_settings_style_form_btn_txt" type="text"
					name="<?php echo esc_attr($settings_slug); ?>[style][form_btn_txt]"
					value="<?php echo esc_attr($data); ?>"
					class="color-picker"
					data-default-color="#ffffff" />
			</div>
		</div>
	</div>
	<div class="admin_ua_ship_morkva_settings_row">
		<div class="col-mrkv-5">
			<div class="admin_ua_ship_morkva_settings_line">
				<label for="m_boclick_settings_style_open_btn_back"><?php echo esc_html__( 'Open button background', 'morkva-buy-one-click' ); ?></label>
				<?php
					$data = isset($settings_data['style']['open_btn_back']) ? $settings_data['style']['open_btn_back'] : '#ed6230';
				?>
				<input id="m_boclick_settings_style_open_btn_back" type="text"
					name="<?php echo esc_attr($settings_slug); ?>[style][open_btn_back]"
					value="<?php echo esc_attr($data); ?>"
					class="color-picker"
					data-default-color="#ed6230" />
			</div>
		</div>
		<div class="col-mrkv-5">
			<div class="admin_ua_ship_morkva_settings_line">
				<label for="m_boclick_settings_style_open_btn_txt"><?php echo esc_html__( 'Open button text color', 'morkva-buy-one-click' ); ?></label>
				<?php
					$data = isset($settings_data['style']['open_btn_txt']) ? $settings_data['style']['open_btn_txt'] : '#ffffff';
				?>
				<input id="m_boclick_settings_style_open_btn_txt" type="text"
					name="<?php echo esc_attr($settings_slug); ?>[style][open_btn_txt]"
					value="<?php echo esc_attr($data); ?>"
					class="color-picker"
					data-default-color="#ffffff" />
			</div>
		</div>
	</div>
	<div class="admin_ua_ship_morkva_settings_row">
		<div class="col-mrkv-5">
			<div class="admin_ua_ship_morkva_settings_line">
				<h4 style="margin-top: 0;"><?php echo esc_html__('Style type', 'morkva-buy-one-click'); ?></h4>
				<div class="admin_ua_ship_morkva_settings_row">
					<?php
						$data = isset($settings_data['style']['type']) ? $settings_data['style']['type'] : 'flat';
						echo wp_kses($field_creator->get_input_radio(esc_html__('Flat', 'morkva-buy-one-click'), $settings_slug . '[style][type]', 'flat', $data, $settings_slug . '_style_type_flat', 'flat'), $allowed_tags);
						echo wp_kses($field_creator->get_input_radio(esc_html__('Standart', 'morkva-buy-one-click'), $settings_slug . '[style][type]', 'standart', $data, $settings_slug . '_style_type_standart', 'flat'), $allowed_tags);
					?>
				</div>
			</div>
		</div>
		<div class="col-mrkv-5">
			<div class="admin_ua_ship_morkva_settings_line">
				<?php
					$theme      = wp_get_theme();
				    $parent     = $theme->parent();

    				if ( ($parent && $parent->get( 'Name' ) === 'Flatsome') || $theme->get( 'Name' ) === 'Flatsome') 
    				{
    					$allowed_button_styles = array(
    						'primary' => 'Primary',
    						'secondary' => 'Secondary'
    					);

						$data = isset($settings_data['style']['flatsome']) ? $settings_data['style']['flatsome'] : '';

						echo wp_kses($field_creator->get_select_simple(__('Flatsome button style', 'morkva-buy-one-click'), $settings_slug . '[style][flatsome]', $allowed_button_styles, $data, $settings_slug . '_flatsome_style' , __('Choose a style', 'morkva-buy-one-click'), ''), $allowed_tags);
    				}
				?>
			</div>
		</div>
	</div>
	<h3><img src="<?php echo esc_url(MRKV_BUY_ONE_CLICK_PLUGIN_URL . 'assets/images/text-t.svg'); ?>" alt="Text styles" title="Text styles"><?php echo esc_html__('Text styles', 'morkva-buy-one-click'); ?></h3>
	<p><?php echo esc_html__('Customize the text in the form', 'morkva-buy-one-click'); ?></p>
	<hr class="mrkv-ua-ship__hr">
	<div class="admin_ua_ship_morkva_settings_row">
		<div class="col-mrkv-5">
			<div class="admin_ua_ship_morkva_settings_line ">
				<?php 
					$data = isset($settings_data['style']['title_fs']) ? $settings_data['style']['title_fs'] : '';
					echo wp_kses($field_creator->get_input_number(esc_html__('Title Font size', 'morkva-buy-one-click'), $settings_slug . '[style][title_fs]', $data, $settings_slug. '_style_title_fs' , '', '', ''), $allowed_tags);
				?>
			</div>
		</div>
		<div class="col-mrkv-5">
			<div class="admin_ua_ship_morkva_settings_line ">
					<?php 
						$data = isset($settings_data['style']['subtitle_fs']) ? $settings_data['style']['subtitle_fs'] : '';
						echo wp_kses($field_creator->get_input_number(esc_html__('Subtitle Font size', 'morkva-buy-one-click'), $settings_slug . '[style][subtitle_fs]', $data, $settings_slug. '_style_subtitle_fs' , '', '', ''), $allowed_tags);
					?>
			</div>
		</div>
	</div>
	<div class="admin_ua_ship_morkva_settings_row">
		<div class="col-mrkv-5">
			<div class="admin_ua_ship_morkva_settings_line ">
					<?php 
						$data = isset($settings_data['style']['label_fs']) ? $settings_data['style']['label_fs'] : '';
						echo wp_kses($field_creator->get_input_number(esc_html__('Label Font size', 'morkva-buy-one-click'), $settings_slug . '[style][label_fs]', $data, $settings_slug. '_style_label_fs' , '', '', ''), $allowed_tags);
					?>
			</div>
		</div>
		<div class="col-mrkv-5">
			<div class="admin_ua_ship_morkva_settings_line ">
					<?php 
						$data = isset($settings_data['style']['button_fs']) ? $settings_data['style']['button_fs'] : '';
						echo wp_kses($field_creator->get_input_number(esc_html__('Button Font size', 'morkva-buy-one-click'), $settings_slug . '[style][button_fs]', $data, $settings_slug. '_style_button_fs' , '', '', ''), $allowed_tags);
					?>
			</div>
		</div>
	</div>
</section>