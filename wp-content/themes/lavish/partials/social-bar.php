<?php
/**
 * Social bar group
 * @package lavish
 * @since 1.0.0
 */
?>

<?php if( get_theme_mod( 'hide_social' ) == '') { ?>
		<?php $options = get_theme_mods();						
			echo '<div id="social-icons"><ul>';										
			if (!empty($options['twitter_uid'])) echo '<li><a title="'.esc_attr__('Twitter', 'lavish') .'" href="' . esc_url($options['twitter_uid']) . '" target="_blank"><i class="fa fa-twitter"></i></a></li>';
			if (!empty($options['facebook_uid'])) echo '<li><a title="'.esc_attr__('Facebook', 'lavish') .'" href="' . esc_url($options['facebook_uid']) . '" target="_blank"><i class="fa fa-facebook"></i></a></li>';
			if (!empty($options['google_uid'])) echo '<li><a title="'.esc_attr__('Google+', 'lavish') .'" href="' . esc_url($options['google_uid']) . '" target="_blank"><i class="fa fa-google-plus"></i></a></li>';			
			if (!empty($options['linkedin_uid'])) echo '<li><a title="'.esc_attr__('Linkedin', 'lavish') .'" href="' . esc_url($options['linkedin_uid']) . '" target="_blank"><i class="fa fa-linkedin"></i></a></li>';
			if (!empty($options['pinterest_uid'])) echo '<li><a title="'.esc_attr__('Pinterest', 'lavish') .'" href="' . esc_url($options['pinterest_uid']) . '" target="_blank"><i class="fa fa-pinterest"></i></a></li>';
			if (!empty($options['flickr_uid'])) echo '<li><a title="'.esc_attr__('Flickr', 'lavish') .'" href="' . esc_url($options['flickr_uid']) . '" target="_blank"><i class="fa fa-flickr"></i></a></li>';
			if (!empty($options['youtube_uid'])) echo '<li><a title="'.esc_attr__('Youtube', 'lavish') .'" href="' . esc_url($options['youtube_uid']) . '" target="_blank"><i class="fa fa-youtube"></i></a></li>';
			if (!empty($options['vimeo_uid'])) echo '<li><a title="'.esc_attr__('Vimeo', 'lavish') .'" href="' . esc_url($options['vimeo_uid']). '" target="_blank"><i class="fa fa-vimeo-square"></i></a></li>';		
			if (!empty($options['instagram_uid'])) echo '<li><a title="'.esc_attr__('Instagram', 'lavish') .'" href="' . esc_url($options['instagram_uid']) . '" target="_blank"><i class="fa fa-instagram"></i></a></li>';		
			if (!empty($options['reddit_uid'])) echo '<li><a title="'.esc_attr__('Reddit', 'lavish') .'" href="' . esc_url($options['reddit_uid']). '" target="_blank"><i class="fa fa-reddit"></i></a></li>';
			if (!empty($options['stumbleupon_uid'])) echo '<li><a title="'.esc_attr__('stumbleupon', 'lavish') .'" href="' . esc_url($options['stumbleupon_uid']) . '" target="_blank"><i class="fa fa-stumbleupon"></i></a></li>';	
			if (!empty($options['wp_uid'])) echo '<li><a title="'.esc_attr__('WordPress', 'lavish') .'" href="' . esc_url($options['wp_uid']) . '" target="_blank"><i class="fa fa-wordpress"></i></a></li>';	
			if (!empty($options['github_uid'])) echo '<li><a title="'.esc_attr__('Github', 'lavish') .'" href="' . esc_url($options['github_uid']) . '" target="_blank"><i class="fa fa-github"></i></a></li>';
			if (!empty($options['dribbble_uid'])) echo '<li><a title="'.esc_attr__('Dribble', 'lavish') .'" href="' . esc_url($options['dribbble_uid']) . '" target="_blank"><i class="fa fa-dribbble"></i></a></li>';		
			if (!empty($options['rss_uid'])) echo '<li><a title="'.esc_attr__('rss', 'lavish') .'" href="' . esc_url($options['rss_uid']). '" target="_blank"><i class="fa fa-rss"></i></a></li>';	
	        if (!empty($options['cart_uid'])) echo '<li><a title="'.esc_attr__('cart', 'lavish') .'" href="' . esc_url($options['cart_uid']). '" target="_blank"><i class="fa fa-shopping-cart"></i></a></li>';	
			if (!empty($options['email_uid'])) echo '<li><a title="'.esc_attr__('Email', 'lavish') .'" href="' . esc_url($options['email_uid']). '"><i class="fa fa-envelope"></i></a></li>';		 
		echo '</ul></div>';		
}
?>