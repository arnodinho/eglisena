<?php
/**
 * Post Format Image
 * @package lavish
 * @since 1.0.0
 */
?>

<article id="post-<?php the_ID(); ?>" <?php lavish_post_class(); ?>>
	<div class="entry-content clearfix">
    		<?php
    			if ( has_post_thumbnail()) {
    				echo '<div class="image_post_type_image">';
		            the_post_thumbnail('big');
		            echo '</div>';
		            
        		}
    			//Load the Header
        		do_action('lr_blog_header', 'lavish');
    		?>

 			<?php 
 				//load the content if excerpt is choose then load excerpt
 				do_action('lr_excerpt', 'lavish'); 
 			?>   
		</div>
		
		<footer class="summary-entry-meta">
			<?php lavish_multi_pages(); ?>
    	</footer><!-- .entry-meta -->
    	<?php 
    		//Load the Seperator
    		lavish_blog_seperator(); 
    		?>
</article>