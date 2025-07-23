<?php if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly ?>
<?php 
if ( $mrkv_boclick_tabs ) : ?>
    <div class="admin_mrkv_ua_shipping__tabs_main mrkv_block_rounded">
        <h2>
            <?php esc_html_e( 'Settings', 'morkva-buy-one-click' ); ?>
        </h2>
        <div class="admin_mrkv_ua_shipping__tabs_main__inner">
            <?php 
            $counter = 0;
            foreach ( $mrkv_boclick_tabs as $id => $name ) : ?>
                <a href="#<?php echo esc_attr( $id ); ?>-mrkv" 
                   data-tab="<?php echo esc_attr( $id ); ?>" 
                   class="mrkv_up_ship_tab_btn <?php echo ( $counter === 0 ) ? 'active' : ''; ?>">
                    <?php echo esc_html( $name ); ?>
                </a>
                <?php $counter++; ?>
            <?php endforeach; ?>
        </div>
    </div>
<?php endif; ?>
