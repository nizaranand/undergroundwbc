<?php
// update the DB
if($_POST['update_themeoptions'] == true){

	// title
	update_option('simple_portfolio_title', stripslashes($_POST['simple_portfolio_title']));
	update_option('simple_portfolio_subtitle', stripslashes($_POST['simple_portfolio_subtitle']));
	
	update_option('simple_portfolio_nposts', $_POST['simple_portfolio_nposts']);
	
	// labels
	update_option('simple_portfolio_client_label', $_POST['simple_portfolio_client_label']);
	update_option('simple_portfolio_date_label', $_POST['simple_portfolio_date_label']);
	update_option('simple_portfolio_link_label', $_POST['simple_portfolio_link_label']);
	update_option('simple_portfolio_back_label', $_POST['simple_portfolio_back_label']);
	
	
	// categories
	update_option('simple_portfolio_categories_label', $_POST['simple_portfolio_categories_label']);
	$display = ($_POST['simple_portfolio_categories_display'] == 'on') ? 'checked' : '';
	update_option('simple_portfolio_categories_display', $display);
	
	// related 
	$display = ($_POST['simple_portfolio_related_display'] == 'on') ? 'checked' : '';
	update_option('simple_portfolio_related_display', $display);
	update_option('simple_related_number', $_POST['simple_related_number']);
	update_option('simple_related_label', $_POST['simple_related_label']);

	
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
		<h2>Simple - Portfolio Page Options</h2>
		
		
		<div class="header-description">Label your headers and buttons in your portfolio.</div>
		
		<form method="POST" action="" id="manager_form" >
		
		<table class="form-table ansimuz-table">
		
			<tr valign="top">
				<th scope="row">Title</th>
				<td>
					<p><input type="text" name="simple_portfolio_title" id="simple_portfolio_title" size="60" value="<?php echo get_option('simple_portfolio_title') ?>" />
					<br/><span class="description">Text displayed at top of portolio page.</span></p>
				</td>
			</tr>
			
			<tr valign="top">
				<th scope="row">Subtitle</th>
				<td>
					<p><textarea  name="simple_portfolio_subtitle" id="simple_portfolio_subtitle" cols="60" rows="2" ><?php echo get_option('simple_portfolio_subtitle') ?></textarea><br/><span class="description">Text displayed below the title.</span></p>
				</td>
			</tr>
			
			<tr valign="top">
				<th scope="row">Items per page</th>
				<td>
					<input type="text" name="simple_portfolio_nposts" id="simple_portfolio_nposts" size="3" value="<?php echo get_option('simple_portfolio_nposts') ?>" />
					<span class="description">How many portfolio posts appear before pagination occurs</span></p>
				</td>
			</tr>
			
			<tr valign="top">
				<th scope="row">Categories filter</th>
				<td>
					<p><input type="checkbox" name="simple_portfolio_categories_display" id="simple_portfolio_categories_display" <?php echo get_option('simple_portfolio_categories_display') ?> /><span class="description"> Hide categories filter bar</span></p>
				</td>
			</tr>
			
			<tr valign="top">
				<th scope="row">Project labels</th>
				<td>
								
					<p> 
					<input type="text" name="simple_portfolio_client_label" id="simple_portfolio_client_label" size="30" value="<?php echo get_option('simple_portfolio_client_label') ?>" />
					<span class="description">Label for the client line</span></p>
					
					<p> 
					<input type="text" name="simple_portfolio_date_label" id="simple_portfolio_date_label" size="30" value="<?php echo get_option('simple_portfolio_date_label') ?>" />
					<span class="description">Label for the date line</span></p>
					
					<p> 
					<input type="text" name="simple_portfolio_link_label" id="simple_portfolio_link_label" size="30" value="<?php echo get_option('simple_portfolio_link_label') ?>" />
					<span class="description">Label for the url/link line</span></p>	
			
				</td>
			</tr>
			
			<tr valign="top">
				<th scope="row">Categories label</th>
				<td>
					<input type="text" name="simple_portfolio_categories_label" id="simple_portfolio_categories_label" size="30" value="<?php echo get_option('simple_portfolio_categories_label') ?>" />
					<span class="description">Label for the categories filter</span></p>
				</td>
			</tr>
			
			<tr valign="top">
				<th scope="row">Go back link</th>
				<td>
					<p>
						<input type="text" name="simple_portfolio_back_label" id="simple_portfolio_back_label" size="30" value="<?php echo get_option('simple_portfolio_back_label') ?>" /><br/>
						<span class="description">Label for the "GO BACK TO PORTFOLIO" link</span>
					</p>	
				</td>
			</tr>
			
			<tr valign="top">
				<th scope="row">RELATED POSTS</th>
				<td>
					<p><strong>Related label</strong>
					<input type="text" name="simple_related_label" id="simple_related_label" size="30" value="<?php echo get_option('simple_related_label') ?>" />
					<span class="description">Label for the related posts</span></p>
					
					<p><strong>Related items per page</strong>
					<input type="text" name="simple_related_number" id="simple_related_number" size="3" value="<?php echo get_option('simple_related_number') ?>" />
					<span class="description">How many posts appear in the related bar. Default is 6</span></p>	
					
					<p><input type="checkbox" name="simple_portfolio_related_display" id="simple_portfolio_related_display" <?php echo get_option('simple_portfolio_related_display') ?> /> Don't show related post at the bottom of the portfolio project page</p>
				</td>
			</tr>
		
		</table>
			
			<p><input type="submit" name="search" value="Update Options" class="button-primary" /></p>
			<input type="hidden" name="update_themeoptions" value="true" />		
			
		</form>
	</div>