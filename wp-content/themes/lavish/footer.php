<?php
/**
 * The template for displaying the footer.
 *
 * Contains footer content and the closing of the #main and #page div elements.
 *
 * @package lavish
 * @since 1.0.3
 */
?>
<?php get_sidebar( 'bottom' ); ?>


<div class="lavish_footer">
	<div class="container">
        <div style="border-bottom:1px solid #3C3C3C"></div>
		<div class="row">
            <div class="col-md-12">
            <?php
                if (get_theme_mod('footer_social_display') == 1) {
                    include('partials/social-bar.php');
                }
                ?>
            </div>
            <div class="col-md-12">
                <?php wp_nav_menu( array( 'theme_location' => 'footer', 'container' => false,'menu_class' => 'footer', 'fallback_cb' => false) ); ?>
            </div>
            <div class="col-md-12">
                <div class="copyright">
                <p>
                    <?php esc_attr_e('Copyright &copy;', 'lavish'); ?> <?php _e(date('Y')); ?> <strong><?php echo esc_attr(get_bloginfo('name'));  ?></strong>. <?php esc_attr_e('All rights reserved.', 'lavish'); ?>
                </p>
                </div>
            </div>

<?php wp_footer(); ?>
</body>
</html>