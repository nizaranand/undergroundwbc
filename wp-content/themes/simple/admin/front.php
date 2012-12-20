<?php
// update the DB
if($_POST['update_themeoptions'] == true){

	// headline and subheadline
	update_option('simple_headline', stripslashes($_POST['simple_headline']) );
	
	// left front block posts
	update_option('simple_left_blocks_header', stripslashes($_POST['simple_left_blocks_header']) );
	update_option('simple_left_blocks_subheader', stripslashes($_POST['simple_left_blocks_subheader']) );
	update_option('simple_left_blocks_link_label', stripslashes($_POST['simple_left_blocks_link_label']));
	update_option('simple_left_blocks_link', $_POST['simple_left_blocks_link']);
	update_option('simple_left_nposts', $_POST['simple_left_nposts']);
	update_option('simple_front_left_type', $_POST['simple_front_left_type']);
	update_option('simple_left_include_posts', $_POST['simple_left_include_posts']);
	update_option('simple_front_left_category', $_POST['simple_front_left_category']);
	
	
	// right front block posts
	update_option('simple_right_blocks_header', stripslashes($_POST['simple_right_blocks_header']) );
	update_option('simple_right_blocks_subheader', stripslashes($_POST['simple_right_blocks_subheader']) );
	update_option('simple_right_nposts', $_POST['simple_right_nposts']);
	update_option('simple_front_right_type', $_POST['simple_front_right_type']);
	update_option('simple_right_include_posts', $_POST['simple_right_include_posts']);
	update_option('simple_right_thumb_size', $_POST['simple_right_thumb_size']);
	update_option('simple_right_thumb_size_custom', $_POST['simple_right_thumb_size_custom']);
	update_option('simple_front_right_category', $_POST['simple_front_right_category']);
	
	// thumbnail size
	update_option('simple_thumb_size', $_POST['simple_thumb_size']);
	update_option('simple_thumb_size_custom', $_POST['simple_thumb_size_custom']);
	
	
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
		<h2>Simple Front Page Options</h2>
		
		
		<div class="header-description">Change the look and organization of the contents of your home page.</div>
		
		<form method="POST" action="" id="manager_form" >
		
		<table class="form-table ansimuz-table">
			
			<tr valign="top">
				<th scope="row">Headline</th>
				<td>
					<p><textarea  name="simple_headline" id="simple_headline" cols="60" rows="3" ><?php echo stripslashes(get_option('simple_headline')) ?></textarea><br/><span class="description">Text displayed on top of front page</span></p>
				</td>
			</tr>
			
			<tr valign="top">
				<th scope="row">Left column headline</th>
				<td>
					<p>Header <textarea  name="simple_left_blocks_header" id="simple_left_blocks_header" cols="60" rows="2" ><?php echo stripslashes(get_option('simple_left_blocks_header')) ?></textarea><br/><span class="description">Title displayed on the left column.</span></p>
					
			<p>Subheader<textarea  name="simple_left_blocks_subheader" id="simple_left_blocks_subheader" cols="60" rows="2" ><?php echo stripslashes(get_option('simple_left_blocks_subheader')) ?></textarea><br/><span class="description">Subtitle displayed on the left column.</span></p>

				</td>
			</tr>
			
			<tr valign="top">
				<th scope="row">Right column headline</th>
				<td>
					<p>Header <textarea  name="simple_right_blocks_header" id="simple_right_blocks_header" cols="60" rows="2" ><?php echo stripslashes(get_option('simple_right_blocks_header')) ?></textarea><br/><span class="description">Title displayed on the right column.</span></p>
					<p>Subheader<textarea  name="simple_right_blocks_subheader" id="simple_right_blocks_subheader" cols="60" rows="2" ><?php echo stripslashes(get_option('simple_right_blocks_subheader')) ?></textarea><br/><span class="description">Subtitle displayed on the right column.</span></p>
					
				</td>
			</tr>
			
			
			<tr valign="top">
				<th scope="row">Left column post/pages</th>
				<td>
				
					<p>Number of front page posts/pages <input type="text" name="simple_left_nposts" id="simple_left_nposts" size="3" value="<?php echo get_option('simple_left_nposts') ?>" /><br/><span class="description">Set a number of posts to be displayed at the left column</span></p>
					
					<p>Type 
					<select name="simple_front_left_type">
						<option value="post" <?php if(get_option('simple_front_left_type')=='post') echo 'selected' ?>>Post</option>
						<option value="page" <?php if(get_option('simple_front_left_type')=='page') echo 'selected' ?>>Page</option>
					</select>
					<span class="description">List pages or posts on the left column </span>
					</p>
					
					<!-- List all categoris from the posts -->
					<p>
					Post category
					<?php $categories = get_categories(); ?>
					<select name="simple_front_left_category">
						<option value="" selected="selected">- Any category -</option>
						<?php foreach($categories as $category): ?>
					 	<option value="<?php echo $category->slug; ?>" <?php if($category->slug == get_option('simple_front_left_category') ) echo 'selected="selected"' ?> > <?php echo $category->name; ?></option>
					 	<?php endforeach; ?>
					</select>
					<span class="description"> Filter by category. Only for post types.</span>
					</p>
					<!-- ENDS List all categoris from the posts -->
					
					<p>Filter posts/pages <input type="text" name="simple_left_include_posts" id="simple_left_include_posts" size="60" value="<?php echo get_option('simple_left_include_posts') ?>" /><br/><span class="description"> Display only these posts/pages. You must enter the ID's of the pages/posts you want to display at the front page. You can view the id of the posts/pages at the URL bar of the browser when editing the post/page.</span></p>
				</td>
			</tr>
			
			<tr valign="top">
				<th scope="row">right column post/pages</th>
				<td>
				
					<p>Number of front page posts/pages <input type="text" name="simple_right_nposts" id="simple_right_nposts" size="3" value="<?php echo get_option('simple_right_nposts') ?>" /><br/><span class="description">Set a number of posts to be displayed at the right column</span></p>
					
					<p>Type 
					<select name="simple_front_right_type">
						<option value="post" <?php if(get_option('simple_front_right_type')=='post') echo 'selected' ?>>Post</option>
						<option value="page" <?php if(get_option('simple_front_right_type')=='page') echo 'selected' ?>>Page</option>
					</select>
					<span class="description">List pages or posts on the right column </span>
					</p>
					
					<!-- List all categoris from the posts -->
					<p>
					Post category
					<?php $categories = get_categories(); ?>
					<select name="simple_front_right_category">
						<option value="" selected="selected">- Any category -</option>
						<?php foreach($categories as $category): ?>
					 	<option value="<?php echo $category->slug; ?>" <?php if($category->slug == get_option('simple_front_right_category') ) echo 'selected="selected"' ?> > <?php echo $category->name; ?></option>
					 	<?php endforeach; ?>
					</select>
					<span class="description"> Filter by category. Only for post types.</span>
					</p>
					<!-- ENDS List all categoris from the posts -->
					
					<p>Filter posts/pages <input type="text" name="simple_right_include_posts" id="simple_right_include_posts" size="60" value="<?php echo get_option('simple_right_include_posts') ?>" /><br/><span class="description"> Display only these posts/pages. You must enter the ID's of the pages/posts you want to display at the front page. You can view the id of the posts/pages at the URL bar of the browser when editing the post/page.</span></p>
				</td>
			</tr>
			
			<tr valign="top">
				<th scope="row">Left column permalink</th>
				<td>
					
					<p>Label <input type="text" name="simple_left_blocks_link_label" id="simple_left_blocks_link_label" size="60" value="<?php echo get_option('simple_left_blocks_link_label') ?>" /><br/><span class="description"> Default value is "MORE".</span></p>
					
					<p>Link <input type="text" name="simple_left_blocks_link" id="simple_left_blocks_link" size="60" value="<?php echo get_option('simple_left_blocks_link') ?>" /><br/><span class="description"> Where to go when link is clicked.</span></p>
				</td>
			</tr>
			
			<tr valign="top">
				<th scope="row">Thumbnail images</th>
				<td>
					<p>Thumbnail size
					<select name="simple_right_thumb_size">
						<option value="" <?php if(get_option('simple_right_thumb_size')=='') echo 'selected' ?>>default</option>
						<option value="thumbnail" <?php if(get_option('simple_right_thumb_size')=='thumbnail') echo 'selected' ?>>thumbnail</option>
						<option value="medium" <?php if(get_option('simple_right_thumb_size')=='medium') echo 'selected' ?>>medium</option>
						<option value="large" <?php if(get_option('simple_right_thumb_size')=='large') echo 'selected' ?>>large</option>
						<option value="custom" <?php if(get_option('simple_right_thumb_size')=='custom') echo 'selected' ?>>custom</option>
					</select>
					<span class="description">Choose the size for the front page thumbnails</span>
					</p>
					
					<p>Custom size  <input type="text" name="simple_right_thumb_size_custom" id="simple_right_thumb_size_custom" size="5" value="<?php echo get_option('simple_right_thumb_size_custom') ?>" /><span class="description"> If thumbnail size set to custom set the width for the thumbnail</span></p>
				</td>
			</tr>
			
		</table>
				

			
			<p><input type="submit" name="search" value="Update Options" class="button-primary" /></p>
			<input type="hidden" name="update_themeoptions" value="true" />	
			
		</form>
	</div>