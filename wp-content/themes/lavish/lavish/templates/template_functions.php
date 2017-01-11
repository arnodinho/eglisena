<?php
/*
=================================================
Move to Top Function
@Action: lr_move_to_top
=================================================
*/
/*
=================================================
Wrapper Chooser Function
@Action: lr_wrapper_choose
=================================================
*/
function lavish_wrapper_choose_fnc() {
	$pagewidth = get_theme_mod( 'page_width', 'default' );
		switch ($pagewidth) {
            case "default" :
                echo '<div id="la-wrapper" style="border-color:';
                echo get_theme_mod( 'topborder', '#000000' ) . ';">';
            	break;
            case "boxedmedium" :
                echo '<div id="la-wrapper-boxed-medium" style="border-color:';
                echo get_theme_mod( 'topborder', '#000000' ) . '; background-color:#fff;">';
        		break;
            case "boxedsmall" :
                echo '<div id="la-wrapper-boxed-small" style="border-color:';
                echo get_theme_mod( 'topborder', '#000000' ) . '; background-color:#fff;">';
        	break;
	}
}

/*
=================================================
Social Icons on Top of Header
=================================================
*/

/*
=================================================
Header Main Display Functions
=================================================
*/
function lavish_header_fnc() {
    ?>
    <div class="lavish_header header_two"><!--Header Starts Here-->
        <div class="lavish_head">
            <div class="container">
                <?php lavish_logo_output(); ?>
                <?php lavish_menu_output();?>
            </div>
        </div>
        <?php lavish_responsive_menu_output(); ?>
    </div>
    
    <?php
}
function lavish_logo_output() {
    ?>
    <div class="lavish_logo"><!--Logo Starts Here -->
        <?php get_template_part( 'partials/logo-group' ); ?>
    </div><!--End of Logo Here -->
    <?php
}


function lavish_menu_output() {
	?>
    <div class="lavish_menus">
        <div class="lavish_menu"><!--Primary Navigation Starts Here -->
            <?php wp_nav_menu( array( 'theme_location' => 'primary', 'container' => false, 'menu_class' => 'navmenu', 'fallback_cb' => false) ); ?>
        </div>
                    
        <a class="toggle_button_lavish_menu"></a>
    </div><!--End of Primary Navigation -->
         <?php
}


function lavish_responsive_menu_output() {
    ?>
    <div style="background-color:#fff">
        <?php wp_nav_menu( array( 'theme_location' => 'primary', 'container' => false, 'menu_class' => 'mobilemenu', 'fallback_cb' => false ) ); ?>
    </div>
    <?php
}
/**
 * Move the More Link outside the default content paragraph.
 * Easier to customize
 */

function lavish_new_more_link($link) {
        $link = '<p class="btn btn-sm">'.$link.'</p>';
        return $link;
    }
add_filter('the_content_more_link', 'lavish_new_more_link');    

function lavish_excerpt_fnc() {
    $excon = get_theme_mod( 'excerpt_content', 'content' );
            $excerpt = get_theme_mod( 'excerpt_limit', '50' );
                 switch ($excon) {
                    case "content" :
                        the_content(__('Continue Reading...', 'lavish'));
                        the_tags();
                    break;
                    case "excerpt" : 
                        echo '<p>' . lavish_excerpt($excerpt) . '</p>' ;
                        echo '<p class="more-link"><a class="'. lavish_choose_blog_button() .' blog_continue_more" href="' . get_permalink() . '">' . __('Continue Reading...', 'lavish') . '</a>' ;
                    break;
            }
}
/*
=================================================
Thumbnail Function 
=================================================
*/
function lavish_thumbnail_fnc() {
    $get_theme_mod_blog1 = get_theme_mod('blog_style');

    if (!($get_theme_mod_blog1 == 'manosaryleft') && !($get_theme_mod_blog1 == 'manosaryright') && !($get_theme_mod_blog1 == 'manosarywide')) {
        if (!($get_theme_mod_blog1 == 'boxedwide') && !($get_theme_mod_blog1 == 'boxedleft') && !($get_theme_mod_blog1 == 'boxedright')) {
            if ( has_post_thumbnail()) {
                $featuredimage = get_theme_mod( 'featured_image', 'big' );
                    switch ($featuredimage) {
                        case "big" :
                        echo '<div class="post-thumbnail">';
                            the_post_thumbnail('big');
                        echo '</div>';
                    break;
                        case "small" : 
                        echo '<div class="post-thumbnail alignleft">';
                            the_post_thumbnail('medium');
                        echo '</div>';
                    break;
                }       
            }
        }
        else {
            if ( has_post_thumbnail()) {
                $featuredimage = get_theme_mod( 'featured_image', 'big' );
                    switch ($featuredimage) {
                        case "big" :
                        echo '<div class="post-thumbnail">';
                            the_post_thumbnail('big');
                        echo '</div>';
                    break;
                        case "small" : 
                        echo '<div class="post-thumbnail alignleft boxedthumbnail">';
                            the_post_thumbnail('medium');
                        echo '</div>';
                    break;
                }       
            }
        }
    }
    else {
        if ( has_post_thumbnail()) {
            echo '<div class="manosary_thumbnail_image">';
            the_post_thumbnail('big');
            echo '</div>';
        }

    }
    
}
function lavish_blog_header_fnc() {
    
    $check_styling_of_blog_icons = get_theme_mod('blog_style');
    if (!($check_styling_of_blog_icons == 'manosaryleft') && !($check_styling_of_blog_icons == 'manosaryright') && !($check_styling_of_blog_icons == 'manosarywide') && !($check_styling_of_blog_icons == 'boxedright') && !($check_styling_of_blog_icons == 'boxedleft') && !($check_styling_of_blog_icons == 'boxedwide') ) {
    ?> 
    <header class="entry-header">
        <h2 class="entry-title">
            <a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>" rel="bookmark"><?php if(the_title( '', '', false ) !='') the_title(); else _e('Untitled', 'lavish'); ?> </a>
        </h2>
        <h5>
                <?php if ( 'post' == get_post_type() ) : ?>
                    <div class="entry-meta">
                        <?php if ( is_sticky() && is_home() && ! is_paged() ) : ?>
                            <span class="featured-post">
                                <?php _e( '<span class="lr_blog_entry_head_featured">Featured</span>', 'lavish' ); ?>
                            </span>
                        <?php endif; ?> 

                        <?php
                            $time_string = '<time class="entry-date published" datetime="%1$s">%2$s</time>';
                            if ( get_the_time( 'U' ) ) ;
                                $time_string = sprintf( $time_string,
                                esc_attr( get_the_date( 'c' ) ),
                                esc_html( get_the_date() )
                            );
                            printf( __( '<span class="posted-on"><span class="lr_blog_entry_head">Posted On:&nbsp;</span> %1$s</span><span class="byline"><span class="lr_blog_entry_head">By:&nbsp;</span>  %2$s</span>', 'lavish' ),
                                sprintf( '<a href="%1$s" rel="bookmark">%2$s</a>', esc_url( get_permalink() ), $time_string),
                                sprintf( '<span class="author vcard"><a class="url fn n" href="%1$s" rel="author"> %2$s</a></span>',
                                esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ),
                                esc_html( get_the_author() )
                                )
                            );
    
                            if ( ! post_password_required() && ( comments_open() || '0' != get_comments_number() ) ) : ?>
                                <span class="comments-link">
                                    <?php 
                                        echo '<span class="entry-comments">';
                                        _e( '<span class="lr_blog_entry_head">Comments:&nbsp;</span>', 'lavish' );
                                        comments_popup_link( __( 'Comment', 'lavish' ), __( '1 Comment', 'lavish' ), __( '% Comments', 'lavish' ) ); 
                                    endif; ?> 
                                </span>
                            
                            <?php if( get_theme_mod( 'hide_edit' ) == '') { ?>
                                <?php edit_post_link( __( 'Edit', 'lavish' ), '<span class="edit-link">', '</span>' ); ?>
                            <?php } ?> 
                    </div><!-- .entry-meta -->
                <?php endif; ?>
        </h5>
    </header><!-- .entry-header -->
    <?php 
    }
    else {
        ?> 
    <header class="entry-header">
        <h2 class="entry-title">
            <a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>" rel="bookmark"><?php if(the_title( '', '', false ) !='') the_title(); else _e('Untitled', 'lavish'); ?> </a>
        </h2>
        <h5>
                <?php if ( 'post' == get_post_type() ) : ?>
                    <div class="entry-meta">
                        <?php
                            $time_string = '<time class="entry-date published" datetime="%1$s">%2$s</time>';
                            if ( get_the_time( 'U' ) ) ;
                                $time_string = sprintf( $time_string,
                                esc_attr( get_the_date( 'c' ) ),
                                esc_html( get_the_date() )
                            );
                            printf( __( '<span class="posted-on"><span class="lr_blog_entry_head"><i class="fa fa-clock-o"></i>&nbsp;</span> %1$s</span><span class="byline"><span class="lr_blog_entry_head"><i class="fa fa-user"></i>&nbsp;</span>  %2$s</span>', 'lavish' ),
                                sprintf( '<a href="%1$s" rel="bookmark">%2$s</a>', esc_url( get_permalink() ), $time_string),
                                sprintf( '<span class="author vcard"><a class="url fn n" href="%1$s" rel="author"> %2$s</a></span>',
                                esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ),
                                esc_html( get_the_author() )
                                )
                            );
    
                            if ( ! post_password_required() && ( comments_open() || '0' != get_comments_number() ) ) : ?>
                                <span class="comments-link">
                                    <?php 
                                        echo '<span class="entry-comments">';
                                        _e( '<span class="lr_blog_entry_head"><i class="fa fa-comment"></i>&nbsp;</span>', 'lavish' );
                                        comments_popup_link( __( 'Comment', 'lavish' ), __( '1 Comment', 'lavish' ), __( '% Comments', 'lavish' ) ); 
                                    endif; ?> 
                                </span>
                            
                            <?php if( get_theme_mod( 'hide_edit' ) == '') { ?>
                                <?php edit_post_link( __( 'Edit', 'lavish' ), '<span class="edit-link">', '</span>' ); ?>
                            <?php } ?> 
                    </div><!-- .entry-meta -->
                <?php endif; ?>
        </h5>
    </header><!-- .entry-header -->
    <?php
    }
}
/*
=================================================
Add Extra Class to Control the Blog Layout
=================================================
*/

function lavish_post_class() {
    $additional_classes = get_theme_mod('blog_style','blogright');
    
    $to_add_class = '';
    switch ($additional_classes) {
        case "manosaryright":
        $to_add_class = 'col-md-6 manosary_item';
        break;
        case "manosaryleft": 
        $to_add_class = 'col-md-6 manosary_item';
        break;
        case "manosarywide":
        $to_add_class = 'col-md-4 manosary_item';
        break;
        case "boxedwide":
        $to_add_class = 'col-md-6';
        break;
        case "boxedright":
        $to_add_class = 'col-md-6';
        break;
        case "boxedleft":
        $to_add_class = 'col-md-6';
        break;
    }
    $post_class = array(
        $additional_classes,
        $to_add_class,
        );
    echo post_class($post_class);
    
}

/*
=================================================
Blog Clear Fixing 
=================================================
*/
function lavish_check_blog_style_clearing($count) {
    $check_blog_mode = get_theme_mod('blog_style','blogright');
    
    $add_class = '';
    switch ($check_blog_mode) {
        case "manosaryright":
        if ($count % 2 == 0) {
            $add_class = 'col-md-6 clearfix';
        }
        else {
            $add_class = 'col-md-6';
        }
        break;
        case "manosaryleft":
        if ($count % 2 == 0) {
            $add_class = 'col-md-6 clearfix';
        }
        else {
            $add_class = 'col-md-6';
        }
        break;
        case "manosarywide":
        if ($count % 3 == 0) {
            $add_class = '<div style="clear:both;"></div>';
        }
        else {
            $add_class = '';
        }
        break;
        case "boxedwide":
        if ($count % 2 == 0) {
            $add_class = '<div style="clear:both;"></div>';
        }
        else {
            $add_class = '';
        }
        break;
        case "boxedright":
        if ($count % 2 == 0) {
            $add_class = '<div style="clear:both;"></div>';
        }
        else {
            $add_class = '';
        }
        break;
        case "boxedleft":
        if ($count % 2 == 0) {
            $add_class = '<div style="clear:both;"></div>';
        }
        else {
            $add_class = '';
        }
        break;
    }
    echo $add_class;
}

/*
=================================================
Blog Seperator For Pages
=================================================
*/
function lavish_blog_seperator() {
    $check_blog_seperator = get_theme_mod('blog_style','blogright');
    if (!($check_blog_seperator == 'manosaryleft') && !($check_blog_seperator == 'manosaryright') && !($check_blog_seperator == 'manosarywide') && !($check_blog_seperator == 'boxedleft') && !($check_blog_seperator == 'boxedright') && !($check_blog_seperator == 'boxedwide')) {
        echo '<div class="blog_seperator"></div>';
    }
    else {
        
    }
}

?>