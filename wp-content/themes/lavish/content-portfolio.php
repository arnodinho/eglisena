<?php
/**
 * Jetpack Portfolio summary 
 * @package lavish
 * @since 1.0.0 
 */
?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<div class="row la-contents">
		<div class="col-md-8">
			<?php if( get_theme_mod( 'hide_featured_portfolio' ) == '') { ?>
        <?php 
        if ( has_post_thumbnail() ) :
				echo '<div class="featured-image-portfolio la-images-flip">';
                the_post_thumbnail('big');
				echo '</div>';              
        endif; ?>
    <?php } ?>
		</div>
		<div class="col-md-4 jetpack_single">
			<header class="entry-header heading-portfolio jetpack_single_heading">	
				<?php the_title( '<h1 class="entry-title">', '</h1>' ); ?>
			</header><!-- .entry-header -->

			<hr/>

			<div class="entry-content">
		    	<?php the_content(); ?>
			</div><!-- .entry-content -->

			<footer class="entry-footer single-footer">
				<?php edit_post_link( __( 'Edit this Post', 'lavish' ), '<span class="edit-link">', '</span>' ); ?>
			</footer><!-- .entry-footer -->
		</div>
	
    
	
	
</article><!-- #post-## -->
