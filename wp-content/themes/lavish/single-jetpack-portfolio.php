<?php
/**
 * The template for displaying all single portfolio posts. 
 * @package Lavish
 * @since 1.0.0
 */

get_header(); ?>


 <div class="la-content lr_jetpack_portfolio la-contents">   
    <div class="container">
    <div class="row">
    <div class="col-md-12">
 
<?php
	while ( have_posts() ) : the_post();	
		get_template_part( 'content', 'portfolio' );				
	endwhile; // end of the loop. 
 ?>
    
    </div>
    </div>
    </div>
   </div>
    
<?php get_footer(); ?>