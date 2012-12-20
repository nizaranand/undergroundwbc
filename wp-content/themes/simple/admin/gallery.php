<?php
// update the DB
if($_POST['update_themeoptions'] == true){
		
	// image gallery
	$display = ($_POST['display_filter'] == 'on') ? 'checked' : '';
	update_option('simple_filter_display', $display);
	//
	$display = ($_POST['simple_gallerytext_display'] == 'on') ? 'checked' : '';
	update_option('simple_gallerytext_display', $display);
	
	// videos
	update_option('simple_videos_orderby', $_POST['simple_videos_orderby']);
	update_option('simple_videos_order', $_POST['simple_videos_order']);
	update_option('simple_videos_per_page', $_POST['simple_videos_per_page']);			
	
	// success message
	echo "<div id='setting-error-settings_updated' class='updated settings-error'> 
<p><strong>Settings saved.</strong></p></div> ";
}
?>

<script type="text/javascript" src="<?php bloginfo('template_url') ?>/js/jscolor2/jscolor.js"></script>

<div class="wrap">
		<div id="icon-themes" class="icon32">
			<br/>
		</div>
		<h2>Simple Gallery Settings</h2>
		
		<?php
		if(!is_plugin_active('nextgen-gallery/nggallery.php')) {
			echo "<div id='setting-error-settings_updated' class='updated settings-error'> 
<p><strong>You dont have your nextGen Plug in activated. <a href='http://alexrabe.de/wordpress-plugins/nextgen-gallery/'>Visit Plugin Page</a></strong></p></div> ";
		}
		?>
		
		
		<div class="header-description">Options for your image and video galleries.</div>
		
		<form method="POST" action="" id="manager_form" >
		
		<table class="form-table ansimuz-table">
		
			<tr valign="top">
				<th scope="row">Image gallery options</th>
				<td>
				
					<p><input type="checkbox" name="display_filter" id="display_filter" <?php echo get_option('simple_filter_display') ?> /> Hide filter bar in the galleries bar</p>
			
					<p><input type="checkbox" name="simple_gallerytext_display" id="simple_gallerytext_display" <?php echo get_option('simple_gallerytext_display') ?> /> Hide caption text at the bottom of the gallery thumbnails</p>
					
					<p class="description">More gallery options at the <a href="<?php TEMPLATEPATH ?>/wp-admin/admin.php?page=nextgen-gallery">nextgen-gallery options</a></p>
			
				</td>
			</tr>
			
			<tr valign="top">
				<th scope="row">Video gallery options</th>
				<td>
					<p>
					<span class="description">Sort items by </span>
					<select name="simple_videos_orderby">
						<option value="" <?php if(get_option('simple_videos_orderby')=='') echo 'selected' ?>>Date</option>
						<option value="title" <?php if(get_option('simple_videos_orderby')=='title') echo 'selected' ?>>Title</option>
						<option value="id" <?php if(get_option('simple_videos_orderby')=='id') echo 'selected' ?>>ID</option>
						<option value="author" <?php if(get_option('simple_videos_orderby')=='author') echo 'selected' ?>>Author</option>
						<option value="modified" <?php if(get_option('simple_videos_orderby')=='modified') echo 'selected' ?>>Modified</option>
						<option value="menu_order" <?php if(get_option('simple_videos_orderby')=='menu_order') echo 'selected' ?>>Menu order</option>
					</select>
					
					Ascending <input type="radio" name="simple_videos_order" value="ASC" checked="checked" />
					Descending <input type="radio" name="simple_videos_order" value="DESC" <?php if(get_option('simple_videos_order') == 'DESC') echo ' checked="checked" '; ?> />
					</p>
					
					<p> <input type="text" name="simple_videos_per_page" id="simple_videos_per_page" size="3" value="<?php echo get_option('simple_videos_per_page') ?>" /><span class="description"> Items displayed by page</span></p>
			
				</td>
			</tr>
			
		</table>
	
			
			<p><input type="submit" name="search" value="Update Options" class="button-primary" /></p>
			<input type="hidden" name="update_themeoptions" value="true" />
			
		</form>
	</div>