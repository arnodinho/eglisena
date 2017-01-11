<?php
/**
 * Main content 
 * @package lavish
 * @since 1.0.1
 */
?>
<article id="post-<?php the_ID(); ?>" <?php lavish_post_class(); ?>>
<?php 
/*
==================================================================================================
checking the blog format and if it is set to manosary then change the 
layout of the blog page but on boxed and default layout it stays the same.
==================================================================================================
*/
$get_theme_mod_blog = esc_attr(get_theme_mod('blog_style'));
if (!($get_theme_mod_blog == 'manosaryleft') && !($get_theme_mod_blog == 'manosaryright') && !($get_theme_mod_blog == 'manosarywide')) {
        //Load the Header
        do_action('lr_blog_header', 'lavish');
        //Load the Content
        ?>
    	<div class="entry-content clearfix">
    		<?php
    			//load the thumbnail  
    			do_action('lr_thumbnail', 'lavish'); 
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

    }
    else {
    	//Load the Thumbnail First
		do_action('lr_thumbnail', 'lavish'); 

        //Load the Header
        do_action('lr_blog_header', 'lavish');

        //Load the Content
        ?>
    	<div class="entry-content clearfix">
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
    	}

    ?>
</article><!-- #post-## -->

