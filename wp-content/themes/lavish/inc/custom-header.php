<?php
/**
 * Custom Header feature
 * http://codex.wordpress.org/Custom_Headers
 *
 * @package lavish 
 */

function lavish_custom_header_setup() {
	add_theme_support( 'custom-header', apply_filters( 'lavish_custom_header_args', array(
		'default-image'          => get_template_directory_uri() . '/images/banner-1.jpg',
		'random-default'         => false,
		'flex-width'    		 => true,
		'width'                  => 2560,
		'flex-height'            => true,
		'height'                 => 500,	
		'uploads'       		 => true,
		'header-text'            => false,
		'admin-preview-callback' => 'lavish_admin_header_image',
	) ) );
}
add_action( 'after_setup_theme', 'lavish_custom_header_setup' );

if ( ! function_exists( 'lavish_admin_header_image' ) ) :
/**
 * Custom header image markup displayed on the Appearance > Header admin panel.
 *
 * @see lavish_custom_header_setup().
 */
function lavish_admin_header_image() {
	
?>
	<div id="headimg">
		<?php if ( get_header_image() ) : ?>
		<img src="<?php header_image(); ?>" alt="">
		<?php endif; ?>
	</div>
<?php
}
endif; // lavish_admin_header_image
