<?php 
/**
simple Template Page for the gallery overview 

Follow variables are useable :

	$gallery     : Contain all about the gallery
	$images      : Contain all images, path, title
	$pagination  : Contain the pagination content

 You can check the content when you insert the tag <?php var_dump($variable) ?>
 If you would like to show the timestamp of the image ,you can use <?php echo $exif['created_timestamp'] ?>
**/
?>

<?php if (!defined ('ABSPATH')) die ('No direct access allowed'); ?><?php if (!empty ($gallery)) : ?>

<!-- Thumbnails -->
<?php global $ncols ?>
<ul id="portfolio-list" class="gallery <?php echo $ncols ?> green" >
	<?php foreach ( $images as $image ) : ?>
	<li class="filter-<?php echo $image->alttext ?>">
		<a href="<?php echo $image->imageURL ?>" title="<?php echo $image->description ?>" <?php echo $image->thumbcode ?>>
		<span></span>
		<?php if ( !$image->hidden ) { ?>
		<img src="<?php echo $image->thumbnailURL ?>" alt="<?php echo $image->alttext ?>" title="<?php echo $image->alttext ?>" <?php echo $image->size ?>/>
		<?php }// if not hidden ?>
		</a>
		<em>
		<?php 
		//text display
		if(get_option('simple_gallerytext_display') != "checked"){
			echo $image->description;
		}
		?></em>
	</li>
 	<?php endforeach; ?>
</ul>
<!-- ENDS Thumbnails -->


<!-- Pagination -->
<?php simple_set_pagination_skin() ?>
<div class="holder">
	<?php echo $pagination ?>
</div>
<!-- ENDS Pagination -->

<?php endif; ?>