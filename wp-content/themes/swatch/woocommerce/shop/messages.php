<?php
/**
 * Show messages
 *
 * @author 		WooThemes
 * @package 	WooCommerce/Templates
 * @version     1.6.4
 */

if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

if ( ! $messages ) return;
?>

<?php foreach ( $messages as $message ) : ?>
	<div class="woocommerce-message alert alert-cart alert-info">
        <button type="button" class="close" data-dismiss="alert">×</button>
        <?php echo wp_kses_post( $message ); ?>
    </div>
<?php endforeach; ?>
