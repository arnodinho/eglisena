<?php
/**
 * Video content 
 * @package lavish
 * @since 1.0.1
 */
?>
<article id="post-<?php the_ID(); ?>" <?php lavish_post_class(); ?>>
   	<div class="entry-content clearfix">
    		<?php the_content(); ?>
    	</div>
    	<?php
		
		//Load the Header
        do_action('lr_blog_header', 'lavish');
        lavish_blog_seperator();
        ?>

		
</article><!-- #post-## -->

