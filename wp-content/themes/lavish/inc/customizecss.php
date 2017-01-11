<style type="text/css">
.btn,
.btn1,
.btn1, 
.btn a {
	color: <?php echo esc_html(get_theme_mod('btn_color')); ?>!important; 
	background-color: <?php echo esc_html(get_theme_mod('btn_bg_color')); ?>;
}
.btn:hover, 
.btn:focus, 
.btn a:hover, 
.btn a:focus, 
.btn a:visited {
	color: <?php echo esc_html(get_theme_mod('btnhover_color')); ?> !important; 
	background-color: <?php echo esc_html(get_theme_mod('btnhover_bg_color')); ?>;
}
.btn1:hover, 
.btn1:focus, 
.btn1 a:hover, 
.btn1 a:focus, 
.btn1 a:visited {
	color: <?php echo esc_html(get_theme_mod('btnhover_color')); ?> !important; 
	background-color: <?php echo esc_html(get_theme_mod('btnhover_bg_color')); ?>;
}
/*
=================================================
Header Top Customizer Color
=================================================
*/
#social-icons ul li a,
#social-icons ul li a,
#social-icons ul li a,
#social-icons ul li a {
	background-color:<?php echo esc_html(get_theme_mod('header_social_icons_bgcolor')); ?>!important; 
	color:<?php echo esc_html(get_theme_mod('header_social_icons_color')); ?>!important; 
}
#social-icons ul li a:hover,
#social-icons ul li a:hover,
#social-icons ul li a:hover,
#social-icons ul li a:hover {
	background-color:<?php echo esc_html(get_theme_mod('header_social_icons_hoverbgcolor')); ?>!important; 
	color:<?php echo esc_html(get_theme_mod('header_social_icons_hovercolor')); ?>!important; 
}
.lavish_footer {background-color:<?php echo esc_html(get_theme_mod('footer_bg')); ?>; color: <?php echo esc_html(get_theme_mod('footer_text'));?>;}
.lavish_footer p {color: <?php echo esc_html(get_theme_mod('footer_text'));?>;}


/*site title */
#la-site-title a {color:<?php echo esc_html(get_theme_mod('sitetitle', '#fff')); ?>;}
#la-logo-group, #la-text-group {padding: <?php echo esc_html(get_theme_mod('titlepadding', '5px 0px 5px 0px'));?>}
            
</style>
