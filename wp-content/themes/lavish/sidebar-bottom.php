<?php
/**
 * The Bottom Sidebar
 * @package lavish
 * @since 1.0.0
 */

if (   ! is_active_sidebar( 'bottom1'  )
	&& ! is_active_sidebar( 'bottom2' )
	&& ! is_active_sidebar( 'bottom3'  )
	&& ! is_active_sidebar( 'bottom4'  )		
		
	)

		return;
	// If we get this far, we have widgets. Let do this.
?>
<div class="lr_widgets_bottom_widget">
    <div class="container">
        <div class="row">              
        	<div id="bottom1" <?php lavish_bottomgroup(); ?> role="complementary">
                <?php dynamic_sidebar( 'bottom1' ); ?>
            </div><!-- #top1 -->

            <div id="bottom2" <?php lavish_bottomgroup(); ?> role="complementary">
                <?php dynamic_sidebar( 'bottom2' ); ?>
            </div><!-- #top2 -->          

            <div id="bottom3" <?php lavish_bottomgroup(); ?> role="complementary">
                <?php dynamic_sidebar( 'bottom3' ); ?>
            </div><!-- #top3 -->

            <div id="bottom4" <?php lavish_bottomgroup(); ?> role="complementary">
                <?php dynamic_sidebar( 'bottom4' ); ?>
            </div><!-- #top4 -->

        </div>
    </div>
</div>