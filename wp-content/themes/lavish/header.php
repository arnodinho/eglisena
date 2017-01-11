<?php
/**
 * The Header for our theme
 * @package lavish
 * @since 1.0.0
 */
?>
<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
<meta http-equiv="X-UA-Compatible" content="IE=edge" charset="<?php bloginfo( 'charset' ); ?>">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="profile" href="http://gmpg.org/xfn/11">
<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">
<?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>
    <?php
    /*
    =================================================
    Move to Top Display
    =================================================
    */
    //do_action ('lr_move_to_top', 'lavish'); 
    /*
    =================================================
    Fr Wrapper Choose
    =================================================
    */
    do_action('lr_wrapper_choose','lavish');
    /*
    =======================================================
    Fr Header Display with logo and Menu and Search Icons
    =======================================================
    */
    do_action('lr_header','lavish');

    $header_style = '';
    if (get_theme_mod('header_style') == 'two') {
        $header_style = 'two';
    }
?>

<aside id="la-banner" class="lr_responsive_banner" style="background-image: url('<?php header_image(); ?>'); color: <?php echo esc_html(get_theme_mod( 'banner_text_colour', '#ffffff' )); ?>;">
        
            <?php get_sidebar( 'banner' ); ?>
        
</aside>
<?php
if (is_front_page()){

}
else {
    do_action('style_breadcrumb');
}
?>

<?php get_sidebar( 'cta' ); ?>