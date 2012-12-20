<?php 
/**
simple mini gallery Template Page for the gallery overview 

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
<ul class="mini-gallery" >
	<?php foreach ( $images as $image ) : ?>	
	<li>
		<a href="<?php echo $image->imageURL ?>" title="<?php echo $image->description ?>" rel="prettyPhoto[mini]">
		<?php if ( !$image->hidden ) { ?>
		<img src="<?php echo $image->thumbnailURL ?>" alt="<?php echo $image->alttext ?>" title="<?php echo $image->alttext ?>" <?php echo $image->size ?>/>
		<?php }// if not hidden ?>
		</a>
	</li>

 	<?php endforeach; ?>
</ul>
<!-- ENDS Thumbnails -->


<?php endif; ?>