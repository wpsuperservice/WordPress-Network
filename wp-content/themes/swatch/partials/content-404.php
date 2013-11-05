<?php
/**
 * Displays a 404 page
 *
 * @package Swatch
 * @subpackage Frontend
 * @since 0.1
 *
 * @copyright (c) 2013 Oxygenna.com
 * @license http://wiki.envato.com/support/legal-terms/licensing-terms/
 * @version 1.3.4
 */
?>
<article>
    <div class="section-header">
        <h2 class="headline"><?php echo stripslashes( oxy_get_option( '404_title' ) ); ?></h2>
        <p>
            <?php echo stripslashes( oxy_get_option( '404_content' ) ); ?>
        </p>
    </div>
    <div class="text-center">
        <a href="<?php echo site_url(); ?>" class="btn btn-large btn-icon-right  pull-center swatch-pomegranate">
            <?php _e( 'Home Page', 'swatch-admin-td' ); ?>
            <span>
                <i class="icon-home animated swing" data-animation = "swing"></i>
            </span>
            </a>
    </div>
</article>