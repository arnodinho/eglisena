<?php
/**
 * Post Format Link
 * @package lavish
 * @since 1.0.0
 */
/*
=================================================
This is post format link which only dislays the 
content you need to put the link inside the content
itself for displaying it cool.
=================================================
*/
?>

<article id="post-<?php the_ID(); ?>" <?php lavish_post_class(); ?>>
    <?php //do_action('lr_blog_header', 'lavish'); ?>
    <a target="_blank" href="<?php the_title(); ?>">
    <div class="entry-content clearfix link_post_type">
	    <?php the_content(); ?>
	    <div style="border-bottom:1px solid #EAEAEA;"></div>
	    <h5><i class="fa fa-external-link"></i> &nbsp;<?php the_title(); ?></h5>
	</div>
	</a>
	<?php lavish_blog_seperator(); ?>
</article><!-- #post-## -->
