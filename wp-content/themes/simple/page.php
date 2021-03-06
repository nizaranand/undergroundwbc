<?php get_header() ?>
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
		<?php the_content() ?>
		<?php wp_link_pages() ?>
	</div>
	<!-- ENDS page-content -->


<!-- CONTENT ABOVE -->
</div>
<?php endwhile; endif; ?>
<?php get_footer() ?>