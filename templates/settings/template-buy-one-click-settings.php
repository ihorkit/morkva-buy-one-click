<?php if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly ?>
<div class="admin_mrkv_ua_shipping_page">
	<div class="admin_mrkv_ua_shipping_page__header">
		<?php 
			include MRKV_BUY_ONE_CLICK_PLUGIN_PATH . 'templates/elements/template-buy-one-click-header.php';
		?>
	</div>
	<div class="admin_mrkv_ua_shipping_page__inner">
		<div class="admin_mrkv_ua_shipping__block col-mrkv-10">
			<div class="admin_mrkv_ua_shipping__info">
				<?php settings_errors(); ?>
			</div>
		</div>
		<div class="admin_mrkv_ua_shipping__block col-mrkv-10">
			<div class="admin_mrkv_ua_shipping__tabs">
				<?php 
					include MRKV_BUY_ONE_CLICK_PLUGIN_PATH . 'templates/elements/template-buy-one-click-tabs.php';
				?>
			</div>
		</div>
		<div class="admin_mrkv_ua_shipping__block col-mrkv-7">
			<form class="mrkv_ua_shipping_method_form" method="post" action="options.php">
				<?php settings_fields('mrkv-buy-one-click-settings-group'); ?>
				<div class="mrkv_block_rounded">
					<?php 
					include MRKV_BUY_ONE_CLICK_PLUGIN_PATH . 'templates/settings/template-buy-one-click-sections.php';
				?>
				<p class="submit"><input type="submit" name="submit" id="submit" class="button button-primary" value="<?php echo esc_html__( 'Save', 'morkva-buy-one-click' ); ?>"></p>
					
				</div>
			</form>
		</div>
		<div class="admin_mrkv_ua_shipping__block col-mrkv-3">
			<div class="admin_mrkv_ua_shipping__plugin-info mrkv_block_rounded">
				<?php 
					include MRKV_BUY_ONE_CLICK_PLUGIN_PATH . 'templates/elements/template-buy-one-click-support.php';
				?>
			</div>
		</div>
	</div>
</div>