<?php
/**
 * Mini-cart
 *
 * Contains the markup for the mini-cart, used by the cart widget
 *
 * @author 		WooThemes
 * @package 	WooCommerce/Templates
 * @version     1.6.4
 */

if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

global $woocommerce;
?>

<?php do_action( 'woocommerce_before_mini_cart' ); ?>

<div class="mini-cart-overview">
    <a href="<?php echo $woocommerce->cart->get_cart_url(); ?>">
        <i class="icon-shopping-cart"></i>
        <span><?php echo $woocommerce->cart->cart_contents_count; ?></span>
        -
        <?php echo $woocommerce->cart->get_cart_subtotal(); ?>
    </a>
</div>
<a class="mini-cart-underlay mini-cart-close" href="javascript:jQuery.pageslide.close()"></a>

<div id="mini-cart-container" class="mini-cart-container <?php echo oxy_get_option( 'pageslide_cart_swatch' ); ?>">
    <a href="javascript:jQuery.pageslide.close(function(){jQuery('.mini-cart-underlay').removeClass('active');})" class="btn btn-large btn-cart-sidebar btn-icon-left swatch-pomegranate"><span><i class="icon-remove"></i></span> Close cart</a>

    <ul class="cart_list product_list_widget <?php echo $args['list_class']; ?>">

    	<?php if ( sizeof( $woocommerce->cart->get_cart() ) > 0 ) : ?>

    		<?php foreach ( $woocommerce->cart->get_cart() as $cart_item_key => $cart_item ) :

    			$_product = $cart_item['data'];

    			// Only display if allowed
    			if ( ! apply_filters('woocommerce_widget_cart_item_visible', true, $cart_item, $cart_item_key ) || ! $_product->exists() || $cart_item['quantity'] == 0 )
    				continue;

    			// Get price
    			$product_price = get_option( 'woocommerce_tax_display_cart' ) == 'excl' ? $_product->get_price_excluding_tax() : $_product->get_price_including_tax();

    			$product_price = apply_filters( 'woocommerce_cart_item_price_html', woocommerce_price( $product_price ), $cart_item, $cart_item_key );
    			?>

    			<li class="clearfix">
    				<a class= "product-image" href="<?php echo get_permalink( $cart_item['product_id'] ); ?>">

    					<?php echo $_product->get_image(); ?>
                    </a>
                    <div class="product-details">


                        <a href="<?php echo get_permalink( $cart_item['product_id'] ); ?>">

        					<?php echo apply_filters('woocommerce_widget_cart_product_title', $_product->get_title(), $_product ); ?>

        				</a>
                        <p>
        				    <?php echo $woocommerce->cart->get_item_data( $cart_item ); ?>
                        </p>

        				<?php echo apply_filters( 'woocommerce_widget_cart_item_quantity', '<span class="quantity">' . sprintf( '%s &times; %s', $cart_item['quantity'], $product_price ) . '</span>', $cart_item, $cart_item_key ); ?>
                    </div>
                    <?php echo apply_filters( 'woocommerce_cart_item_remove_link', sprintf('<a href="%s" class="remove" title="%s"><i class="icon-remove"></i></a>', esc_url( $woocommerce->cart->get_remove_url( $cart_item_key ) ), __( 'Remove this item', 'woocommerce' ) ), $cart_item_key );?>
    			</li>

    		<?php endforeach; ?>

    	<?php else : ?>

    		<li class="empty"><?php _e( 'No products in the cart.', 'woocommerce' ); ?></li>

    	<?php endif; ?>

    </ul><!-- end product list -->

    <?php if ( sizeof( $woocommerce->cart->get_cart() ) > 0 ) : ?>

    	<div class="cart-actions">
            <p class="total"><strong><?php _e( 'Subtotal', 'woocommerce' ); ?>:</strong> <?php echo $woocommerce->cart->get_cart_subtotal(); ?></p>

        	<?php do_action( 'woocommerce_widget_shopping_cart_before_buttons' ); ?>

        	<p class="buttons">
        		<a href="<?php echo $woocommerce->cart->get_cart_url(); ?>" class="btn btn-cart-sidebar btn-large btn-icon-right btn-success"><?php _e( 'View Cart', 'woocommerce' ); ?><span><i class="icon-shopping-cart"></i></span></a>
        		<a href="<?php echo $woocommerce->cart->get_checkout_url(); ?>" class="btn checkout btn-cart-sidebar btn-danger btn-large btn-icon-right btn-primary"><?php _e( 'Checkout', 'woocommerce' ); ?><span><i class="icon-credit-card"></i></span></a>
        	</p>
        </div>

    <?php endif; ?>
</div>
<?php do_action( 'woocommerce_after_mini_cart' ); ?>
