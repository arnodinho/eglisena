<?php
/**
 * Post Format Status
 * @package lavish
 * @since 1.0.0
 */
?>

<article id="post-<?php the_ID(); ?>" <?php lavish_post_class(); ?>>
    <div class="entry-content clearfix">
    	<h5><strong><?php the_title(); ?></strong></h5>
	    <?php the_content(); ?>
	</div>
	<footer class="summary-entry-meta">
		<?php lavish_multi_pages(); ?>
    </footer><!-- .entry-meta -->
    <?php lavish_blog_seperator(); ?>
</article><!-- #post-## -->