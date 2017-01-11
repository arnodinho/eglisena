<?php
/**
 * The main template file.
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
 * Learn more: http://codex.wordpress.org/Template_Hierarchy
 *
 * @package lavish
 * @since 1.0.0
 */

get_header(); ?>

<?php get_sidebar( 'top' ); ?>
<section id="la-content-area" class="la-contents" role="main">
	<?php $blogstyle = esc_attr(get_theme_mod( 'blog_style', 'blogright' ));
		switch ($blogstyle) {
		// Right Column
		case "blogright" :
			echo '<div class="container"><div class="row"><div class="col-md-8 la-blog-content" role="main">';
			

			// get all the posts
				$count = 0;
				if ( have_posts() ) : while ( have_posts() ) : the_post();				
					// get the article layout
					$count++;
					get_template_part( 'content', get_post_format() );

					lavish_check_blog_style_clearing($count);					
				endwhile;
					// get the pagination
					lavish_paging_nav();
				else :
					// if no posts
					get_template_part( 'content', 'none' );					
				endif; 
			echo '</div><div class="col-md-4 right_sidebar"><aside id="la-right" role="complementary">';
				get_sidebar( 'right' );
			echo '</aside></div></div></div>';
		break;		
		
		
		// Left Column
		case "blogleft" :
			echo '<div class="container"><div class="row"><div class="col-md-4 left_sidebar"><aside id="la-left" role="complementary">';
				get_sidebar( 'left' );
			echo '</aside></div>';										
			echo '<div class="col-md-8 la-blog-content" role="main">';
				$count = 0;
				if ( have_posts() ) : while ( have_posts() ) : the_post();
					$count++;
					get_template_part( 'content', get_post_format() );
					lavish_check_blog_style_clearing($count);	
				endwhile;
					lavish_paging_nav();
				else :
					get_template_part( 'content', 'none' );
				endif;				
			echo '</div></div></div>';
		break;		
		
		
		// Left and Right Column
		case "blogleftright" :
			echo '<div class="container"><div class="row"><div class="col-md-3 left_sidebar"><aside id="la-left" role="complementary">';
				get_sidebar( 'left' );
			echo '</aside></div>';										
			echo '<div class="col-md-6 la-blog-content" role="main">';
				$count = 0;
				if ( have_posts() ) : while ( have_posts() ) : the_post();
					$count++;
					get_template_part( 'content', get_post_format() );
					lavish_check_blog_style_clearing($count);	
				endwhile;
					lavish_paging_nav();
				else :
					get_template_part( 'content', 'none' );
				endif;				
			echo '</div><div class="col-md-3 right_sidebar"><aside id="la-right" role="complementary">';
				get_sidebar( 'right' );
			echo '</aside></div></div></div>';	
		break;			
	
		
		// Wide Column
		case "blogwide" :
												
			echo '<div class="container"><div class="row la-content" role="main"><div class="col-md-12">';
				$count = 0;
				if ( have_posts() ) : while ( have_posts() ) : the_post();
					$count++;
					get_template_part( 'content', get_post_format() );
					lavish_check_blog_style_clearing($count);	
				endwhile;
					lavish_paging_nav();
				else :
					get_template_part( 'content', 'none' );
				endif;				
			
			echo '</div></div></div>';	
		break;
		//Manosary Blog Contents
		case "manosaryright" :
			echo '<div class="container"><div class="row"><div class="col-md-3 left_sidebar"><aside id="la-left" role="complementary">';
				get_sidebar( 'left' );
			echo '</aside></div>';										
			echo '<div class="col-md-6 la-blog-content" role="main">';
				$count = 0;
				if ( have_posts() ) : while ( have_posts() ) : the_post();
					$count++;
					get_template_part( 'content', get_post_format() );
					lavish_check_blog_style_clearing($count);	
				endwhile;
					lavish_paging_nav();
				else :
					get_template_part( 'content', 'none' );
				endif;				
			echo '</div><div class="col-md-3 right_sidebar"><aside id="la-right" role="complementary">';
				get_sidebar( 'right' );
			echo '</aside></div></div></div>';	
		break;		
		
		
		// Left Column
		case "manosaryleft" :
			echo '<div class="container"><div class="row"><div class="col-md-3 left_sidebar"><aside id="la-left" role="complementary">';
				get_sidebar( 'left' );
			echo '</aside></div>';										
			echo '<div class="col-md-6 la-blog-content" role="main">';
				$count = 0;
				if ( have_posts() ) : while ( have_posts() ) : the_post();
					$count++;
					get_template_part( 'content', get_post_format() );
					lavish_check_blog_style_clearing($count);	
				endwhile;
					lavish_paging_nav();
				else :
					get_template_part( 'content', 'none' );
				endif;				
			echo '</div><div class="col-md-3 right_sidebar"><aside id="la-right" role="complementary">';
				get_sidebar( 'right' );
			echo '</aside></div></div></div>';	
		break;		
		
		// Wide Column
		case "manosarywide" :
												
			echo '<div class="container"><div class="row"><div class="col-md-3 left_sidebar"><aside id="la-left" role="complementary">';
				get_sidebar( 'left' );
			echo '</aside></div>';										
			echo '<div class="col-md-6 la-blog-content" role="main">';
				$count = 0;
				if ( have_posts() ) : while ( have_posts() ) : the_post();
					$count++;
					get_template_part( 'content', get_post_format() );
					lavish_check_blog_style_clearing($count);	
				endwhile;
					lavish_paging_nav();
				else :
					get_template_part( 'content', 'none' );
				endif;				
			echo '</div><div class="col-md-3 right_sidebar"><aside id="la-right" role="complementary">';
				get_sidebar( 'right' );
			echo '</aside></div></div></div>';	
		break;

		//Boxed Blog Contents
		case "boxedright" :
			echo '<div class="container"><div class="row"><div class="col-md-3 left_sidebar"><aside id="la-left" role="complementary">';
				get_sidebar( 'left' );
			echo '</aside></div>';										
			echo '<div class="col-md-6 la-blog-content" role="main">';
				$count = 0;
				if ( have_posts() ) : while ( have_posts() ) : the_post();
					$count++;
					get_template_part( 'content', get_post_format() );
					lavish_check_blog_style_clearing($count);	
				endwhile;
					lavish_paging_nav();
				else :
					get_template_part( 'content', 'none' );
				endif;				
			echo '</div><div class="col-md-3 right_sidebar"><aside id="la-right" role="complementary">';
				get_sidebar( 'right' );
			echo '</aside></div></div></div>';	
		break;		
		
		
		// Left Column
		case "boxedleft" :
			echo '<div class="container"><div class="row"><div class="col-md-3 left_sidebar"><aside id="la-left" role="complementary">';
				get_sidebar( 'left' );
			echo '</aside></div>';										
			echo '<div class="col-md-6 la-blog-content" role="main">';
				$count = 0;
				if ( have_posts() ) : while ( have_posts() ) : the_post();
					$count++;
					get_template_part( 'content', get_post_format() );
					lavish_check_blog_style_clearing($count);	
				endwhile;
					lavish_paging_nav();
				else :
					get_template_part( 'content', 'none' );
				endif;				
			echo '</div><div class="col-md-3 right_sidebar"><aside id="la-right" role="complementary">';
				get_sidebar( 'right' );
			echo '</aside></div></div></div>';	
		break;		
		
		// Wide Column
		case "boxedwide" :
			echo '<div class="container"><div class="row"><div class="col-md-3 left_sidebar"><aside id="la-left" role="complementary">';
				get_sidebar( 'left' );
			echo '</aside></div>';										
			echo '<div class="col-md-6 la-blog-content" role="main">';
				$count = 0;
				if ( have_posts() ) : while ( have_posts() ) : the_post();
					$count++;
					get_template_part( 'content', get_post_format() );
					lavish_check_blog_style_clearing($count);	
				endwhile;
					lavish_paging_nav();
				else :
					get_template_part( 'content', 'none' );
				endif;				
			echo '</div><div class="col-md-3 right_sidebar"><aside id="la-right" role="complementary">';
				get_sidebar( 'right' );
			echo '</aside></div></div></div>';	
		break;		
			
		
	}
?>

</section>
<?php get_footer(); ?>