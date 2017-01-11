<?php
/**
 * Full post content
 * @package lavish
 * @since 1.0.1
 */
?>


<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
    <?php //do_action('lr_blog_header', 'lavish'); ?>
    <a target="_blank" href="<?php the_title(); ?>">
    <div class="entry-content clearfix">
        <?php the_content(); ?>
        <div style="border-bottom:1px solid #EAEAEA;"></div>
        <h5><i class="fa fa-quote-left"></i> &nbsp;<?php the_title(); ?></h5>
    </div>
    </a>
    <?php lavish_blog_seperator(); ?>
</article><!-- #post-## -->
