<?php
/*
Template name: Staff
*/
?>
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
		
		
		
		<!-- staff -->
		<?php $members = get_option('members'); ?>
		<ul class="staff">
			<?php foreach($members as $k => $member): ?>
			<li>
				<img src="<?php echo $member['src'] ?>" alt="<?php echo $member['name'] ?>" />
				<div class="information">
					<div class="header">
						<div class="name"><?php echo $member['name'] ?></div>
						<div class="contact"><?php echo $member['profile'] ?></div>
					</div>
					<div><?php echo $member['info'] ?></div>
				</div>
			</li>
			<?php endforeach; ?>
		</ul>
		<!-- ENDS staff -->
						
						
						
	</div>
	<!-- ENDS page-content -->


<!-- CONTENT ABOVE -->
</div>
<?php endwhile; endif; ?>
<?php get_footer() ?>