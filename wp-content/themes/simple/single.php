<?php get_header() ?>
<div class="content-blog">
<!-- CONTENT BELOW -->
		<!-- POSTS -->
		<div id="posts">
			<?php if( have_posts() ) : while ( have_posts() ) : the_post(); ?>
			<!-- post -->
			<div class="post">
				<!-- post-header -->
				<div class="post-header single">
					<div class="post-title"><a href="<?php the_permalink() ?>" ><?php the_title() ?></a></div>
					<div class="post-meta <?php if(get_option('simple_meta_display') == 'checked') echo 'inv' ?>">
						POSTED BY <?php echo get_the_author_link() ?> IN <?php the_category(', ') ?>
					</div>
				</div>
				<!-- ENDS post-header -->
				<div><?php the_content() ?></div>
				
				<!-- comments -->
				<?php 
					if(get_option('simple_comments_display') != 'checked')
						comments_template('', true);
				?>	
				<!-- ENDS comments -->
		
		
			</div>
			<!-- ENDS post -->
			
			<?php endwhile; else:  ?>
			<!-- oops -->
			<div class="woops">	
				<h2>Woops...</h2>  
				<p>Sorry, no posts we're found.</p> 
			</div>	
			<?php endif; ?>
			<!-- ENDS oops -->
			
		</div>	
		<!-- ENDS POSTS -->

		<!-- sidebar -->
		<?php get_sidebar() ?>
		<!-- ENDS sidebar -->


<!-- CONTENT ABOVE -->
</div>
<?php get_footer() ?>