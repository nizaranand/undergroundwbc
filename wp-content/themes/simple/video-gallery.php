<?php
/*
Template name: Video gallery
*/
?>
<?php get_header() ?>
<?php $ncols = " four-cols" ?>
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
			
		
		<!-- main-wrapper -->
		<div class="wrapper">
			<?php the_content() ?>
			
			<!-- Thumbnails-->
			<ul id="portfolio-list" class="gallery <?php echo $ncols ?> green" >
				<?php 
				$video_cat_slug = get_post_meta(get_the_ID(), 'category', true);
				$videos_per_page = (get_option('simple_videos_per_page') == '' ) ? 1000 :  get_option('simple_videos_per_page');
				$order_by = (get_option('simple_videos_orderby') == '' ) ? 'date' :  get_option('simple_videos_orderby');
				$order = (get_option('simple_videos_order') == '' ) ? 'ASC' :  get_option('simple_videos_order');
					
				// get page since query_posts fails to retrive the current page
				$paged = (get_query_var('paged')) ? get_query_var('paged') : 1; 
				
				// video query
				query_posts("&post_type=video&category_video=$category_video&posts_per_page=$videos_per_page&orderby=$order_by&order=$order&paged=$paged");
		
				// List videos
				if( have_posts() ) : while ( have_posts() ) : the_post();  			
					global $post;
					// portfolio data
					$custom = get_post_custom($post->ID);
					$videoURL =  $custom["videoURL"][0];
					//Get the Thumbnail URL
					$src = wp_get_attachment_image_src( get_post_thumbnail_id($post->ID), array( 720,405 ), false, '' );
					$thumb_url =  $src[0];
				?>
				
					<li class="video-gallery">
						<a href="<?php echo $videoURL ?>" title="<?php the_excerpt() ?>" rel="prettyPhoto">
						<span></span>
						<!-- image -->
						<div class="video-thumb">
						<?php if(has_post_thumbnail()) : ?>
							<img src="<?php echo $thumb_url;  ?>" alt="<?php the_title() ?>"  />
						<?php else: ?>
							<img src="<?php bloginfo('template_url') ?>/img/na-video.gif" alt="Image not available"  />
						<?php endif; ?>
						</div>
						<!-- ENDS image -->
						</a>
						<em><?php the_title() ?></em>
					</li>
				<?php endwhile;  ?>
			</ul>
			<!-- ENDS Thumbnails -->
			
			
			<!-- video-pager -->
			<div class="pager">
				<p class="clear"></p>
				<ul class="video-pager">
					<li class="first-child"><?php previous_posts_link() ?></li>
					<li class="last-child"><?php  next_posts_link() ?></li>
				</ul>
			</div>
			<!-- ENDS video-pager -->
				
			<?php endif; wp_reset_query(); ?>
		</div>
		<!-- ENDS main-wrapper -->
		
	</div>
	<!-- ENDS page-content -->
		
<!-- CONTENT ABOVE -->
</div>
<?php get_footer() ?>


