<?php
add_action('style_breadcrumb', 'lavish_breadcrumb_fnc');

function lavish_breadcrumb_fnc() {
	global $post;
	?>
	<div class="style_breadcrumbs">
		<div class="container">
			<div class="row">
				<div class="col-md-4">
					<?php
					if ( class_exists( 'WooCommerce' ) ) {
						if (is_shop()) {
							echo '<h1>'. __('Shop', 'lavish').'</h1>';
						}
						else {
							if (!is_404()) { ?>
								<h1><?php the_title(); ?></h1>
							<?php }
							else {
								echo '<h1>'. __('Page Not Found', 'lavish').'</h1>';
							}
						}
					}	
					else {
						if (!is_404()) { ?>
								<h1><?php the_title(); ?></h1>
							<?php }
							else {
								echo '<h1>'. __('Page Not Found', 'lavish').'</h1>';
							}
					}
					
					

					?>
				</div>
				<div class="col-md-8 breadcrumb_items">
					<?php
					if(function_exists('bcn_display')) {
                        bcn_display();
                    }
                    ?>
                    
				</div>
			</div>
		</div>
	</div>
	<?php } ?>