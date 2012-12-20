<?php

// make social global
global $social_links;
if(get_option('social_links') ){
	$social_links = get_option('social_links');
}


// update the DB
if($_POST['update_themeoptions'] == true){

	// twitter
	$display = ($_POST['simple_twitter_display'] == 'on') ? 'checked' : '';
	update_option('simple_twitter_display', $display);
	update_option('simple_twitter_user', $_POST['simple_twitter_user']);
	
	// follow us
	update_option('simple_follow_label', stripslashes($_POST['simple_follow_label']));
	$display = ($_POST['simple_follow_display'] == 'on') ? 'checked' : '';
	update_option('simple_follow_display', $display);
	
	// social footer
	update_option('simple_social_label', $_POST['simple_social_label']);
	
	// social manager
	$social_links = array();
	foreach($_POST['simple_social_class'] as $k => $v){
		$social_links[] = array(
			'class' => $v,
			'link' => $_POST['simple_social_link'][$k],
			'caption' => stripslashes($_POST['simple_social_caption'][$k])
		);
	}// foreach
	update_option('social_links', $social_links);


	// success message
	echo "<div id='setting-error-settings_updated' class='updated settings-error'> 
<p><strong>Settings saved.</strong></p></div> ";
}

// number of slides
if(get_option('simple_social_number') == ''){
	$n_social = 0;
}else{
	$n_social = get_option('simple_social_number');
}

// list of icons
$icons_array = array(
	'aim',
	 'apple',
	 'bebo',
	 'blogger',
	 'brightkite',
	 'cargo',
	 'delicious',
	 'designfloat',
	 'designmoo',
	 'deviantart',
	 'digg',
	 'dopplr',
	 'dribbble',
	 'email',
	 'ember',
	 'evernote',
	 'facebook',
	 'flickr',
	 'forrst',
	 'friendfeed',
	 'gamespot',
	 'google',
	 'google_voice',
	 'google_wave',
	 'googletalk',
	 'gowalla',
	 'grooveshark',
	 'ilike',
	 'komodomedia_azure',
	 'komodomedia_wood',
	 'lastfm',
	 'linkedin',
	 'mixx',
	 'mobileme',
	 'mynameise',
	 'myspace',
	 'netvibes',
	 'newsvine',
	 'openid',
	 'orkut',
	 'pandora',
	 'paypal',
	 'picasa',
	 'playstation',
	 'plurk',
	 'posterous',
	 'qik',
	 'readernaut',
	 'reddit',
	 'roboto',
	 'rss',
	 'sharethis',
	 'skype',
	 'stumbleupon',
	 'technorati',
	 'tumblr',
	 'twitter',
	 'viddler',
	 'vimeo',
	 'virb',
	 'windows',
	 'wordpress',
	 'xing',
	 'yahoo',
	 'yahoobuzz',
	 'yelp',
	 'youtube',
	 'zootool'
);


?>



<div class="wrap">
		<div id="icon-themes" class="icon32">
			<br/>
		</div>
		
		<h2>Simple Social Settings</h2>
		
		
		<div class="header-description">Twitter configuration and social bar settings. Change your twitter username for the twitter feed and set any number of social network links for your footer.</div>
		
		<form method="POST" action="" id="manager_form" >
		
		<table class="form-table ansimuz-table">
			
			<tr valign="top">
				<th scope="row">Twitter</th>
				<td>
					<p><input type="text" name="simple_twitter_user" id="simple_twitter_user" size="40" value="<?php echo get_option('simple_twitter_user') ?>" /> <span class="description"> Twitter username</span></p>
					
					<p><input type="checkbox" name="simple_twitter_display" id="simple_twitter_display" <?php echo get_option('simple_twitter_display') ?> /> <span class="description">Hide twitter. Checking this will hide the twitter feed.</span></p>
				</td>
			</tr>
			
			<tr valign="top">
				<th scope="row">Social network bar</th>
				<td>
					<p>
			<input type="text" name="simple_follow_label" id="simple_follow_label" size="40" value="<?php echo get_option('simple_follow_label') ?>" /> <span class="description">Follow us label</span></p>
			
					<p><input type="checkbox" name="simple_follow_display" id="simple_follow_display" <?php echo get_option('simple_follow_display') ?> /> hide social network bar</p>
			
				</td>
			</tr>
			
		</table>
		

			<h2>Social network manager</h2>
			<!-- SOCIAL MANAGER -->
			<ul id="manager_form_wrap">
				
				<?php if(get_option('social_links')) :  ?>
					
					<?php foreach($social_links as $k => $link): ?>
				
					<li class="slide">
						<label> Social icon</label>
						<select name="simple_social_class[]">
							<?php 
								for($j = 0; $j < count($icons_array); $j++){
									$temp = $icons_array[$j];
								?>
									<option value="<?php echo $temp ?>" <?php if($link['class'] == $temp) echo 'selected' ?>><?php echo $temp ?></option>
								<?php
								}
							 ?>
						</select>
						<label> Social link</label>
						<input type="text" name="simple_social_link[]" id="slide_link" value="<?php echo $link['link']  ?>">
						<label> Social tooltip caption </label>
						<input type="text" name="simple_social_caption[]" id="slide_link" value="<?php echo $link['caption']  ?>">
						<button class="remove_slide button-secondary">Remove this link</button>
					</li>
					
					<?php endforeach; ?>
					
				<?php else: ?>
				
					<li class="slide">
						<label> Social icon</label>
						<select name="simple_social_class[]">
							<?php 
								for($j = 0; $j < count($icons_array); $j++){
									$temp = $icons_array[$j];
								?>
									<option value="<?php echo $temp ?>" <?php if(get_option('simple_social_class_'.$i) == $temp) echo 'selected' ?>><?php echo $temp ?></option>
								<?php
								}
							 ?>
						</select>
						<label> Social link</label>
						<input type="text" name="simple_social_link[]" id="slide_link">
						<label> Social tooltip caption </label>
						<input type="text" name="simple_social_caption[]" id="slide_link">
						<button class="remove_slide button-secondary">Remove this link</button>
					</li>
					
				<?php endif; ?>
			</ul>
			<!-- ENDS SOCIAL MANAGER -->
			
			


						
			<p><input type="submit" name="search" value="Update Options" class="button-primary" /></p>
			<input type="hidden" name="update_themeoptions" value="true" />
			
		</form>
	</div>