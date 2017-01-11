<?php
/**
 * The template used for displaying page content in page.php
 * @package lavish
 * @since 1.0.0
 */
?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

   
    <?php 
		if ( has_post_thumbnail()) :
			echo '<div class="page-thumbnail">';
				the_post_thumbnail();
			echo '</div>';
		endif; 
	?>
    
	<div class="entry-content">
		<?php the_content(); ?>
        
		<?php
			wp_link_pages( array(
				'before' => '<div class="page-links">' . __( 'Pages:', 'lavish' ),
				'after'  => '</div>',
			) );
		?>
	</div><!-- .entry-content -->
	<?php edit_post_link( __( 'Edit', 'lavish' ), '<footer class="entry-meta"><span class="edit-link">', '</span></footer>' ); ?>
</article><!-- #post-## -->
