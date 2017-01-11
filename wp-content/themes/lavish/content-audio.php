<?php
/**
 * Post Format audio
 * @package lavish
 * @since 1.0.0
 */

?>
<article id="post-<?php the_ID(); ?>" <?php lavish_post_class(); ?>>
    <?php do_action('lr_blog_header', 'lavish'); ?>
    <div class="entry-content clearfix">
      <?php the_content(); ?>
  </div>
  <footer class="summary-entry-meta">
    <?php lavish_multi_pages(); ?>
    </footer><!-- .entry-meta -->
    <?php lavish_blog_seperator(); ?>
</article><!-- #post-## -->