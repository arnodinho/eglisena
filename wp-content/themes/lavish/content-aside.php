<?php
/**
 * Post Format Aside
 * @package lavish
 * @since 1.0.0
 */
?>

<article id="post-<?php the_ID(); ?>" <?php lavish_post_class(); ?>>
    <div class="entry-content clearfix aside_post_type">
      <?php the_content(); ?>
  </div>
    <?php lavish_blog_seperator(); ?>
</article><!-- #post-## -->