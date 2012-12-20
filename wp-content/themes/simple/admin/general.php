<?php
// update the DB
if($_POST['update_themeoptions'] == true){

	//search
	update_option('simple_search_display', $_POST['simple_search_display']);
	update_option('simple_footer', $_POST['simple_footer']);
	update_option('simple_404', stripslashes($_POST['simple_404']));
	
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
		<h2>Simple General Settings</h2>
		
		<div class="header-description">General settings for the whole theme</div>
		
		<form method="POST" action="" id="manager_form" >
		
		<table class="form-table ansimuz-table">
		
			<tr valign="top">
				<th scope="row">Search box visibility</th>
				<td>
					<select name="simple_search_display" id="simple_search_display">
						<option value="" <?php if(get_option('simple_search_display')=='') echo 'selected' ?>>Always</option>
						<option value="blog" <?php if(get_option('simple_search_display')=='blog') echo 'selected' ?>>Only on blog</option>
						<option value="never" <?php if(get_option('simple_search_display')=='never') echo 'selected' ?>>Never</option>
					</select>
					<span class="description">Choose the visibility of the search box at the top of page</span>
				</td>
			</tr>
			
			<tr valign="top">
				<th scope="row">404 page</th>
				<td>
					<textarea name="simple_404" id="simple_404" cols="60" rows="5" ><?php echo get_option('simple_404') ?></textarea>
					<span class="description">Text displayed when error 404 pops</span>
				</td>
			</tr>

			<tr valign="top">
				<th scope="row">Footer text</th>
				<td>
					<textarea name="simple_footer" id="simple_footer" cols="60" rows="5" ><?php echo stripslashes(get_option('simple_footer')) ?></textarea>
					<span class="description">Text displayed at the bottom of the footer</span>
				</td>
			</tr>

		</table>
		
		<input type="submit" name="search" value="Update Options" class="button-primary" /></p>
		<input type="hidden" name="update_themeoptions" value="true" />
			
		</form>
	</div>