<?php
/*
Template name: Gallery 4 Columns
*/
?>
<?php get_header() ?>
<?php $ncols = " four-cols" ?>
<?php if( have_posts() ) : while ( have_posts() ) : the_post(); ?>
<div class="content">
<!-- CONTENT BELOW -->
	
	<!-- title -->
	<div class="title-holder">
		<span class="title"><?php the_title() ?></span>
		<span class="subtitle"><?php echo get_post_meta(get_the_ID(), 'subtitle', true) ?></span>
	</div>
	<!-- ENDS title -->
	
	<!-- page-content -->
	<div class="page-content">
	
		<!-- filter -->
		<?php 
		// filter visibility
		if(get_option('simple_filter_display') != 'checked'){
		?>
		<ul id="portfolio-filter">
	    	<li>FILTER: </li>
	    	<li><a href="#all" class="link-button"><span>ALL</span></a></li>
	    	<?php
			 // for each filter set a link
			 $filters = get_post_meta(get_the_ID(), 'filter', false); 
			 foreach($filters as $filter){
			 	echo '<li><a href="#filter-'.$filter.'" class="link-button"><span>'.strtoupper($filter).'</span></a></li>';
			 }
			 ?>
		</ul>
		<?php } //if ?>
		<!-- filter -->
		
		
		<!-- main-wrapper -->
		<div class="wrapper">
			<?php the_content() ?>			
		</div>
		<!-- ENDS main-wrapper -->
		
	</div>
	<!-- ENDS page-content -->
		
<!-- CONTENT ABOVE -->
</div>
<?php endwhile; endif; ?>
<?php get_footer() ?>


