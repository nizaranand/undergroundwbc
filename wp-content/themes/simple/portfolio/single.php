<?php get_header() ?>
<?php if( have_posts() ) : while ( have_posts() ) : the_post(); ?>
<?php
$custom = get_post_custom($post->ID);
$bigImg =  $custom["bigImg"][0];
$client =  $custom["client"][0];
$date =  $custom["date"][0];
$link =  $custom["link"][0];
$gallery =  $custom["gallery"][0];
?>
<div class="content">
<!-- CONTENT BELOW -->

			
	<!-- title -->
	<div class="title-holder">
		<span class="title"><?php echo get_option('simple_portfolio_title') ?></span>
		<span class="subtitle"><?php echo nl2br(get_option('simple_portfolio_subtitle')) ?></span>
		<a href="<?php bloginfo('url') ?>/portfolios" class="link-button"><span><?php echo get_option('simple_portfolio_back_label') ?></span></a>
	</div>
	<!-- ENDS title -->
	
	<!-- page-content -->
	<div class="page-content">
			
		<?php if( $bigImg != ""): ?>
		<img src="<?php echo $bigImg ?>" alt="Portfolio" class="portfolio-image"/>
		<?php endif; ?>
				
		<!-- holder -->
		<div class="holder">
			<!-- portfolio-gallery -->
			<?php if( $gallery != ""): ?>
			<div class="mini-gallery-holder"><?php echo do_shortcode('[nggallery id='.$gallery.' template=mini]'); ?></div>
			<?php endif; ?>
			<!-- ENDS portfolio-gallery -->
			<!-- portfolio-content -->
			<div class="portfolio-content">
				<div class="name custom"><?php the_title() ?></div>
				<div class="sub-name custom"><?php echo  get_option('simple_portfolio_client_label')." " . $client ?></div>
				<div class="sub-name custom"><?php echo get_option('simple_portfolio_date_label')." " . $date ?></div>
				<div><?php the_content() ?><?php wp_link_pages() ?></div>
				
				<?php if( $link != ""): ?>
				<a href="<?php echo $link ?>" class="link-button"><span><?php echo get_option('simple_portfolio_link_label') ?></span></a>
				<?php endif; ?>
				
			</div>
			<!-- ENDS portfolio-content -->
		</div>
		<!-- ENDS holder -->
		<!-- related-projects -->
		<?php if(get_option('simple_portfolio_related_display') != 'checked'): ?>
		<div class="related-projects">
			<h1><?php echo get_option('simple_related_label') ?></h1>
			<ul class="related-projects-list">
				<?php
				// get the first category and use it for the related custom post
				$terms = get_the_terms($post->ID, 'category_portfolio');
				$slugs_array = array();
				foreach($terms as $term):
					array_push($slugs_array, $term->slug); 
				endforeach;
				$related_n = (get_option('simple_related_number') == "") ? 6 : get_option('simple_related_number');
				$args = array(
					'post_type' => 'portfolio',
					'numberposts' => $related_n,
					'category_portfolio' => $slugs_array[0],
					'orderby' => 'post_date',
					'order' => 'DESC'
					); 
				$myposts = get_posts($args);
				foreach($myposts as $post) :
					setup_postdata($post);
					//Get the Thumbnail URL
					$src = wp_get_attachment_image_src( get_post_thumbnail_id($post->ID), array( 100,100 ), false, '' );
					$thumb_url =  $src[0];
					// custom
					$custom = get_post_custom($post->ID);
					$link =  $custom['link'][0];
					$clave =  $custom['clave'][0];
				?>
				<li>
					<!-- related thumbnail -->
					<div class="clip-related">
						<?php 
						if(has_post_thumbnail()) : 
				   			// select the size
				   			switch($thumb_size){
				   				case 'thumbnail': the_post_thumbnail('thumbnail'); break;
				   				case 'medium': the_post_thumbnail('medium'); break;
				   				case 'large': the_post_thumbnail('large');  break;
				   				case 'custom': the_post_thumbnail(array(get_option('simple_right_thumb_size_custom'), get_option('simple_thumb_size_custom'))); break;
				   				default: the_post_thumbnail(array(300,300)); break;
				   			}
			   			else : ?>
			   				<a href="<?php the_permalink(); ?>"><img src="<?php echo $imgPath ?>na-block.gif" alt="<?php the_title() ?>" title="<?php the_title() ?>"/></a>
			   			<?php endif; ?>
		   			</div>
		   			<!-- related thumbnail -->
					<div><?php the_title() ?></div>
				</li>
				<?php endforeach; ?>
			</ul>
		</div>
		<?php endif; ?>
		<!-- ENDS related-projects -->							
	
	</div>
	<!-- ENDS page-content -->	
					
						
<!-- CONTENT ABOVE -->
</div>
<?php endwhile; endif; ?>
<?php get_footer() ?>