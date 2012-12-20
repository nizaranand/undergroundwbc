<?php

// make fields global
global $fields;
if(get_option('contact_form_fields') ){
	$fields = get_option('contact_form_fields');
}

// update the DB
if($_POST['update_themeoptions'] == true){
		
	update_option('simple_contact_emails', $_POST['simple_emails']);
	update_option('simple_contact_subject', stripslashes($_POST['simple_subject']));
	update_option('simple_contact_form_label', stripslashes($_POST['simple_contact_form_label']));
	update_option('simple_contact_msg', stripslashes($_POST['simple_msg']));
	update_option('simple_contact_thanks', stripslashes($_POST['simple_thanks']));
	// map
	update_option('simple_contact_location_label', stripslashes($_POST['simple_contact_location_label']));
	update_option('simple_map_text', stripslashes($_POST['simple_map_text']));
	update_option('simple_contact_map', stripslashes($_POST['simple_contact_map']));
	update_option('simple_contact_map_link', $_POST['simple_contact_map_link']);
	update_option('simple_contact_address', stripslashes($_POST['simple_address']));
	
	// Contact form manager
	$fields = array();
	foreach($_POST['label'] as $k => $v){
		$fields[] = array(
			'label' => stripslashes($v),
			'tooltip' => stripslashes($_POST['tooltip'][$k]),
			'type' => stripslashes($_POST['type'][$k]),
			'required' => stripslashes($_POST['required'][$k])
		);
	}// foreach
	
	update_option('contact_form_fields', $fields);
		
	// success message
	echo "<div id='setting-error-settings_updated' class='updated settings-error'> 
<p><strong>Settings saved.</strong></p></div> ";
}

?>


<div class="wrap">
		<div id="icon-themes" class="icon32">
			<br/>
		</div>
		<h2>Simple - Contact Settings</h2>
		
		
		<div class="header-description">Configure your contact form and your contact information.</div>
		
		<form method="POST" action="" id="manager_form" >
		
		<table class="form-table ansimuz-table">
			<tr valign="top">
				<th scope="row">Contact form data</th>
				<td>
					<p>Email subject
					<input type="text" name="simple_subject" id="simple_subject" size="60" value="<?php echo get_option('simple_contact_subject') ?>" /><span class="description"> <br/>The subject for the sent form</span></p>
			
					<p>Recipients emails
					<input type="text" name="simple_emails" id="simple_emails" size="60" value="<?php echo get_option('simple_contact_emails') ?>" /><span class="description"> <br/>Enter multiple emails separated by commas.</span>
					</p>	
					
				</td>
			</tr>
			
			<tr valign="top">
				<th scope="row">Sent form message</th>
				<td>
					<p><textarea name="simple_thanks" id="simple_thanks" cols="58" rows="5"><?php echo get_option('simple_contact_thanks') ?></textarea>
					<br/><span class="description">Text displayed after message has benn sent.</span></p>

				</td>
			</tr>
			
			<tr valign="top">
				<th scope="row">Contact form header text</th>
				<td>
					<p><input type="text" name="simple_contact_form_label" id="simple_contact_form_label" size="60" value="<?php echo get_option('simple_contact_form_label') ?>" /><span class="description"> <br/>The text for the form title</span></p>
					
					<p><textarea name="simple_msg" id="simple_msg" cols="58" rows="5"><?php echo get_option('simple_contact_msg') ?></textarea>
					<br/><span class="description">Text displayed at the top of the contact form.</span></p>
				</td>
			</tr>
			
			<tr valign="top">
				<th scope="row">Map text</th>
				<td>
					
					<p>Map title<input type="text" name="simple_contact_location_label" id="simple_contact_location_label" size="60" value="<?php echo get_option('simple_contact_location_label') ?>" /><span class="description"> <br/>The text for the map/image title (the right column)</span></p>
					
					<p>Map text
					<textarea name="simple_map_text" id="simple_map_text" cols="58" rows="3"><?php echo get_option('simple_map_text') ?></textarea>
					<br/><span class="description">Text displayed over the map</span>
					</p>
					
					<p>Address
					<textarea name="simple_address" id="simple_address" cols="58" rows="3"><?php echo get_option('simple_contact_address') ?></textarea>
					<br/><span class="description">Address info displayed at the contact page</span></p>

					
				</td>
				
				<tr valign="top">
					<th scope="row">Map image</th>
					<td>
						<p>Map image
						<input type="text" name="simple_contact_map" id="simple_contact_map" size="60" value="<?php echo get_option('simple_contact_map') ?>" /><span class="description"> <br/>Url for the displaying image map. Must be 459px width max</span>
						</p>
						
						<p>Google Map Link
						<input type="text" name="simple_contact_map_link" id="simple_contact_map_link" size="60" value="<?php echo get_option('simple_contact_map_link') ?>" /><span class="description"> <br/>You can link the map image to and URL for example googlemaps </span></p>
					</td>
				</tr>

		</table>
		
			
		<!-- SLIDER MANAGER -->
		<h2>Contact Form Manager</h2>	<br/>
		<ul id="manager_form_wrap">
					
			<?php if(get_option('contact_form_fields')) :  ?>
				
				<?php foreach($fields as $k => $field):  ?>
			
				<li class="slide">
					<label> Label <span>(required)</span> </label>
					<input type="text" name="label[]" value="<?php echo $field['label'] ?>">
					<label> Tooltip caption  </label>
					<input type="text" name="tooltip[]" value="<?php echo $field['tooltip'] ?>">
					<label> Type </label>
					<select name="type[]">
						<option value="text" <?php if($field['type'] == 'text') echo 'selected="selected"' ?>>Text field</option>
						<option value="password" <?php if($field['type'] == 'password') echo 'selected="selected"' ?>>Password field</option>
						<option value="textarea" <?php if($field['type'] == 'textarea') echo 'selected="selected"' ?>>Text area</option>
					</select>
					<select name="required[]">
						<option value="" <?php if($field['required'] == '') echo 'selected="selected"' ?>>Not Required</option>
						<option value="1" <?php if($field['required'] == '1') echo 'selected="selected"' ?>>Required</option>
					</select>
					<button class="remove_slide button-secondary">Remove this field</button>
				</li>
				
				<?php endforeach; ?>
				
			<?php else: ?>
			
				<li class="slide">
					<label> Label <span>(required)</span> </label>
					<input type="text" name="label[]" >
					<label> Tooltip caption  </label>
					<input type="text" name="tooltip[]">
					<label> Type </label>
					<select name="type[]">
						<option value="text">Text field</option>
						<option value="password">Password field</option>
						<option value="textarea">Text area</option>
					</select>
					<select name="required[]">
						<option value="" selected="selected" >Not Required</option>
						<option value="1" >Required</option>
					</select>
					<button class="remove_slide button-secondary">Remove this field</button>
				</li>
				
			<?php endif; ?>
		</ul>
		<!-- ENDS SLIDER MANAGER  -->
						
			
		<p><input type="submit" name="search" value="Update Options" class="button-primary" /></p>
		<input type="hidden" name="update_themeoptions" value="true" />
		
	</form>
</div>