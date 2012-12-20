<?php
// update the DB
if($_POST['update_themeoptions'] == true){

	//col 1
	$display = ($_POST['simple_archives_col1_display'] == 'on') ? 'checked' : '';
	update_option('simple_archives_col1_display', $display);
	update_option('simple_archives_col1_label', stripslashes($_POST['simple_archives_col1_label']));
	update_option('simple_archives_col1_type', stripslashes($_POST['simple_archives_col1_type']));
	
	//col 2
	$display = ($_POST['simple_archives_col2_display'] == 'on') ? 'checked' : '';
	update_option('simple_archives_col2_display', $display);
	update_option('simple_archives_col2_label', stripslashes($_POST['simple_archives_col2_label']));
	update_option('simple_archives_col2_type', stripslashes($_POST['simple_archives_col2_type']));

	
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
		<h2>simple - Archive Settings</h2>
		
		<div class="header-description">Select what and how to display for the archives</div>
		
		<form method="POST" action="" id="manager_form" >
		
		<table class="form-table ansimuz-table">
			<tr valign="top">
				<th scope="row">Column 1 data</th>
				<td>
					<p> <input type="checkbox" name="simple_archives_col1_display" id="simple_archives_col1_display" <?php echo get_option('simple_archives_col1_display') ?> /><span class="description"> Hide this column listing </span> 
					</p>
					
					<p>
					<input type="text" name="simple_archives_col1_label" id="simple_archives_col1_label" size="40" value="<?php echo get_option('simple_archives_col1_label') ?>" /><span class="description"> Header label</span>
					</p>
					
					<p>Select sort type
					<select name="simple_archives_col1_type">
						<option value="" <?php if(get_option('simple_archives_col1_type')=='') echo 'selected' ?>>By Subject</option>
						<option value="yearly" <?php if(get_option('simple_archives_col1_type')=='yearly') echo 'selected' ?>>By Year</option>
						<option value="monthly" <?php if(get_option('simple_archives_col1_type')=='monthly') echo 'selected' ?>>By Month</option>
						<option value="weekly" <?php if(get_option('simple_archives_col1_type')=='weekly') echo 'selected' ?>>By week</option>
						<option value="daily" <?php if(get_option('simple_archives_col1_type')=='daily') echo 'selected' ?>>By Day</option>
					</select>
					</p>
					
				</td>
			</tr>
			
			<tr valign="top">
				<th scope="row">Column 2 data</th>
				<td>
					<p> <input type="checkbox" name="simple_archives_col2_display" id="simple_archives_col2_display" <?php echo get_option('simple_archives_col2_display') ?> /><span class="description"> Hide this column listing </span> 
					</p>
					
					<p>
					<input type="text" name="simple_archives_col2_label" id="simple_archives_col2_label" size="40" value="<?php echo get_option('simple_archives_col2_label') ?>" /><span class="description"> Header label</span></p>
					
					<p></p>
					
					<p>Select sort type
					<select name="simple_archives_col2_type">
						<option value="" <?php if(get_option('simple_archives_col1_type')=='') echo 'selected' ?>>By Subject</option>
						<option value="yearly" <?php if(get_option('simple_archives_col1_type')=='yearly') echo 'selected' ?>>By Year</option>
						<option value="monthly" <?php if(get_option('simple_archives_col1_type')=='monthly') echo 'selected' ?>>By Month</option>
						<option value="weekly" <?php if(get_option('simple_archives_col1_type')=='weekly') echo 'selected' ?>>By week</option>
						<option value="daily" <?php if(get_option('simple_archives_col1_type')=='daily') echo 'selected' ?>>By Day</option>
					</select>
					</p>
					
				</td>
			</tr>
			
		</table>

			
		
			
			<p><input type="submit" name="search" value="Update Options" class="button-primary" /></p>
			<input type="hidden" name="update_themeoptions" value="true" />
			
		</form>
	</div>