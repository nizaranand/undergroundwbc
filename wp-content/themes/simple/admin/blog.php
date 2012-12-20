<?php
// update the DB
if($_POST['update_themeoptions'] == true){

	// display
	$display = ($_POST['simple_comments_display'] == 'on') ? 'checked' : '';
	update_option('simple_comments_display', $display);
	
	$display = ($_POST['simple_featureimage_display'] == 'on') ? 'checked' : '';
	update_option('simple_featureimage_display', $display);
	
	$display = ($_POST['simple_meta_display'] == 'on') ? 'checked' : '';
	update_option('simple_meta_display', $display);
	
	$display = ($_POST['simple_metadate_display'] == 'on') ? 'checked' : '';
	update_option('simple_metadate_display', $display);
	
	// recent posts
	$display = ($_POST['simple_recentposts_display'] == 'on') ? 'checked' : '';
	update_option('simple_recentposts_display', $display);
	update_option('simple_recentposts_label', stripslashes($_POST['simple_recentposts_label']));
	update_option('simple_recentposts_number', stripslashes($_POST['simple_recentposts_number']));

	
	
	// success message
	echo "<div id='setting-error-settings_updated' class='updated settings-error'> 
<p><strong>Settings saved.</strong></p></div> ";
}
?>


<script type="text/javascript" src="<?php bloginfo('template_url') ?>/js/jscolor/jscolor.js"></script>

<div class="wrap">
		<div id="icon-themes" class="icon32">
			<br/>
		</div>
		<h2>Simple - Blog Settings</h2>
		
		
		
		<div class="header-description">General settings for blog</div>
		
		<form method="POST" action="" id="manager_form" >
		
		<table class="form-table ansimuz-table">
		
			<tr valign="top">
				<th scope="row">Metadata</th>
				<td>
					<p><input type="checkbox" name="simple_meta_display" id="simple_meta_display" <?php echo get_option('simple_meta_display') ?> /> Hide meta in blog posts </p>
			
					<p><input type="checkbox" name="simple_metadate_display" id="simple_metadate_display" <?php echo get_option('simple_metadate_display') ?> /> Hide meta date in posts</p>
				</td>
			</tr>
			
			<tr valign="top">
				<th scope="row">Post options</th>
				<td>
					<p><input type="checkbox" name="simple_comments_display" id="simple_comments_display" <?php echo get_option('simple_comments_display') ?> /> Hide comments at the bottom of the posts </p>
					
					<p><input type="checkbox" name="simple_featureimage_display" id="simple_featureimage_display" <?php echo get_option('simple_featureimage_display') ?> /> Hide feature image in post list</p>
				</td>
			</tr>
			
		
			<tr valign="top">
				<th scope="row">Sidebar recent posts</th>
				<td>
					<p>Recent posts Label <input type="text" name="simple_recentposts_label" id="simple_recentposts_label" size="60" value="<?php echo get_option('simple_recentposts_label') ?>" /><br/><span class="description">Text displayed on top of the sidebar recent posts tab</span></p>
					
					<p><input type="checkbox" name="simple_recentposts_display" id="simple_recentposts_display" <?php echo get_option('simple_recentposts_display') ?> /> Hide recent posts from sidebar</p>
					
					<p>Number of posts 
					<input type="text" name="simple_recentposts_number" id="simple_recentposts_number" size="10" value="<?php echo get_option('simple_recentposts_number') ?>" /><span class="description">How many posts to display. Default is 5</span></p>
				</td>
			</tr>
			
		</table>
					
			
			<p><input type="submit" name="search" value="Update Options" class="button-primary" /></p>
			<input type="hidden" name="update_themeoptions" value="true" />
			
		</form>
	</div>