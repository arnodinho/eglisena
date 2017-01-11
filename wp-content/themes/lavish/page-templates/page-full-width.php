<?php
/**
 *
   Template Name: Page Full Width
 *
 * Description: A page template without the left or right columns
 * @package lavish
 * @since 1.0.0
 */

get_header(); ?>


<?php get_sidebar( 'top' ); ?>
<section id="la-content-area" class="la-contents" role="main">
    <div class="container">
        <div class="row"> 
        	<div class="col-md-12 la-content-inside">   
        <?php
            while ( have_posts() ) : the_post(); ?>
            <?php get_template_part( 'content', 'page' ); ?>
            <?php endwhile; // end of the loop. ?>
            </div>
</div>
</div>
</section>

<?php get_footer(); ?>