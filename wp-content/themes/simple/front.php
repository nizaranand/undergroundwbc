<?php
/*
Template name: Front 
*/
?>
<?php get_header() ?>
<div class="home-content">
	<!-- slideshow -->
	<?php simple_slider() ?>
	<!-- headline -->
	<div class="headline"><?php echo get_option('simple_headline') ?></div>
	<!-- ENDS headline -->
	<div class="shadow-divider"></div>
	<!-- front posts -->
	<?php simple_left_front_blocks() ?>
	<?php simple_right_front_blocks() ?>
</div>
<?php get_footer() ?>
