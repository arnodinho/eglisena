<?php
/**
 * Description: A page template with the right column for WooCommerce
 * @package lavish
 * @since 1.0.0
 */
get_header(); ?>
<section id="la-content-area" class="la-contents" role="main">
    <div class="container">
        <div class="row">
            <?php
            	do_action('woocommerce_choose_layouts');
            ?>
        </div>  
    </div>
</section>
<?php get_footer(); ?>