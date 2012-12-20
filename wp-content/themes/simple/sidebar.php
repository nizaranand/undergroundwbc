<ul id="sidebar">
	<!-- init sidebar -->
	<?php if( !function_exists('dynamic_sidebar') || !dynamic_sidebar() ): ?>
	<?php endif; ?>
	<!-- ENDS init sidebar -->
	<!-- recent posts -->
	<?php if(!get_option('simple_recentposts_display') == 'checked'){	?>	
	<li class="recent-posts">
		<h2><?php echo get_option('simple_recentposts_label') ?></h2>
		<ul>
			<?php
			global $post;
			$mPosts = (get_option('simple_recentposts_number') == '') ? 5 : get_option('simple_recentposts_number');
			$myposts = get_posts('numberposts='.$mPosts);
			foreach($myposts as $post) :
			  setup_postdata($post);
			?>
				<li class="sidemenu-item">
					<?php if(has_post_thumbnail()) : ?>
					<?php the_post_thumbnail(array(48, 48)) ?>
					<?php else : ?>
					<a href="<?php the_permalink(); ?>"><img src="<?php bloginfo('template_url') ?>/img/na-48-thumb.gif" alt="<?php the_title(); ?>" /></a>
			   		<?php endif; ?>
					<div class="recent-excerpt">
						<div><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></div>
						<div><?php $my_excerpt = get_the_excerpt(); echo substr($my_excerpt, 0, 60) . "...";	?></div>
					</div>		   					   		
				</li>
			<?php endforeach; ?>		
		</ul>
	</li>
	<?php } // if visibility on recent comments ?>
	<!-- ENDS recent posts -->
</ul>