<?php
/*
Template Name: Archives
*/
?>
<?php get_header() ?>
<div class="content">
<!-- CONTENT BELOW -->


	<!-- title -->
	<div class="title-holder">
		<span class="title">ARCHIVES</span>
		<span class="subtitle"><?php echo get_post_meta(get_the_ID(), 'subtitle', true) ?></span>
	</div>
	<!-- ENDS title -->
	
	<!-- page-content -->
	<div class="page-content">
		<?php the_post(); ?>

		<div><?php the_content() ?></div>
		
		
		
		
		
		<!-- Left col-->
		<?php if(get_option('simple_archives_col1_display') != 'checked' ): ?>
		<div class="one-half">
			<h2>
			<?php
			if(get_option('simple_archives_col1_label')  == ''):
				echo 'Archives by subject';
			else:
				echo get_option('simple_archives_col1_label');				
			endif;
			 ?>
			 </h2>
			<ul>
				<?php
				switch(get_option('simple_archives_col1_type')):
					case 'daily': wp_get_archives('type=daily'); break;
					case 'monthly': wp_get_archives('type=monthly'); break;
					case 'weekly': wp_get_archives('type=weekly'); break;
					case 'yearly': wp_get_archives('type=yearly'); break;
					default:  wp_list_categories(); break;
				endswitch;
				?>
			</ul>
		</div>
		<?php endif ?>
		<!-- ENDS Left col-->
		
		
		
		
		<!-- Right col-->
		<?php if(get_option('simple_archives_col2_display') != 'checked' ): ?>
		<div class="one-half">
			<h2>
			<?php
			if(get_option('simple_archives_col2_label')  == '' ):
				echo 'Archives by subject';
			else:
				echo get_option('simple_archives_col2_label');				
			endif;
			 ?>
			 </h2>
			<ul>
				<?php
				switch(get_option('simple_archives_col2_type')):
					case 'daily': wp_get_archives('type=daily'); break;
					case 'monthly': wp_get_archives('type=monthly'); break;
					case 'weekly': wp_get_archives('type=weekly'); break;
					case 'yearly': wp_get_archives('type=yearly'); break;
					default:  wp_list_categories(); break;
				endswitch;
				?>
			</ul>
		</div>
		<?php endif ?>
		<!-- ENDS Right col-->

		
		
		
		

	</div>
	<!-- ENDS page-content -->


<!-- CONTENT ABOVE -->
</div>
<?php get_footer() ?>
