<?php
/*
=================================================
LAVISH THEME CUSTOMIZER
=================================================
*/


/**
 * Lets create a customizable theme and begin with some pre-setup
*/ 
    add_action('customize_register', 'lavish_theme_customize');
    function lavish_theme_customize($wp_customize) {
    $wp_customize->remove_section( 'colors');
	
/**
 * Add postMessage support for site title and description for the Theme Customizer.
 * @param WP_Customize_Manager $wp_customize Theme Customizer object.
 */
    
function lavish_customize_register( $wp_customize ) {
    $wp_customize->get_setting( 'blogname' )->transport         = 'postMessage';
    $wp_customize->get_setting( 'blogdescription' )->transport  = 'postMessage';
}
add_action( 'customize_register', 'lavish_customize_register' );

/**
* Binds JS handlers to make Theme Customizer preview reload changes asynchronously.
*/

function lavish_customize_preview_js() {
    wp_enqueue_script( 'lavish_customizer', get_template_directory_uri() . '/js/lavish-customizer.js', array( 'customize-preview' ), '20131012', true );
}
add_action( 'customize_preview_init', 'lavish_customize_preview_js' );

/**
     *  Page to CHeck the Pro Version
     */
    class lavish_note extends WP_Customize_Control {
        public function render_content() {
            echo __( '<div style="color:red"><h4>This following features are available in the <a href="http://styledthemes.com/lavish-pro" title="premium version" target="_blank">Premium version only.</a></h4></div>', 'lavish' );

        }
    }

   /*
=================================================
Header Settings Customizer
=================================================
*/
$wp_customize->get_section('nav')->panel = 'header_settings_panel'; 
	
	$wp_customize->add_panel( 'header_settings_panel', array(// Header Panel
	    'priority'       => 2,
	    'capability'     => 'edit_theme_options',
	    'title'          => __('Header Settings', 'lavish'),
	    'description'    => __('Changes the Settings For Your Header', 'lavish'),
	));

	/*
=================================================
HEADER TOP CUSTOMIZER SETTINGS
=================================================
*/	
	$wp_customize->add_section( 'header_top_settings', array(
		'title'          => __( 'Top Bar Display', 'lavish' ),
		'description'	 => __('Header Top Represents the top position ahead of Menu', 'lavish'),	
		'priority'       => 5,
		'panel'			 => 'header_settings_panel',	
	) );

	$wp_customize->add_setting( 'lavish_top_settings', array(
            'sanitize_callback' =>  'lavish_sanitize_text'
        ) );
	 $wp_customize->add_control( new lavish_note ( $wp_customize,'lavish_top_settings', array(
            'section'  => 'header_top_settings',
            'priority' => 1,
     ) ) );
	// Hide the Top bar
	$wp_customize->add_setting( 'hide_styletop', array(
		'default'        => '1',
		'sanitize_callback' => 'lavish_sanitize_text',
	) );
	
	$wp_customize->add_control('hide_styletop', array(
		'label'   => __( 'Hide Top Bar', 'lavish' ),
		'section' => 'header_top_settings',
		'settings'   => 'hide_styletop',
		'priority' => 2,
		'type'    => 'checkbox',
	));

	// Hide the Announcement on the Top Menu
	$wp_customize->add_setting( 'hide_announcement', array(
		'default'        => '',
		'sanitize_callback' => 'lavish_sanitize_text',
	) );
	
	$wp_customize->add_control('hide_announcement', array(
		'label'   => __( 'Hide Announcement', 'lavish' ),
		'section' => 'header_top_settings',
		'settings'   => 'hide_announcement',
		'priority' => 2,
		'type'    => 'checkbox',
	));

	// Hide the Social Icons on the Top Menu
	$wp_customize->add_setting( 'hide_social_icons', array(
		'default'        => '',
		'sanitize_callback' => 'lavish_sanitize_text',
	) );
	
	$wp_customize->add_control('hide_social_icons', array(
		'label'   => __( 'Hide Social Icons', 'lavish' ),
		'section' => 'header_top_settings',
		'settings'   => 'hide_social_icons',
		'priority' => 3,
		'type'    => 'checkbox',
	));	

	// Setting for showing the Announcement
    $wp_customize->add_setting( 'style_announcement', array(
        'default'        => '',
        'sanitize_callback' => 'lavish_sanitize_text',
    ) );


    $wp_customize->add_control( 'style_announcement', array(
        'label' => __( 'Short Announcement', 'lavish' ),
        'type' => 'text',
        'section' => 'header_top_settings',
        'setting' => 'style_announcement',
        'priority' => 4,
    ) );
  
  	// Social Icons Colors

    $wp_customize->add_setting( 'styletop_bg', array(
        'default'        => '',
        'sanitize_callback' => 'lavish_sanitize_hex_color',
    ) );
    
    $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'styletop_bg', array(
        'label'   => __( 'Top Bar Background', 'lavish' ),
        'section' => 'header_top_settings',
        'settings'   => 'styletop_bg',
        'priority' => 5,            
    ) ) );

    // Top Bar Text Color
    $wp_customize->add_setting( 'styletop_text', array(
        'default'        => '',
        'sanitize_callback' => 'lavish_sanitize_hex_color',
    ) );
    
    $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'styletop_text', array(
        'label'   => __( 'Top Bar Text Color', 'lavish' ),
        'section' => 'header_top_settings',
        'settings'   => 'styletop_text',
        'priority' => 6,            

    ) ) );



	$wp_customize->add_section( 'choose_header_style', array(
		'title'          => __( 'Header Style', 'lavish' ),
		'description'	 => __('You Can Choose Various Header Styles From this part.', 'lavish'),	
		'priority'       => 5,
		'panel'			=> 'header_settings_panel',
	) );

	$wp_customize->add_setting( 'lavish_header_style', array(
            'sanitize_callback' =>  'lavish_sanitize_text'
        ) );
	 $wp_customize->add_control( new lavish_note ( $wp_customize,'lavish_header_style', array(
            'section'  => 'choose_header_style',
            'priority' => 1,
     ) ) );

	// Header Style
	$wp_customize->add_setting( 'header_style', array(
		'default'        => 'one',
		'sanitize_callback' => 'lavish_sanitize_text',
	) );
	
	$wp_customize->add_control('header_style', array(
		'label'   => __( 'Header Style', 'lavish' ),
		'section' => 'choose_header_style',
		'settings'   => 'header_style',
		'type'    => 'radio',
                'choices' => array(
                    'one' => __( 'Header Style 1', 'lavish' ),
                    'two' => __( 'Header Style 2', 'lavish' ),	
                ),
        'priority'       => 1,
    ));	

	$wp_customize->add_section( 'choose_header_color', array(
		'title'          => __( 'Header Color Settings', 'lavish' ),
		'description'	 => __('You Can Choose Various Header Colors From this part.', 'lavish'),	
		'priority'       => 5,
		'panel'			=> 'header_settings_panel',
	) );

	$wp_customize->add_setting( 'lavish_header_color', array(
            'sanitize_callback' =>  'lavish_sanitize_text'
        ) );
	 $wp_customize->add_control( new lavish_note ( $wp_customize,'lavish_header_color', array(
            'section'  => 'choose_header_color',
            'priority' => 1,
     ) ) );

   // Header background
	$wp_customize->add_setting( 'header_bg', array(
		'default'        => '',
		'sanitize_callback' => 'lavish_sanitize_hex_color',
	) );
	
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'header_bg', array(
		'label'   => __( 'Header Background', 'lavish' ),
		'section' => 'choose_header_color',
		'settings'   => 'header_bg',
		'priority' => 2,			
	) ) );

	
	$wp_customize->add_section( 'choose_search_icon', array(
		'title'          => __( 'Search Icon', 'lavish' ),
		'description'	 => __('Search Icon Settings ', 'lavish'),	
		'priority'       => 5,
		'panel'			=> 'header_settings_panel',
	) );

	$wp_customize->add_setting( 'lavish_search_icon', array(
            'sanitize_callback' =>  'lavish_sanitize_text'
        ) );
	 $wp_customize->add_control( new lavish_note ( $wp_customize,'lavish_search_icon', array(
            'section'  => 'choose_search_icon',
            'priority' => 1,
     ) ) );

	$wp_customize->add_setting( 'search_icon_hide', array(
		'default'        => '',
		'sanitize_callback' => 'lavish_sanitize_hex_color',
	) );


	$wp_customize->add_control('search_icon_hide', array(
		'label'   => __( 'Search Icon Hide', 'lavish' ),
		'section' => 'choose_search_icon',
		'settings'   => 'search_icon_hide',
		'priority' => 5,
		'type' => 'checkbox',			
	 ) );

	$wp_customize->add_setting( 'search_icon_color', array(
		'default'        => '',
		'sanitize_callback' => 'lavish_sanitize_hex_color',
	) );


	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'search_icon_color', array(
		'label'   => __( 'Search Icon Color', 'lavish' ),
		'section' => 'choose_search_icon',
		'settings'   => 'search_icon_color',
		'priority' => 5,			
	) ) );

	

	$wp_customize->add_section( 'choose_sticky_style', array(
		'title'          => __( 'Sticky Menu', 'lavish' ),
		'description'	 => __(' ', 'lavish'),	
		'priority'       => 5,
		'panel'			=> 'header_settings_panel',
	) );

	$wp_customize->add_setting( 'lavish_sticky_style', array(
            'sanitize_callback' =>  'lavish_sanitize_text'
        ) );
	 $wp_customize->add_control( new lavish_note ( $wp_customize,'lavish_sticky_style', array(
            'section'  => 'choose_sticky_style',
            'priority' => 1,
     ) ) );

	$wp_customize->add_setting( 'nav_position_scrolltop', array(
            'default' => '1',
            'sanitize_callback' => 'lavish_sanitize_checkbox',
    ) );
        
    $wp_customize->add_control( 'nav_position_scrolltop', array(
        'label'   => __( 'Sticky Menu', 'pure-and-simple' ),
        'section' => 'choose_sticky_style',
        'settings' => 'nav_position_scrolltop',
        'type'    => 'checkbox',
            'choices' => array(
                '1' => __( 'Sticky Menu', 'pure-and-simple' ),
                              
        ),
       'priority'       => 21,  
    ));

	$wp_customize->add_setting( 'nav_position_scrolltop_val', array(
            'default' => '180',
            'sanitize_callback' => 'lavish_sanitize_number',
        ) );
        
    $wp_customize->add_control( 'nav_position_scrolltop_val', array(
        'label'   => __( 'Sticky Menu Offset', 'pure-and-simple' ),
        'section' => 'choose_sticky_style',
        'settings' => 'nav_position_scrolltop_val',
        'type' => 'text',
        'priority'       => 22,  
    ));

    $wp_customize->add_section( 'navigation_colours', array(
		'title'          => __( 'Navigation Colours', 'lavish' ),
		'description'	 => __(' ', 'lavish'),	
		'priority'       => 5,
		'panel'			=> 'header_settings_panel',
	) );

    $wp_customize->add_setting( 'lavish_navigation_colours', array(
            'sanitize_callback' =>  'lavish_sanitize_text'
        ) );
	 $wp_customize->add_control( new lavish_note ( $wp_customize,'lavish_navigation_colours', array(
            'section'  => 'navigation_colours',
            'priority' => 1,
     ) ) );

	// Menu 1st level link color
	$wp_customize->add_setting( 'menu_link', array(
		'default'        => '',
		'sanitize_callback' => 'lavish_sanitize_hex_color',
	) );
	
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'menu_link', array(
		'label'   => __( 'Menu Link Color', 'lavish' ),
		'section' => 'navigation_colours',
		'settings'   => 'menu_link',
		'priority' => 23,			
	) ) );

	$wp_customize->add_setting( 'menu_link_bg', array(
		'default'        => '',
		'sanitize_callback' => 'lavish_sanitize_hex_color',
	) );
	
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'menu_link_bg', array(
		'label'   => __( 'Menu Link Background', 'lavish' ),
		'section' => 'navigation_colours',
		'settings'   => 'menu_link_bg',
		'priority' => 24,			
	) ) );
		

	// Menu 1st level link color on hover and acive
	$wp_customize->add_setting( 'menu_active', array(
		'default'        => '',
		'sanitize_callback' => 'lavish_sanitize_hex_color',
	) );
	
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'menu_active', array(
		'label'   => __( 'Menu Active Background', 'lavish' ),
		'section' => 'navigation_colours',
		'settings'   => 'menu_active',
		'priority' => 25,			
	) ) );

	$wp_customize->add_setting( 'menu_active_text', array(
		'default'        => '',
		'sanitize_callback' => 'lavish_sanitize_hex_color',
	) );
	
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'menu_active_text', array(
		'label'   => __( 'Menu Active Text Color', 'lavish' ),
		'section' => 'navigation_colours',
		'settings'   => 'menu_active_text',
		'priority' => 26,			
	) ) );
	
	$wp_customize->add_setting( 'menu_hover', array(
		'default'        => '',
		'sanitize_callback' => 'lavish_sanitize_hex_color',
	) );
	
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'menu_hover', array(
		'label'   => __( 'Menu Hover Background', 'lavish' ),
		'section' => 'navigation_colours',
		'settings'   => 'menu_hover',
		'priority' => 27,			
	) ) );

	$wp_customize->add_setting( 'menu_hover_text', array(
		'default'        => '',
		'sanitize_callback' => 'lavish_sanitize_hex_color',
	) );
	
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'menu_hover_text', array(
		'label'   => __( 'Menu Hover Text', 'lavish' ),
		'section' => 'navigation_colours',
		'settings'   => 'menu_hover_text',
		'priority' => 28,			
	) ) );
	
	$wp_customize->add_setting( 'submenu_bg_color', array(
		'default'        => '',
		'sanitize_callback' => 'lavish_sanitize_hex_color',
	) );
	
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'submenu_bg_color', array(
		'label'   => __( 'Submenu Background Color', 'lavish' ),
		'section' => 'navigation_colours',
		'settings'   => 'submenu_bg_color',
		'priority' => 29,			
	) ) );

	$wp_customize->add_setting( 'submenu_link_color', array(
		'default'        => '',
		'sanitize_callback' => 'lavish_sanitize_hex_color',
	) );
	
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'submenu_link_color', array(
		'label'   => __( 'Submenu Link Color', 'lavish' ),
		'section' => 'navigation_colours',
		'settings'   => 'submenu_link_color',
		'priority' => 30,			
	) ) );


	$wp_customize->add_setting( 'submenu_active', array(
		'default'        => '',
		'sanitize_callback' => 'lavish_sanitize_hex_color',
	) );
	
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'submenu_active', array(
		'label'   => __( 'Submenu Active Text', 'lavish' ),
		'section' => 'navigation_colours',
		'settings'   => 'submenu_active',
		'priority' => 31,			
	) ) );

	$wp_customize->add_setting( 'submenu_active_bg', array(
		'default'        => '',
		'sanitize_callback' => 'lavish_sanitize_hex_color',
	) );
	
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'submenu_active_bg', array(
		'label'   => __( 'Submenu Active Background', 'lavish' ),
		'section' => 'navigation_colours',
		'settings'   => 'submenu_active_bg',
		'priority' => 32,			
	) ) );


	$wp_customize->add_setting( 'submenu_hover', array(
		'default'        => '',
		'sanitize_callback' => 'lavish_sanitize_hex_color',
	) );
	
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'submenu_hover', array(
		'label'   => __( 'Submenu Hover Background', 'lavish' ),
		'section' => 'navigation_colours',
		'settings'   => 'submenu_hover',
		'priority' => 33,			
	) ) );

	$wp_customize->add_setting( 'submenu_hover_text', array(
		'default'        => '',
		'sanitize_callback' => 'lavish_sanitize_hex_color',
	) );
	
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'submenu_hover_text', array(
		'label'   => __( 'Submenu Hover Text', 'lavish' ),
		'section' => 'navigation_colours',
		'settings'   => 'submenu_hover_text',
		'priority' => 34,			
	) ) );


	// Submenu bottom border
	$wp_customize->add_setting( 'submenu_border', array(
		'default'        => '',
		'sanitize_callback' => 'lavish_sanitize_hex_color',
	) );
	
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'submenu_border', array(
		'label'   => __( 'Submenu Bottom Border', 'lavish' ),
		'section' => 'navigation_colours',
		'settings'   => 'submenu_border',
		'priority' => 35,			
	) ) );
    // Submenu Divider border
    $wp_customize->add_setting( 'submenu_divider', array(
        'default'        => '',
        'sanitize_callback' => 'lavish_sanitize_hex_color',
    ) );
    
    $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'submenu_divider', array(
        'label'   => __( 'Submenu Link Divider', 'lavish' ),
        'section' => 'navigation_colours',
        'settings'   => 'submenu_divider',
        'priority' => 35,           
    ) ) );
    $wp_customize->add_section( 'nav_size', array(
		'title'          => __( 'Navigation Sizes', 'lavish' ),
		'priority'       => 6,
		'panel'			=> 'header_settings_panel',
	) );


    $wp_customize->add_setting( 'lavish_nav_size', array(
            'sanitize_callback' =>  'lavish_sanitize_text'
        ) );
	 $wp_customize->add_control( new lavish_note ( $wp_customize,'lavish_nav_size', array(
            'section'  => 'nav_size',
            'priority' => 1,
     ) ) );

	// Menu 1st level Size
	$wp_customize->add_setting( 'menu_link_size', array(
		'default'        => '0.80rem',
		'sanitize_callback' => 'lavish_sanitize_hex_color',
	) );

	
	$wp_customize->add_control('menu_link_size', array(
		'label'   => __( 'Menu Link Size', 'lavish' ),
		'section' => 'nav_size',
		'settings'   => 'menu_link_size',
		'priority' => 1,			
	) );

	// Menu 1st level Size
	$wp_customize->add_setting( 'submenu_link_size', array(
		'default'        => '0.80rem',
		'sanitize_callback' => 'lavish_sanitize_hex_color',
	) );
	
	$wp_customize->add_control( 'submenu_link_size', array(
		'label'   => __( 'Submenu Menu Link Size', 'lavish' ),
		'section' => 'nav_size',
		'settings'   => 'submenu_link_size',
		'priority' => 2,			
	) );

	// Menu 1st level Size
	$wp_customize->add_setting( 'sub_submenu_link_size', array(
		'default'        => '0.80rem',
		'sanitize_callback' => 'lavish_sanitize_hex_color',
	) );
	
	$wp_customize->add_control('sub_submenu_link_size', array(
		'label'   => __( 'Third Level Menu Link Size', 'lavish' ),
		'section' => 'nav_size',
		'settings'   => 'sub_submenu_link_size',
		'priority' => 2,			
	) );

/*
=================================================
Basic Settings
=================================================
*/
	$wp_customize->add_panel( 'basic_settings_panel', array(// Header Panel
	    'priority'       => 5,
	    'capability'     => 'edit_theme_options',
	    'title'          => __('Basic Settings', 'lavish'),
	    'description'    => __('Organize Your Basis Settings', 'lavish'),
	));



    $wp_customize->add_section( 'site_layout', array(
        'title'          => __( 'Site Layout', 'lavish' ),
        'priority'       => 1,
        'panel'			=> 'basic_settings_panel'
    ) );

    // Setting for page width
	$wp_customize->add_setting( 'page_width', array(
            'default' => 'default',
            'sanitize_callback' => 'lavish_sanitize_pagewidth',
	) );
    // Control for page width	
	$wp_customize->add_control( 'page_width', array(
            'label'   => __( '', 'lavish' ),
            'section' => 'site_layout',
            'type'    => 'radio',
                'choices' => array(
                    'default' => __( 'Full Width', 'lavish' ),
                    'boxedmedium' => __( 'Boxed Medium 1200px', 'lavish' ),
                    'boxedsmall' => __( 'Boxed Small 1000px', 'lavish' ),
                ),
                'priority'       => 1,	
        ));

	$wp_customize->add_section( 'blog_layout', array(
        'title'          => __( 'Blog Layout', 'lavish' ),
        'description'    => __( 'Blog with left sidebar, blog with right sidebar and blog with left right sidebar, blog with full width is only available at free version.', 'lavish' ),
        'priority'       => 2,
        'panel'			=> 'basic_settings_panel'
    ) );

    $wp_customize->add_setting( 'lavish_blog_layout', array(
            'sanitize_callback' =>  'lavish_sanitize_text'
        ) );
	 $wp_customize->add_control( new lavish_note ( $wp_customize,'lavish_blog_layout', array(
            'section'  => 'blog_layout',
            'priority' => 3,
     ) ) );
		
    // Setting for blog layout
	$wp_customize->add_setting( 'blog_style', array(
            'default' => 'blogright',
            'sanitize_callback' => 'lavish_sanitize_blogstyle',
	) );
    // Control for blog layout	
	$wp_customize->add_control( 'blog_style', array(
            'label'   => __( '', 'lavish' ),
            'section' => 'blog_layout',
            'priority' => 2,
            'type'    => 'radio',
                'choices' => array(
                    
                    'blogright' => __( 'Blog with Right Sidebar', 'lavish' ),
                    'blogleft' => __( 'Blog with Left Sidebar', 'lavish' ),
                    'blogleftright' => __( 'Blog with Left &amp; Right Sidebar', 'lavish' ),
                    'blogwide' => __( 'Blog with Full Width &amp; no Sidebars', 'lavish' ),
                    'manosaryleft' => __( 'Blog Manosary with Left Sidebar', 'lavish' ),
                    'manosaryright' => __( 'Blog Manosary with Right Sidebars', 'lavish' ),
                    'manosarywide' => __( 'Blog Manosary Full Width', 'lavish' ),
                    'manosaryright' => __( 'Blog Manosary with Right Sidebars', 'lavish' ),
                    'boxedleft' => __( 'Blog Boxed Left Sidebar', 'lavish' ),
                    'boxedright' => __( 'Blog Boxed Right Sidebar', 'lavish' ),
                    'boxedwide' => __( 'Blog Boxed Full Width', 'lavish' )
                ),
    ));	
	
	$wp_customize->add_section( 'blog_color', array(
        'title'          => __( 'Blog Colors & Styles', 'lavish' ),
        'priority'       => 2,
        'panel'			=> 'basic_settings_panel'
    ) );

	$wp_customize->add_setting( 'lavish_blog_color', array(
            'sanitize_callback' =>  'lavish_sanitize_text'
        ) );
	 $wp_customize->add_control( new lavish_note ( $wp_customize,'lavish_blog_color', array(
            'section'  => 'blog_color',
            'priority' => 1,
     ) ) );

		
    // Setting for blog layout
	$wp_customize->add_setting( 'blog_button_style', array(
            'default' => 'one',
            'sanitize_callback' => 'lavish_sanitize_text',
	) );
    // Control for blog layout	
	$wp_customize->add_control( 'blog_button_style', array(
            'label'   => __( 'Choose Button Style', 'lavish' ),
            'section' => 'blog_color',
            'priority' => 1,
            'type'    => 'radio',
                'choices' => array(
                    'one' => __( 'Button Style 1', 'lavish' ),
                    'two' => __( 'Button Style 2', 'lavish' ),
                    'three' => __( 'Button Style 3', 'lavish' ),
                    'four' => __( 'Button Style 4', 'lavish' ),
                ),
    ));	

    // Setting for blog Color Classes
	$wp_customize->add_setting( 'blog_button_style_class', array(
            'default' => '',
            'sanitize_callback' => 'lavish_sanitize_text',
	) );
    // Control for blog layout	
	$wp_customize->add_control( 'blog_button_style_class', array(
            'label'   => __( 'Choose Button Class (Note: The Button Classes are found in the btn snippets of theme package folder)', 'lavish' ),
            'section' => 'blog_color',
            'priority' => 1,
            'type'    => 'text',
    ));	

    

	//Manosary Background Color
	$wp_customize->add_setting( 'manosary_bg_color', array(
		'default'        => '',
		'sanitize_callback' => 'lavish_sanitize_hex_color',
	) );
	
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'manosary_bg_color', array(
		'label'   => __( 'Manosary & Blog Box Background', 'lavish' ),
		'section' => 'blog_color',
		'settings'   => 'manosary_bg_color',
		'priority' => 5,			
	) ) );
	// Title Color
	$wp_customize->add_setting( 'manosary_blog_title_color', array(
		'default'        => '',
		'sanitize_callback' => 'lavish_sanitize_hex_color',
	) );
	
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'manosary_blog_title_color', array(
		'label'   => __( 'Blog Title Color', 'lavish' ),
		'section' => 'blog_color',
		'settings'   => 'manosary_blog_title_color',
		'priority' => 6,			
	) ) );
	
	// Blog Details Color
	$wp_customize->add_setting( 'bblog_details_color', array(
		'default'        => '',
		'sanitize_callback' => 'lavish_sanitize_hex_color',
	) );
	
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'bblog_details_color', array(
		'label'   => __( 'Blog Details Color', 'lavish' ),
		'section' => 'blog_color',
		'settings'   => 'bblog_details_color',
		'priority' => 8,			
	) ) );
	// Quote & Link Post background Color
	$wp_customize->add_setting( 'blog_quote_bg', array(
		'default'        => '',
		'sanitize_callback' => 'lavish_sanitize_hex_color',
	) );
	
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'blog_quote_bg', array(
		'label'   => __( 'Quote and Link Background', 'lavish' ),
		'section' => 'blog_color',
		'settings'   => 'blog_quote_bg',
		'priority' => 9,			
	) ) );
	// Quote & Link Post hover background Color
	$wp_customize->add_setting( 'blog_quote_hovbg', array(
		'default'        => '',
		'sanitize_callback' => 'lavish_sanitize_hex_color',
	) );
	
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'blog_quote_hovbg', array(
		'label'   => __( 'Quote and Link Hover Background', 'lavish' ),
		'section' => 'blog_color',
		'settings'   => 'blog_quote_hovbg',
		'priority' => 10,			
	) ) );
	
	// Pagination Link Color
	$wp_customize->add_setting( 'blog_pagination_link_color', array(
		'default'        => '',
		'sanitize_callback' => 'lavish_sanitize_hex_color',
	) );
	
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'blog_pagination_link_color', array(
		'label'   => __( 'Blog Pagination Link Color', 'lavish' ),
		'section' => 'blog_color',
		'settings'   => 'blog_pagination_link_color',
		'priority' => 13,			
	) ) );
	// Pagination Hover Color
	$wp_customize->add_setting( 'blog_pagination_link_color_hover', array(
		'default'        => '',
		'sanitize_callback' => 'lavish_sanitize_hex_color',
	) );
	
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'blog_pagination_link_color_hover', array(
		'label'   => __( 'Blog Pagination Link Color Hover', 'lavish' ),
		'section' => 'blog_color',
		'settings'   => 'blog_pagination_link_color_hover',
		'priority' => 14,			
	) ) );

	// Pagination Background Color
	$wp_customize->add_setting( 'blog_pagination_link_color', array(
		'default'        => '',
		'sanitize_callback' => 'lavish_sanitize_hex_color',
	) );
	
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'blog_pagination_link_color', array(
		'label'   => __( 'Blog Pagination Background Color', 'lavish' ),
		'section' => 'blog_color',
		'settings'   => 'blog_pagination_link_color',
		'priority' => 12,			
	) ) );

	// Pagination Link Color
	$wp_customize->add_setting( 'blog_pagination_text_color', array(
		'default'        => '',
		'sanitize_callback' => 'lavish_sanitize_hex_color',
	) );
	
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'blog_pagination_text_color', array(
		'label'   => __( 'Blog Pagination Text Color', 'lavish' ),
		'section' => 'blog_color',
		'settings'   => 'blog_pagination_text_color',
		'priority' => 12,			
	) ) );

	// Pagination Hover Color
	$wp_customize->add_setting( 'blog_pagination_link_color_hover', array(
		'default'        => '',
		'sanitize_callback' => 'lavish_sanitize_hex_color',
	) );
	
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'blog_pagination_link_color_hover', array(
		'label'   => __( 'Blog Pagination Background Color Hover', 'lavish' ),
		'section' => 'blog_color',
		'settings'   => 'blog_pagination_link_color_hover',
		'priority' => 12,			
	) ) );

	// Pagination Hover Text Color
	$wp_customize->add_setting( 'blog_pagination_text_color_hover', array(
		'default'        => '',
		'sanitize_callback' => 'lavish_sanitize_hex_color',
	) );
	
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'blog_pagination_text_color_hover', array(
		'label'   => __( 'Blog Pagination Text Color Hover', 'lavish' ),
		'section' => 'blog_color',
		'settings'   => 'blog_pagination_text_color_hover',
		'priority' => 12,			
	) ) );

	// Pagination Active Color
	$wp_customize->add_setting( 'blog_pagination_link_color_active', array(
		'default'        => '',
		'sanitize_callback' => 'lavish_sanitize_hex_color',
	) );
	
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'blog_pagination_link_color_active', array(
		'label'   => __( 'Blog Pagination Background Color Active', 'lavish' ),
		'section' => 'blog_color',
		'settings'   => 'blog_pagination_link_color_active',
		'priority' => 13,			
	) ) );

	// Pagination Active Color
	$wp_customize->add_setting( 'blog_pagination_text_color_active', array(
		'default'        => '',
		'sanitize_callback' => 'lavish_sanitize_hex_color',
	) );
	
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'blog_pagination_text_color_active', array(
		'label'   => __( 'Blog Pagination Text Color Active', 'lavish' ),
		'section' => 'blog_color',
		'settings'   => 'blog_pagination_text_color_active',
		'priority' => 13,			
	) ) );

    

	$wp_customize->add_section( 'blog_settings', array(
        'title'          => __( 'Blog Settings', 'lavish' ),
        'priority'       => 3,
        'panel'			=> 'basic_settings_panel'
    ) );

    // Setting for featured image
	$wp_customize->add_setting( 'featured_image', array(
            'default' => 'big',
            'sanitize_callback' => 'lavish_sanitize_featured_image',
	) );
    // Control for featured image
	$wp_customize->add_control( 'featured_image', array(
            'label'   => __( 'Featured Image', 'lavish' ),
            'section' => 'blog_settings',
                'priority' => 4,
            'type'    => 'radio',
                'choices' => array(
                    'big' => __( 'Wide Featured Image', 'lavish' ),
                                'small' => __( 'Small Featured Image', 'lavish' ),
                ),
            ));
        
    // hide featured image on single
	$wp_customize->add_setting( 'hide_featured', array(
	'sanitize_callback' => 'lavish_sanitize_checkbox',
	));
	$wp_customize->add_control( 'hide_featured', array(
        'type' => 'checkbox',
        'label'    => __( 'Hide Full Post Featured Image', 'lavish' ),
        'section' => 'blog_settings',
		'priority' => 5,
    ) );

    // Setting for content or excerpt
	$wp_customize->add_setting( 'excerpt_content', array(
            'default' => 'content',
            'sanitize_callback' => 'lavish_sanitize_excerpt',
	) );
        
    // Control for Content or excerpt
	$wp_customize->add_control( 'excerpt_content', array(
            'label'   => __( 'Content or Excerpt', 'lavish' ),
            'section' => 'blog_settings',
            'type'    => 'radio',
                'choices' => array(
                    'content' => __( 'Content', 'lavish' ),
                    'excerpt' => __( 'Excerpt', 'lavish' ),	
                ),
                'priority'       => 6,
            ));

    // Setting group for a excerpt
	$wp_customize->add_setting( 'excerpt_limit', array(
		'default'        => '50',
		'sanitize_callback' => 'lavish_sanitize_text',
	) );
	$wp_customize->add_control( 'excerpt_limit', array(
		'settings' => 'excerpt_limit',
		'label'    => __( 'Excerpt Length', 'lavish' ),
		'section'  => 'blog_settings',
		'type'     => 'text',
		'priority'       => 7,
	) );
	
    // hide single footer meta
	$wp_customize->add_setting( 'hide_postinfo', array(
	'sanitize_callback' => 'lavish_sanitize_checkbox',
	));
	$wp_customize->add_control( 'hide_postinfo', array(
        'type' => 'checkbox',
        'label'    => __( 'Hide Post Footer Info', 'lavish' ),
        'section' => 'blog_settings',
		'priority' => 8,
    ) );	
    // hide single post nav
	$wp_customize->add_setting( 'hide_postnav', array(
	'sanitize_callback' => 'lavish_sanitize_checkbox',
	));
	$wp_customize->add_control( 'hide_postnav', array(
        'type' => 'checkbox',
        'label'    => __( 'Hide Post Navigation', 'lavish' ),
        'section' => 'blog_settings',
		'priority' => 9,
    ) );	
           
    // hide page title dotline
	$wp_customize->add_setting( 'hide_edit', array(
	'sanitize_callback' => 'lavish_sanitize_checkbox',
	));
	$wp_customize->add_control( 'hide_edit', array(
        'type' => 'checkbox',
        'label'    => __( 'Hide Edit Button', 'lavish' ),
        'section' => 'blog_settings',
		'priority' => 12,
    ) );	

	$wp_customize->add_section( 'move_top_top', array(
        'title'          => __( 'Move To Top', 'lavish' ),
        'priority'       => 4,
        'panel'			=> 'basic_settings_panel'
    ) );

	$wp_customize->add_setting( 'lavish_move_top_top', array(
            'sanitize_callback' =>  'lavish_sanitize_text'
        ) );
	 $wp_customize->add_control( new lavish_note ( $wp_customize,'lavish_move_top_top', array(
            'section'  => 'move_top_top',
            'priority' => 1,
     ) ) );


    $wp_customize->add_setting( 'movetotop', array(
		'default'        => '1',
		'sanitize_callback' => 'lavish_sanitize_checkbox',
	) );

	$wp_customize->add_control( 'movetotop', array(
		'settings' => 'movetotop',
		'label'    => __( 'Enable Move To Top', 'lavish' ),
		'section'  => 'move_top_top',		
		'type'     => 'checkbox',
		'priority' => 14,
	) );

$wp_customize->get_section('title_tagline')->panel = 'site_title_and_taglines';
	$wp_customize->add_panel( 'site_title_and_taglines', array(// Header Panel
	    'priority'       => 1,
	    'capability'     => 'edit_theme_options',
	    'title'          => __('Site Title & Taglines', 'lavish'),
	    'description'    => __('Deals with the Site Title settings of your theme', 'lavish'),
	));
	


    // Setting group for selecting logo title
        $wp_customize->add_setting( 'logo_style', array(
            'default' => 'text',
            'sanitize_callback' => 'lavish_sanitize_logo_style',
	) );
			
	$wp_customize->add_control( 'logo_style', array(
            'label'     => __( 'Logo Style', 'lavish' ),
            'section'   => 'title_tagline',
            'priority'  => 10,
            'type'      => 'radio',
                'choices' => array(
                    'default'   => __( 'Default Logo', 'lavish' ),
                    'custom'    => __( 'Your Logo', 'lavish' ),
                    'logotext'  => __( 'Logo with Title and Tagline', 'lavish' ),
                    'text'      => __( 'Text Title', 'lavish' ),
                ),
            ));
	
    // Setting group for uploading logo
        $wp_customize->add_setting('my_logo', array(
            'default'           => '',
            'capability'        => 'edit_theme_options',
            'type'              => 'option',
            'sanitize_callback' => 'lavish_sanitize_upload',
        ));
	
        $wp_customize->add_control( new WP_Customize_Image_Control($wp_customize, 'my_logo', array(
            'label'    => __('Your Logo', 'lavish'),
            'section'  => 'title_tagline',
            'settings' => 'my_logo',
            'priority' => 11,
        ))); 
        
       // site title color
	$wp_customize->add_setting( 'sitetitle', array(
		'default'        => '',
		'sanitize_callback' => 'lavish_sanitize_hex_color',
	) );
	
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'sitetitle', array(
		'label'   => __( 'Site Title Color', 'lavish' ),
		'section' => 'title_tagline',
		'settings'   => 'sitetitle',
		'priority' => 12,			
	) ) );
// tagline color
	$wp_customize->add_setting( 'tagline', array(
		'default'        => '',
		'sanitize_callback' => 'lavish_sanitize_hex_color',
	) );
	
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'tagline', array(
		'label'   => __( 'Tagline Color', 'lavish' ),
		'section' => 'title_tagline',
		'settings'   => 'tagline',
		'priority' => 13,			
	) ) );
// logo title margin
	$wp_customize->add_setting( 'titlemargin', array(
		'default'        => '0 0 0 0',
		'sanitize_callback' => 'lavish_sanitize_text',
	) );
	$wp_customize->add_control( 'titlemargin', array(
		'settings' => 'titlemargin',
		'label'    => __( 'Site Title Margins', 'lavish' ),
		'section'  => 'title_tagline',
		'type'     => 'text',
		'priority'       => 14,
	) );

	// logo title padding
	$wp_customize->add_setting( 'titlepadding', array(
		'default'        => '5px 0px 5px 0px',
		'sanitize_callback' => 'lavish_sanitize_text',
	) );
	$wp_customize->add_control( 'titlepadding', array(
		'settings' => 'titlepadding',
		'label'    => __( 'Site Title padding', 'lavish' ),
		'section'  => 'title_tagline',
		'type'     => 'text',
		'priority'       => 15,
	) );






/**
 * This is a custom section called Typography
 * which contains settings for typography
 */

	$wp_customize->add_panel( 'typography_settings', array(// Header Panel
	    'priority'       => 6,
	    'capability'     => 'edit_theme_options',
	    'title'          => __('Typography Settings', 'lavish'),
	    'description'    => __('Deals with the Typography settings of your theme', 'lavish'),
	));

	$wp_customize->add_section( 'typography', array(
		'title'          => __( 'Typography', 'lavish' ),
		'priority'       => 6,
		'panel' => 'typography_settings',
	) );

	$wp_customize->add_setting( 'lavish_typography_settings', array(
            'sanitize_callback' =>  'lavish_sanitize_text'
        ) );
	 $wp_customize->add_control( new lavish_note ( $wp_customize,'lavish_typography_settings', array(
            'section'  => 'typography',
            'priority' => 1,
     ) ) );

        
    
        
        //text size and color selection 
        $wp_customize->add_setting('h1_fontsize', array(
            'default'           => '',
            'sanitize_callback' => 'lavish_sanitize_text',
        ));
        
        $wp_customize->add_control( 'h1_fontsize', array(
		'label'     => __( 'H1 Font-Size', 'lavish' ),
		'section'   => 'typography',
		'settings'  => 'h1_fontsize',
		'priority' => 2,			
	) );
        
        $wp_customize->add_setting( 'h1_fontcolor', array(
		'default'        => '',
		'sanitize_callback' => 'lavish_sanitize_hex_color',
	) );
	
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'h1_fontcolor', array(
		'label'   => __( 'H1 Color', 'lavish' ),
		'section' => 'typography',
		'settings'   => 'h1_fontcolor',
		'priority' => 3,			
	) ) );
        
        $wp_customize->add_setting('h2_fontsize', array(
            'default'           => '',
            'sanitize_callback' => 'lavish_sanitize_text',
        ));
        
        $wp_customize->add_control( 'h2_fontsize', array(
		'label'     => __( 'H2 Font-Size', 'lavish' ),
		'section'   => 'typography',
		'settings'  => 'h2_fontsize',
		'priority' => 4,			
	) );
        
        $wp_customize->add_setting( 'h2_fontcolor', array(
		'default'        => '',
		'sanitize_callback' => 'lavish_sanitize_hex_color',
	) );
	
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'h2_fontcolor', array(
		'label'   => __( 'H2 Color', 'lavish' ),
		'section' => 'typography',
		'settings'   => 'h2_fontcolor',
		'priority' => 5,			
	) ) );
        
        $wp_customize->add_setting('h3_fontsize', array(
            'default'           => '',
            'sanitize_callback' => 'lavish_sanitize_text',
        ));
        
        $wp_customize->add_control( 'h3_fontsize', array(
		'label'     => __( 'H3 Font-Size', 'lavish' ),
		'section'   => 'typography',
		'settings'  => 'h3_fontsize',
		'priority' => 6,			
	) );
        
        $wp_customize->add_setting( 'h3_fontcolor', array(
		'default'        => '',
		'sanitize_callback' => 'lavish_sanitize_hex_color',
	) );
	
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'h3_fontcolor', array(
		'label'   => __( 'H3 Color', 'lavish' ),
		'section' => 'typography',
		'settings'   => 'h3_fontcolor',
		'priority' => 7,			
	) ) );
        
        $wp_customize->add_setting('h4_fontsize', array(
            'default'           => '',
            'sanitize_callback' => 'lavish_sanitize_text',
        ));
        
        $wp_customize->add_control( 'h4_fontsize', array(
		'label'     => __( 'H4 Font-Size', 'lavish' ),
		'section'   => 'typography',
		'settings'  => 'h4_fontsize',
		'priority' => 8,			
	) );
        
        $wp_customize->add_setting( 'h4_fontcolor', array(
		'default'        => '',
		'sanitize_callback' => 'lavish_sanitize_hex_color',
	) );
	
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'h4_fontcolor', array(
		'label'   => __( 'H4 Color', 'lavish' ),
		'section' => 'typography',
		'settings'   => 'h4_fontcolor',
		'priority' => 9,			
	) ) );
        
        $wp_customize->add_setting('h5_fontsize', array(
            'default'           => '',
            'sanitize_callback' => 'lavish_sanitize_text',
        ));
        
        $wp_customize->add_control( 'h5_fontsize', array(
		'label'     => __( 'H5 Font-Size', 'lavish' ),
		'section'   => 'typography',
		'settings'  => 'h5_fontsize',
		'priority' => 10,			
	) );
        
        $wp_customize->add_setting( 'h5_fontcolor', array(
		'default'        => '',
		'sanitize_callback' => 'lavish_sanitize_hex_color',
	) );
	
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'h5_fontcolor', array(
		'label'   => __( 'H5 Color', 'lavish' ),
		'section' => 'typography',
		'settings'   => 'h5_fontcolor',
		'priority' => 11,			
	) ) );
        
        $wp_customize->add_setting('h6_fontsize', array(
            'default'           => '',
            'sanitize_callback' => 'lavish_sanitize_text',
        ));
        
        $wp_customize->add_control( 'h6_fontsize', array(
		'label'     => __( 'H6 Font-Size', 'lavish' ),
		'section'   => 'typography',
		'settings'  => 'h6_fontsize',
		'priority' => 12,			
	) );
        
        $wp_customize->add_setting( 'h6_fontcolor', array(
		'default'        => '',
		'sanitize_callback' => 'lavish_sanitize_hex_color',
	) );
	
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'h6_fontcolor', array(
		'label'   => __( 'H6 Color', 'lavish' ),
		'section' => 'typography',
		'settings'   => 'h6_fontcolor',
		'priority' => 13,			
	) ) );
        
        $wp_customize->add_setting('p_fontsize', array(
            'default'           => '',
            'sanitize_callback' => 'lavish_sanitize_text',
        ));
        
        $wp_customize->add_control( 'p_fontsize', array(
		'label'     => __( 'Paragraph Font-Size', 'lavish' ),
		'section'   => 'typography',
		'settings'  => 'p_fontsize',
		'priority' => 14,			
	) );
        
        $wp_customize->add_setting( 'p_fontcolor', array(
		'default'        => '',
		'sanitize_callback' => 'lavish_sanitize_hex_color',
	) );
	
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'p_fontcolor', array(
		'label'   => __( 'Paragraph Color', 'lavish' ),
		'section' => 'typography',
		'settings'   => 'p_fontcolor',
		'priority' => 15,			
	) ) );
        
        $wp_customize->add_setting('a_fontsize', array(
            'default'           => '',
            'sanitize_callback' => 'lavish_sanitize_text',
        ));
        
        $wp_customize->add_control( 'a_fontsize', array(
		'label'     => __( 'Anchor Font-Size', 'lavish' ),
		'section'   => 'typography',
		'settings'  => 'a_fontsize',
		'priority' => 16,			
	) );
        
        $wp_customize->add_setting( 'a_fontcolor', array(
		'default'        => '',
		'sanitize_callback' => 'lavish_sanitize_hex_color',
	) );
	
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'a_fontcolor', array(
		'label'   => __( 'Anchor Color', 'lavish' ),
		'section' => 'typography',
		'settings'   => 'a_fontcolor',
		'priority' => 17,			
	) ) );
        
        $wp_customize->add_setting( 'ahover_fontcolor', array(
		'default'        => '',
		'sanitize_callback' => 'lavish_sanitize_hex_color',
	) );
	
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'ahover_fontcolor', array(
		'label'   => __( 'Anchor Hover Color', 'lavish' ),
		'section' => 'typography',
		'settings'   => 'ahover_fontcolor',
		'priority' => 18,			
	) ) );
        
        $wp_customize->add_setting('li_fontsize', array(
            'default'           => '1em',
            'sanitize_callback' => 'lavish_sanitize_text',
        ));
        
        $wp_customize->add_control( 'li_fontsize', array(
		'label'     => __( 'Link Font-Size', 'lavish' ),
		'section'   => 'typography',
		'settings'  => 'li_fontsize',
		'priority' => 19,			
	) );
        $wp_customize->add_setting( 'li_fontcolor', array(
		'default'        => '',
		'sanitize_callback' => 'lavish_sanitize_hex_color',
	) );
	
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'li_fontcolor', array(
		'label'   => __( 'Link Color', 'lavish' ),
		'section' => 'typography',
		'settings'   => 'li_fontcolor',
		'priority' => 20,			
	) ) );

	    $wp_customize->add_setting( 'lihov_fontcolor', array(
		'default'        => '',
		'sanitize_callback' => 'lavish_sanitize_hex_color',
	) );
	
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'lihov_fontcolor', array(
		'label'   => __( 'Link Hover Color', 'lavish' ),
		'section' => 'typography',
		'settings'   => 'lihov_fontcolor',
		'priority' => 21,			
	) ) );


/**
 * This is a section called Colors
 * This is for the primary colors
 */
	
	$wp_customize->add_panel( 'color_settings', array(// Header Panel
	    'priority'       => 6,
	    'capability'     => 'edit_theme_options',
	    'title'          => __('Color Settings', 'lavish'),
	    'description'    => __('Deals with the color settings of your theme', 'lavish'),
	));
	

	$wp_customize->add_section( 'colors', array(
		'title'          => __( 'Colors', 'lavish' ),
		'priority'       => 5,
		'panel'			=> 'color_settings',
	) );

	$wp_customize->add_setting( 'lavish_color_settings', array(
            'sanitize_callback' =>  'lavish_sanitize_text'
        ) );
	 $wp_customize->add_control( new lavish_note ( $wp_customize,'lavish_color_settings', array(
            'section'  => 'colors',
            'priority' => 1,
     ) ) );
        

	 
        // Body background
	$wp_customize->add_setting( 'bodyback_bg', array(
		'default'        => '',
		'sanitize_callback' => 'lavish_sanitize_hex_color',
	) );
	
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'bodyback_bg', array(
		'label'   => __( 'Body Background', 'lavish' ),
		'section' => 'colors',
		'settings'   => 'bodyback_bg',
		'priority' => 2,			
	) ) );
        
           
	$wp_customize->add_section( 'breadcumb_colors', array(
		'title'          => __( 'Breadcumb Colors', 'lavish' ),
		'priority'       => 5,
		'panel'			=> 'color_settings',
	) );

		$wp_customize->add_setting( 'lavish_breadcumb_colors', array(
            'sanitize_callback' =>  'lavish_sanitize_text'
        ) );
	 $wp_customize->add_control( new lavish_note ( $wp_customize,'lavish_breadcumb_colors', array(
            'section'  => 'breadcumb_colors',
            'priority' => 1,
     ) ) );
    // BreadCumb background
	$wp_customize->add_setting( 'breadcumb_bg', array(
		'default'        => '',
		'sanitize_callback' => 'lavish_sanitize_hex_color',
	) );
	
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'breadcumb_bg', array(
		'label'   => __( 'Breadcrumb Background', 'lavish' ),
		'section' => 'breadcumb_colors',
		'settings'   => 'breadcumb_bg',
		'priority' => 4,			
	) ) );

	 // BreadCumb background
	$wp_customize->add_setting( 'breadcumb_header_color', array(
		'default'        => '',
		'sanitize_callback' => 'lavish_sanitize_hex_color',
	) );
	
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'breadcumb_header_color', array(
		'label'   => __( 'Breadcrumb Heading Color', 'lavish' ),
		'section' => 'breadcumb_colors',
		'settings'   => 'breadcumb_header_color',
		'priority' => 4,			
	) ) );
        
        // Breadcrumbs text
	$wp_customize->add_setting( 'breadcrumbs_text', array(
		'default'        => '',
		'sanitize_callback' => 'lavish_sanitize_hex_color',
	) );
	
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'breadcrumbs_text', array(
		'label'   => __( 'Breadcrumbs Text', 'lavish' ),
		'section' => 'breadcumb_colors',
		'settings'   => 'breadcrumbs_text',
		'priority' => 37,			
	) ) );
        // Breadcrumbs text link 
	$wp_customize->add_setting( 'breadcrumbs_link', array(
		'default'        => '',
		'sanitize_callback' => 'lavish_sanitize_hex_color',
	) );
	
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'breadcrumbs_link', array(
		'label'   => __( 'Breadcrumbs Link Color', 'lavish' ),
		'section' => 'breadcumb_colors',
		'settings'   => 'breadcrumbs_link',
		'priority' => 38,			
	) ) );	
        // Breadcrumbs text link on hover
	$wp_customize->add_setting( 'breadcrumbs_link_hov', array(
		'default'        => '',
		'sanitize_callback' => 'lavish_sanitize_hex_color',
	) );
	
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'breadcrumbs_link_hov', array(
		'label'   => __( 'Breadcrumbs Link Hover', 'lavish' ),
		'section' => 'breadcumb_colors',
		'settings'   => 'breadcrumbs_link_hov',
		'priority' => 39,			
	) ) );
        
        
        // Call to Action background
	$wp_customize->add_setting( 'cta_bg', array(
		'default'        => '',
		'sanitize_callback' => 'lavish_sanitize_hex_color',
	) );
	
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'cta_bg', array(
		'label'   => __( 'Call to Action Background', 'lavish' ),
		'section' => 'colors',
		'settings'   => 'cta_bg',
		'priority' => 4,			
	) ) );
        
        // Top Widget background
	$wp_customize->add_setting( 'top_widget_bg', array(
		'default'        => '',
		'sanitize_callback' => 'lavish_sanitize_hex_color',
	) );
	
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'top_widget_bg', array(
		'label'   => __( 'Top Widget Background', 'lavish' ),
		'section' => 'colors',
		'settings'   => 'top_widget_bg',
		'priority' => 5,			
	) ) );
           
        
    
        // Inset Top Widget background
	$wp_customize->add_setting( 'insettop_widget_bg', array(
		'default'        => '',
		'sanitize_callback' => 'lavish_sanitize_hex_color',
	) );
	
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'insettop_widget_bg', array(
		'label'   => __( 'Inset Top Widget Background', 'lavish' ),
		'section' => 'colors',
		'settings'   => 'insettop_widget_bg',
		'priority' => 6,			
	) ) );
    
        
              
        // Left Sidebar background
	$wp_customize->add_setting( 'leftsidebar_bg', array(
		'default'        => '',
		'sanitize_callback' => 'lavish_sanitize_hex_color',
	) );
	
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'leftsidebar_bg', array(
		'label'   => __( 'Left Sidebar Background', 'lavish' ),
		'section' => 'colors',
		'settings'   => 'leftsidebar_bg',
		'priority' => 8,			
	) ) );
     
    // Content background
	$wp_customize->add_setting( 'content_bg', array(
		'default'        => '',
		'sanitize_callback' => 'lavish_sanitize_hex_color',
	) );
	
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'content_bg', array(
		'label'   => __( 'Content Background', 'lavish' ),
		'section' => 'colors',
		'settings'   => 'content_bg',
		'priority' => 9,			
	) ) );

	    // Content Text Color
	$wp_customize->add_setting( 'content_text_color', array(
		'default'        => '',
		'sanitize_callback' => 'lavish_sanitize_hex_color',
	) );
	
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'content_text_color', array(
		'label'   => __( 'Content Text Color', 'lavish' ),
		'section' => 'colors',
		'settings'   => 'content_text_color',
		'priority' => 10,			
	) ) );
        
        // Content Link Color
	$wp_customize->add_setting( 'content_link_color', array(
		'default'        => '',
		'sanitize_callback' => 'lavish_sanitize_hex_color',
	) );
	
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'content_link_color', array(
		'label'   => __( 'Content Link Color', 'lavish' ),
		'section' => 'colors',
		'settings'   => 'content_link_color',
		'priority' => 11,			
	) ) );
        
        
     
        
        
        
        // Right Sidebar background
	$wp_customize->add_setting( 'rightsidebar_bg', array(
		'default'        => '',
		'sanitize_callback' => 'lavish_sanitize_hex_color',
	) );
	
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'rightsidebar_bg', array(
		'label'   => __( 'Right Sidebar Background', 'lavish' ),
		'section' => 'colors',
		'settings'   => 'rightsidebar_bg',
		'priority' => 11,			
	) ) );
        
        
     
         
        // Inset Bottom Widget background
        $wp_customize->add_setting( 'insetbottom_widget_bg', array(
		'default'        => '',
		'sanitize_callback' => 'lavish_sanitize_hex_color',
	) );
	
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'insetbottom_widget_bg', array(
		'label'   => __( 'Inset Bottom Widget Background', 'lavish' ),
		'section' => 'colors',
		'settings'   => 'insetbottom_widget_bg',
		'priority' => 12,			
	) ) );
        
        
        
        // Content Bottom  Widget background
        $wp_customize->add_setting( 'contentbottom_widget_bg', array(
		'default'        => '',
		'sanitize_callback' => 'lavish_sanitize_hex_color',
	) );
	
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'contentbottom_widget_bg', array(
		'label'   => __( 'Content Bottom Widget Background', 'lavish' ),
		'section' => 'colors',
		'settings'   => 'contentbottom_widget_bg',
		'priority' => 14,			
	) ) );

	// Content Bottom  Widget Border 
        $wp_customize->add_setting( 'contentbottom_widget_border_top', array(
		'default'        => '',
		'sanitize_callback' => 'lavish_sanitize_hex_color',
	) );
	
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'contentbottom_widget_border_top', array(
		'label'   => __( 'Bottom Widget Top Border Color', 'lavish' ),
		'section' => 'colors',
		'settings'   => 'contentbottom_widget_border_top',
		'priority' => 14,			
	) ) );
        
        //Bottom  Widget background
        $wp_customize->add_setting( 'bottom_widget_bg', array(
		'default'        => '',
		'sanitize_callback' => 'lavish_sanitize_hex_color',
	) );
	
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'bottom_widget_bg', array(
		'label'   => __( 'Bottom Widget Background', 'lavish' ),
		'section' => 'colors',
		'settings'   => 'bottom_widget_bg',
		'priority' => 15,			
	) ) );

    
        
    $wp_customize->add_section( 'button_colors', array(
		'title'          => __( 'Button Colors', 'lavish' ),
		'priority'       => 5,
		'panel'			=> 'color_settings',
	) );

    $wp_customize->add_setting( 'btn_color', array(
		'default'        => '',
		'sanitize_callback' => 'lavish_sanitize_hex_color',
	) );
	
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'btn_color', array(
		'label'   => __( 'Button Color', 'lavish' ),
		'section' => 'button_colors',
		'settings'   => 'btn_color',
		'priority' => 17,			
	) ) );
        $wp_customize->add_setting( 'btn_bg_color', array(
		'default'        => '',
		'sanitize_callback' => 'lavish_sanitize_hex_color',
	) );
	
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'btn_bg_color', array(
		'label'   => __( 'Button Background', 'lavish' ),
		'section' => 'button_colors',
		'settings'   => 'btn_bg_color',
		'priority' => 18,			
	) ) );
        $wp_customize->add_setting( 'btnhover_color', array(
		'default'        => '',
		'sanitize_callback' => 'lavish_sanitize_hex_color',
	) );
	
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'btnhover_color', array(
		'label'   => __( 'Button Hover Color', 'lavish' ),
		'section' => 'button_colors',
		'settings'   => 'btnhover_color',
		'priority' => 19,			
	) ) );
        $wp_customize->add_setting( 'btnhover_bg_color', array(
		'default'        => '',
		'sanitize_callback' => 'lavish_sanitize_hex_color',
	) );
	
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'btnhover_bg_color', array(
		'label'   => __( 'Button Hover Background', 'lavish' ),
		'section' => 'button_colors',
		'settings'   => 'btnhover_bg_color',
		'priority' => 20,			
	) ) );


	$wp_customize->add_panel( 'footer_panel', array(// Header Panel
	    'priority'       => 6,
	    'capability'     => 'edit_theme_options',
	    'title'          => __('Footer Settings', 'lavish'),
	    'description'    => __('Deals with the Footer portion of your theme', 'lavish'),
	));

	$wp_customize->add_section( 'copyright', array(
		'title'          => __( 'Copyright Text', 'lavish' ),
		'priority'       => 50,
		'panel'          => 'footer_panel',
	) );

	$wp_customize->add_setting( 'lavish_copyright', array(
            'sanitize_callback' =>  'lavish_sanitize_text'
        ) );
	 $wp_customize->add_control( new lavish_note ( $wp_customize,'lavish_copyright', array(
            'section'  => 'copyright',
            'priority' => 1,
     ) ) );


	// Setting group for a Copyright
	$wp_customize->add_setting( 'copyright', array(
		'default'        => 'Your Name',
		'sanitize_callback' => 'lavish_sanitize_text',
	) );

	$wp_customize->add_control( 'copyright', array(
		'settings' => 'copyright',
		'label'    => __( 'Your Copyright Notice', 'lavish' ),
		'section'  => 'copyright',		
		'type'     => 'text',
		'priority' => 13,
	) );

	$wp_customize->add_section( 'social_settings', array(
		'title'          => __( 'Display Social', 'lavish' ),
		'priority'       => 50,
		'panel'          => 'footer_panel',
	) );

	$wp_customize->add_setting( 'lavish_social_settings', array(
            'sanitize_callback' =>  'lavish_sanitize_text'
        ) );
	 $wp_customize->add_control( new lavish_note ( $wp_customize,'lavish_social_settings', array(
            'section'  => 'social_settings',
            'priority' => 1,
     ) ) );


	// Setting group for a Copyright
	$wp_customize->add_setting( 'footer_social_display', array(
		'default'        => 'Your Name',
		'sanitize_callback' => 'lavish_sanitize_text',
	) );

	$wp_customize->add_control( 'footer_social_display', array(
		'settings' => 'footer_social_display',
		'label'    => __( 'Display Social Icons on Footer', 'lavish' ),
		'section'  => 'social_settings',		
		'type'     => 'checkbox',
		'priority' => 13,
	) );

	$wp_customize->add_section( 'footer_color', array(
		'title'          => __( 'Color Settings', 'lavish' ),
		'priority'       => 50,
		'panel'          => 'footer_panel',
	) );

        //Footer background
        
        $wp_customize->add_setting( 'footer_bg', array(
		'default'        => '',
		'sanitize_callback' => 'lavish_sanitize_hex_color',
	) );
	
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'footer_bg', array(
		'label'   => __( 'Footer Background', 'lavish' ),
		'section' => 'footer_color',
		'settings'   => 'footer_bg',
		'priority' => 16,			
	) ) );
        
        //Footer text
        
        $wp_customize->add_setting( 'footer_text', array(
		'default'        => '',
		'sanitize_callback' => 'lavish_sanitize_hex_color',
	) );
	
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'footer_text', array(
		'label'   => __( 'Footer Text ', 'lavish' ),
		'section' => 'footer_color',
		'settings'   => 'footer_text',
		'priority' => 16,			
	) ) );


	










        
        
        
/**
 * This is a custom section called Social Networking
 * which contains settings for social networking icons and links
 */
	$wp_customize->add_panel( 'social_networking_panel', array(// Header Panel
	    'priority'       => 6,
	    'capability'     => 'edit_theme_options',
	    'title'          => __('Social Networking', 'lavish'),
	    'description'    => __('Deals with the social networking of your theme', 'lavish'),
	));

	$wp_customize->add_section( 'social_networking', array(
		'title'          => __( 'Social Networking Links', 'lavish' ),
		'priority'       => 1,
		'panel'          => 'social_networking_panel',
	) );

	// Setting group for Twitter
	$wp_customize->add_setting( 'twitter_uid', array(
		'default'        => '',
		'sanitize_callback' => 'lavish_sanitize_url',
	) );

	$wp_customize->add_control( 'twitter_uid', array(
		'settings' => 'twitter_uid',
		'label'    => __( 'Twitter', 'lavish' ),
		'section'  => 'social_networking',
		'type'     => 'text',
		'priority' => 2,
	) );	
	
// Setting group for Facebook
	$wp_customize->add_setting( 'facebook_uid', array(
		'default'        => '',
		'sanitize_callback' => 'lavish_sanitize_url',
	) );

	$wp_customize->add_control( 'facebook_uid', array(
		'settings' => 'facebook_uid',
		'label'    => __( 'Facebook', 'lavish' ),
		'section'  => 'social_networking',
		'type'     => 'text',
		'priority' => 3,
	) );	
	
// Setting group for Google+
	$wp_customize->add_setting( 'google_uid', array(
		'default'        => '',
		'sanitize_callback' => 'lavish_sanitize_url',
	) );

	$wp_customize->add_control( 'google_uid', array(
		'settings' => 'google_uid',
		'label'    => __( 'Google+', 'lavish' ),
		'section'  => 'social_networking',
		'type'     => 'text',
		'priority' => 4,
	) );	
	
// Setting group for Linkedin
	$wp_customize->add_setting( 'linkedin_uid', array(
		'default'        => '',
		'sanitize_callback' => 'lavish_sanitize_url',
	) );

	$wp_customize->add_control( 'linkedin_uid', array(
		'settings' => 'linkedin_uid',
		'label'    => __( 'Linkedin', 'lavish' ),
		'section'  => 'social_networking',
		'type'     => 'text',
		'priority' => 5,
	) );	
	
// Setting group for Pinterest
	$wp_customize->add_setting( 'pinterest_uid', array(
		'default'        => '',
		'sanitize_callback' => 'lavish_sanitize_url',
	) );

	$wp_customize->add_control( 'pinterest_uid', array(
		'settings' => 'pinterest_uid',
		'label'    => __( 'Pinterest', 'lavish' ),
		'section'  => 'social_networking',
		'type'     => 'text',
		'priority' => 6,
	) );

// Setting group for Flickr
	$wp_customize->add_setting( 'flickr_uid', array(
		'default'        => '',
		'sanitize_callback' => 'lavish_sanitize_url',
	) );

	$wp_customize->add_control( 'flickr_uid', array(
		'settings' => 'flickr_uid',
		'label'    => __( 'Flickr', 'lavish' ),
		'section'  => 'social_networking',
		'type'     => 'text',
		'priority' => 7,
	) );
// Setting group for Youtube
	$wp_customize->add_setting( 'youtube_uid', array(
		'default'        => '',
		'sanitize_callback' => 'lavish_sanitize_url',
	) );

	$wp_customize->add_control( 'youtube_uid', array(
		'settings' => 'youtube_uid',
		'label'    => __( 'Youtube', 'lavish' ),
		'section'  => 'social_networking',
		'type'     => 'text',
		'priority' => 8,
	) );	
// Setting group for Vimeo
	$wp_customize->add_setting( 'vimeo_uid', array(
		'default'        => '',
		'sanitize_callback' => 'lavish_sanitize_url',
	) );

	$wp_customize->add_control( 'vimeo_uid', array(
		'settings' => 'vimeo_uid',
		'label'    => __( 'Vimeo', 'lavish' ),
		'section'  => 'social_networking',
		'type'     => 'text',
		'priority' => 9,
	) );
// Setting group for Instagram
	$wp_customize->add_setting( 'instagram_uid', array(
		'default'        => '',
		'sanitize_callback' => 'lavish_sanitize_url',
	) );

	$wp_customize->add_control( 'instagram_uid', array(
		'settings' => 'instagram_uid',
		'label'    => __( 'Instagram', 'lavish' ),
		'section'  => 'social_networking',
		'type'     => 'text',
		'priority' => 10,
	) );	
	
	
// Setting group for Reddit
	$wp_customize->add_setting( 'reddit_uid', array(
		'default'        => '',
		'sanitize_callback' => 'lavish_sanitize_url',
	) );

	$wp_customize->add_control( 'reddit_uid', array(
		'settings' => 'reddit_uid',
		'label'    => __( 'Reddit', 'lavish' ),
		'section'  => 'social_networking',
		'type'     => 'text',
		'priority' => 11,
	) );	
// Setting group for Picassa
	$wp_customize->add_setting( 'picassa_uid', array(
		'default'        => '',
		'sanitize_callback' => 'lavish_sanitize_url',
	) );

	$wp_customize->add_control( 'picassa_uid', array(
		'settings' => 'picassa_uid',
		'label'    => __( 'Picassa', 'lavish' ),
		'section'  => 'social_networking',
		'type'     => 'text',
		'priority' => 12,
	) );	
// Setting group for Stumbleupon
	$wp_customize->add_setting( 'stumbleupon_uid', array(
		'default'        => '',
		'sanitize_callback' => 'lavish_sanitize_url',
	) );

	$wp_customize->add_control( 'stumbleupon_uid', array(
		'settings' => 'stumbleupon_uid',
		'label'    => __( 'Stubmleupon', 'lavish' ),
		'section'  => 'social_networking',
		'type'     => 'text',
		'priority' => 13,
	) );	
// Setting group for WordPress
	$wp_customize->add_setting( 'wp_uid', array(
		'default'        => '',
		'sanitize_callback' => 'lavish_sanitize_url',
	) );

	$wp_customize->add_control( 'wp_uid', array(
		'settings' => 'wp_uid',
		'label'    => __( 'WordPress', 'lavish' ),
		'section'  => 'social_networking',
		'type'     => 'text',
		'priority' => 14,
	) );
// Setting group forgithub
	$wp_customize->add_setting( 'github_uid', array(
		'default'        => '',
		'sanitize_callback' => 'lavish_sanitize_url',
	) );

	$wp_customize->add_control( 'github_uid', array(
		'settings' => 'github_uid',
		'label'    => __( 'Github', 'lavish' ),
		'section'  => 'social_networking',
		'type'     => 'text',
		'priority' => 15,
	) );	
// Setting group dribbble
	$wp_customize->add_setting( 'dribbble_uid', array(
		'default'        => '',
		'sanitize_callback' => 'lavish_sanitize_url',
	) );

	$wp_customize->add_control( 'dribbble_uid', array(
		'settings' => 'dribbble_uid',
		'label'    => __( 'Dribbble', 'lavish' ),
		'section'  => 'social_networking',
		'type'     => 'text',
		'priority' => 16,
	) );	
				
// Setting group for rss
	$wp_customize->add_setting( 'rss_uid', array(
		'default'        => '',
		'sanitize_callback' => 'lavish_sanitize_url',
	) );

	$wp_customize->add_control( 'rss_uid', array(
		'settings' => 'rss_uid',
		'label'    => __( 'RSS', 'lavish' ),
		'section'  => 'social_networking',
		'type'     => 'text',
		'priority' => 17,
	) );
// Setting group for email
	$wp_customize->add_setting( 'email_uid', array(
		'default'        => '',
		'sanitize_callback' => 'lavish_sanitize_url',
	) );

	$wp_customize->add_control( 'email_uid', array(
		'settings' => 'email_uid',
		'label'    => __( 'Email', 'lavish' ),
		'section'  => 'social_networking',
		'type'     => 'text',
		'priority' => 18,
	) );	
        // Setting group for email
	$wp_customize->add_setting( 'cart_uid', array(
		'default'        => '',
		'sanitize_callback' => 'lavish_sanitize_url',
	) );

	$wp_customize->add_control( 'cart_uid', array(
		'settings' => 'cart_uid',
		'label'    => __( 'Cart Icon', 'lavish' ),
		'section'  => 'social_networking',
		'type'     => 'text',
		'priority' => 19,
	) );	

	$wp_customize->add_section( 'social_icons_colors', array(
		'title'          => __( 'Social Icon Colors', 'lavish' ),
		'priority'       => 5,
		'panel'			=> 'social_networking_panel',
	) );
    

     // Icon  Color for Top Bar Social Icons
    $wp_customize->add_setting( 'header_social_icons_color', array(
		'default'        => '',
		'sanitize_callback' => 'lavish_sanitize_hex_color',
	) );
	
	$wp_customize->add_control(  new WP_Customize_Color_Control( $wp_customize, 'header_social_icons_color', array(
		'label'   => __( 'Social Icon Color', 'lavish' ),
		'section' => 'social_icons_colors',
		'settings'   => 'header_social_icons_color',
		'priority' => 7,			
	) ) );

	//Icon Background Color For Top Bar Social Icons
	$wp_customize->add_setting( 'header_social_icons_bgcolor', array(
		'default'        => '',
		'sanitize_callback' => 'lavish_sanitize_hex_color',
	) );
	
	$wp_customize->add_control(  new WP_Customize_Color_Control( $wp_customize, 'header_social_icons_bgcolor', array(
		'label'   => __( 'Social Icon Background Color', 'lavish' ),
		'section' => 'social_icons_colors',
		'settings'   => 'header_social_icons_bgcolor',
		'priority' => 8,			
	) ) );

	//Icon Hover Color For Top Bar Social Icons
	$wp_customize->add_setting( 'header_social_icons_hovercolor', array(
		'default'        => '',
		'sanitize_callback' => 'lavish_sanitize_hex_color',
	) );
	
	$wp_customize->add_control(  new WP_Customize_Color_Control( $wp_customize, 'header_social_icons_hovercolor', array(
		'label'   => __( 'Social Icon Hover Color', 'lavish' ),
		'section' => 'social_icons_colors',
		'settings'   => 'header_social_icons_hovercolor',
		'priority' => 9,			
	) ) );

	//Icon Hover Background Color For Top Bar Social Icons
	$wp_customize->add_setting( 'header_social_icons_hoverbgcolor', array(
		'default'        => '',
		'sanitize_callback' => 'lavish_sanitize_hex_color',
	) );
	
	$wp_customize->add_control(  new WP_Customize_Color_Control( $wp_customize, 'header_social_icons_hoverbgcolor', array(
		'label'   => __( 'Social Icon Hover Background Color', 'lavish' ),
		'section' => 'social_icons_colors',
		'settings'   => 'header_social_icons_hoverbgcolor',
		'priority' => 10,			
	) ) );
    


/**
 * This is a custom section called Woocommerce Setting
 * which contains settings for Woocommerce Settings
 */
	$wp_customize->add_panel( 'woo_set', array(// Header Panel
	    'priority'       => 9,
	    'capability'     => 'edit_theme_options',
	    'title'          => __('WooCommerce Settings', 'lavish'),
	    'description'    => __('WooCommerce Settings For Your Site', 'lavish'),
	));
	

	$wp_customize->add_section( 'woocommerce_settings', array(
		'title'          => __( 'Woocommerce Settings', 'lavish' ),
		'priority'		 => 40,
		'panel' => 'woo_set',
	) );

	$wp_customize->add_setting( 'lavish_woocommerce_settings', array(
            'sanitize_callback' =>  'lavish_sanitize_text'
        ) );
	 $wp_customize->add_control( new lavish_note ( $wp_customize,'lavish_woocommerce_settings', array(
            'section'  => 'woocommerce_settings',
            'priority' => 1,
     ) ) );


	//settings for woocommerce layout
	$wp_customize->add_setting( 'woocommerce_layout', array(
		'default'        => 'full',
		'sanitize_callback' => 'lavish_sanitize_text',
	) );

	$wp_customize->add_control( 'woocommerce_layout', array(
		'label'   => __( 'Layout of Shop Page', 'lavish' ),
		'section' => 'woocommerce_settings',
		'settings'   => 'woocommerce_layout',
		'type'     => 'radio',
		'choices'	=> array(
			'full'	=> __('Full Width','lavish'),
			'left'	=> __('Left Sidebar','lavish'),
			'right'	=> __('Right Sidebar','lavish'),
			),
		'priority' => 1,			
	) );


	$wp_customize->add_setting( 'woocommerce_product_title', array(
		'default'        => '',
		'sanitize_callback' => 'lavish_sanitize_hex_color',
	) );

	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize,'woocommerce_product_title', array(
		'label'   => __( 'Product Title Color', 'lavish' ),
		'section' => 'woocommerce_settings',
		'settings'   => 'woocommerce_product_title',
		'priority' => 2,			
	) ) );


	




    }
/**
 * adds sanitization callback function : colors
 * @package lavish 
*/
	function lavish_sanitize_hex_color( $color ) {
	if ( $unhashed = sanitize_hex_color_no_hash( $color ) )
		return '#' . $unhashed;

	return $color;
}

/**
 * adds sanitization callback function : text
 * @package lavish 
*/
function lavish_sanitize_text( $input ) {
    return wp_kses_post( force_balance_tags( $input ) );
}

/**
 * adds sanitization callback function : url
 * @package lavish 
*/
	function lavish_sanitize_url( $value) {
		$value = esc_url( $value);
		return $value;
	}

/**
 * adds sanitization callback function : checkbox
 * @package lavish 
*/
function lavish_sanitize_checkbox( $input ) {
    if ( $input == 1 ) {
        return 1;
    } else {
        return '';
    }
}	



/**
 * adds sanitization callback function for the page width : radio
 * @package lavish 
*/
function lavish_sanitize_pagewidth( $input ) {
    $valid = array(
            'default' => __( 'Full Width', 'lavish' ),
            'boxedmedium' => __( 'Boxed Medium', 'lavish' ),
			'boxedsmall' => __( 'Boxed Small', 'lavish' ),
    );
 
    if ( array_key_exists( $input, $valid ) ) {
        return $input;
    } else {
        return '';
    }
}
/**
 * adds sanitization callback function for the featured image : radio
 * @package lavish 
*/
function lavish_sanitize_featured_image( $input ) {
    $valid = array(
		'big' => __( 'Wide Featured Image', 'lavish' ),
		'small' => __( 'Small Featured Image', 'lavish' ),
    );
 
    if ( array_key_exists( $input, $valid ) ) {
        return $input;
    } else {
        return '';
    }
}

/**
 * adds sanitization callback function for the excerpt : radio
 * @package lavish 
*/
function lavish_sanitize_excerpt( $input ) {
    $valid = array(
		'content' => __( 'Content', 'lavish' ),
        'excerpt' => __( 'Excerpt', 'lavish' ),
    );
 
    if ( array_key_exists( $input, $valid ) ) {
        return $input;
    } else {
        return '';
    }
}

/**
 * adds sanitization callback function for the layout : radio
 * @package lavish 
*/
function lavish_sanitize_blogstyle( $input ) {
    $valid = array(
		'blogright' => __( 'Blog with Right Sidebar', 'lavish' ),
    	'blogleft' => __( 'Blog with Left Sidebar', 'lavish' ),
        'blogleftright' => __( 'Blog with Left &amp; Right Sidebar', 'lavish' ),
        'blogwide' => __( 'Blog with Full Width &amp; no Sidebars', 'lavish' ),
        'manosaryleft' => __( 'Blog with Manosary with Left Sidebar', 'lavish' ),
        'manosaryright' => __( 'Blog with Manosary with Right Sidebar', 'lavish' ),
        'manosarywide' => __( 'Blog with Manosary Full Width', 'lavish' ),
        'boxedleft' => __( 'Blog with Boxed Left Sidebar', 'lavish' ),
        'boxedright' => __( 'Blog with Boxed Right Sidebar', 'lavish' ),
        'boxedwide' => __( 'Blog with Boxed Full Width', 'lavish' )
    );
 
    if ( array_key_exists( $input, $valid ) ) {
        return $input;
    } else {
        return '';
    }
}

/**
 * adds sanitization callback function for the logo style : radio
 * @package lavish 
*/
function lavish_sanitize_logo_style( $input ) {
    $valid = array(
            'default' => __( 'Default Logo', 'lavish' ),
            'custom' => __( 'Your Logo', 'lavish' ),
            'logotext' => __( 'Logo with Title and Tagline', 'lavish' ),
			'text' => __( 'Text Title', 'lavish' ),
    );
 
    if ( array_key_exists( $input, $valid ) ) {
        return $input;
    } else {
        return '';
    }
}


/**
 *  Registers
 */
function lavish_registers() {
    wp_register_script( 'lavish_customizer_script', get_template_directory_uri() . '/js/lavish-customizer.js', array("jquery"), '20120206', true  );
    wp_enqueue_script( 'lavish_customizer_script' );
    wp_localize_script( 'lavish_customizer_script', 'lavish_button', array(
        'pro'       => __( 'View Pro Version', 'lavish' ),
        'review'       => __( 'Rate Us', 'lavish' )
    ) );
}
add_action( 'customize_controls_enqueue_scripts', 'lavish_registers' );

/**
 * adds sanitization callback function for numeric data : number
 * @package lavish 
*/

function lavish_sanitize_number( $value ) {
    $value = (int) $value; // Force the value into integer type.
    return ( 0 < $value ) ? $value : null;
}


/**
 * adds sanitization callback function for uploading : uploader
 * @package lavish * Special thanks to: https://github.com/chrisakelley
 */
add_filter( 'lavish_sanitize_image', 'lavish_sanitize_upload' );
add_filter( 'lavish_sanitize_file', 'lavish_sanitize_upload' );
function lavish_sanitize_upload( $input ) {
        
        $output = '';
        
        $filetype = wp_check_filetype($input);
        
        if ( $filetype["ext"] ) {
        
                $output = $input;
        
        }
        
        return $output;

}



