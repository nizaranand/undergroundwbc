<?php
// update the DB
if($_POST['update_themeoptions'] == true){

	
	//simple_degree
	$display = ($_POST['simple_degree'] == 'on') ? 'checked' : '';
	update_option('simple_degree', $display);
	
	// logo
	update_option('simple_logo', $_POST['simple_logo']);
	update_option('simple_logo_left', $_POST['simple_logo_left']);
	update_option('simple_logo_top', $_POST['simple_logo_top']);
	
	// text colors
	update_option('simple_font_color', $_POST['simple_font_color']);
	update_option('simple_link_color', $_POST['simple_link_color']);
	update_option('simple_link_color_visited', $_POST['simple_link_color_visited']);
	update_option('simple_link_color_hover', $_POST['simple_link_color_hover']);
	
	// font family
	update_option('simple_fontfamily', $_POST['simple_fontfamily']);
	update_option('simple_fontfamily_custom', $_POST['simple_fontfamily_custom']);
	
	// header bg
	update_option('simple_headerbg_path', $_POST['simple_headerbg_path']);
	update_option('simple_headerbg_color', $_POST['simple_headerbg_color']);
	update_option('simple_headerbg_repeat', $_POST['simple_headerbg_repeat']);	
	update_option('simple_headerbg_predefined', $_POST['simple_headerbg_predefined']);	
	update_option('simple_headerbg_borders', $_POST['simple_headerbg_borders']);
	
	// main bg
	update_option('simple_bg_path', $_POST['simple_bg_path']);
	update_option('simple_bg_color', $_POST['simple_bg_color']);
	update_option('simple_bg_repeat', $_POST['simple_bg_repeat']);	
	update_option('simple_bg_predefined', $_POST['simple_bg_predefined']);	
	update_option('simple_bg_borders', $_POST['simple_bg_borders']);
	
	// content bg
	update_option('simple_content_bg_color', $_POST['simple_content_bg_color']);
	
	// footer bg
	update_option('simple_footerbg_path', $_POST['simple_footerbg_path']);
	update_option('simple_footerbg_color', $_POST['simple_footerbg_color']);
	update_option('simple_footerbg_repeat', $_POST['simple_footerbg_repeat']);	
	update_option('simple_footerbg_predefined', $_POST['simple_footerbg_predefined']);	
	update_option('simple_footerbg_borders', $_POST['simple_footerbg_borders']);
	
	// success message
	echo "<div id='setting-error-settings_updated' class='updated settings-error'> 
<p><strong>Settings saved.</strong></p></div> ";
}

// array of bgs
$bgs_array = array(
				array('Dots', '/dots.png'),
				array('Strips Bold', 'strips-bold.png'),
				array('Strips Thin', 'strips-thin.png'),
				array('Pattern 098', 'squidfingers/pattern_098.gif'),
				array('Pattern 134', 'squidfingers/pattern_134.gif'),
				array('Pattern 145', 'squidfingers/pattern_145.gif'),
				array('Pattern 146', 'squidfingers/pattern_146.gif'),
				array('Pattern 156', 'squidfingers/pattern_156.gif'),
				
				
				array('Webtreats Blue Creme 71', 'webtreats/webtreats_blue_creme_pattern_71.jpg'),
				array('Webtreats Blue Creme 72', 'webtreats/webtreats_blue_creme_pattern_72.jpg'),
				array('Webtreats Blue Creme 73', 'webtreats/webtreats_blue_creme_pattern_73.jpg'),
				array('Webtreats Blue Creme 74', 'webtreats/webtreats_blue_creme_pattern_74.jpg'),
				array('Webtreats Blue Creme 75', 'webtreats/webtreats_blue_creme_pattern_75.jpg'),
				array('Webtreats Blue Creme 76', 'webtreats/webtreats_blue_creme_pattern_76.jpg'),
				array('Webtreats Blue Creme 77', 'webtreats/webtreats_blue_creme_pattern_77.jpg'),
				array('Webtreats Blue Creme 78', 'webtreats/webtreats_blue_creme_pattern_78.jpg'),
				array('Webtreats Blue Creme 79', 'webtreats/webtreats_blue_creme_pattern_79.jpg'),
				
				array('Webtreats Blue Creme 80', 'webtreats/webtreats_blue_creme_pattern_80.jpg'),
				array('Webtreats Blue Creme 81', 'webtreats/webtreats_blue_creme_pattern_81.jpg'),
				array('Webtreats Blue Creme 82', 'webtreats/webtreats_blue_creme_pattern_82.jpg'),
				array('Webtreats Blue Creme 83', 'webtreats/webtreats_blue_creme_pattern_83.jpg'),
				array('Webtreats Blue Creme 84', 'webtreats/webtreats_blue_creme_pattern_84.jpg'),
				array('Webtreats Blue Creme 85', 'webtreats/webtreats_blue_creme_pattern_85.jpg'),
				array('Webtreats Blue Creme 86', 'webtreats/webtreats_blue_creme_pattern_86.jpg'),
				array('Webtreats Blue Creme 87', 'webtreats/webtreats_blue_creme_pattern_87.jpg'),
				array('Webtreats Blue Creme 88', 'webtreats/webtreats_blue_creme_pattern_88.jpg'),
				array('Webtreats Blue Creme 89', 'webtreats/webtreats_blue_creme_pattern_89.jpg'),
				
				array('Webtreats Blue Creme 90', 'webtreats/webtreats_blue_creme_pattern_90.jpg'),
				array('Webtreats Blue Creme 91', 'webtreats/webtreats_blue_creme_pattern_91.jpg'),
				array('Webtreats Blue Creme 92', 'webtreats/webtreats_blue_creme_pattern_92.jpg'),
				array('Webtreats Blue Creme 93', 'webtreats/webtreats_blue_creme_pattern_93.jpg'),
				array('Webtreats Blue Creme 94', 'webtreats/webtreats_blue_creme_pattern_94.jpg'),
				array('Webtreats Blue Creme 95', 'webtreats/webtreats_blue_creme_pattern_95.jpg'),
				array('Webtreats Blue Creme 96', 'webtreats/webtreats_blue_creme_pattern_96.jpg'),
				array('Webtreats Blue Creme 97', 'webtreats/webtreats_blue_creme_pattern_97.jpg'),
				array('Webtreats Blue Creme 98', 'webtreats/webtreats_blue_creme_pattern_98.jpg'),
				array('Webtreats Blue Creme 99', 'webtreats/webtreats_blue_creme_pattern_99.jpg')
			);
							
?>


<script type="text/javascript" src="<?php bloginfo('template_url') ?>/js/jscolor/jscolor.js"></script>

<div class="wrap">
		<div id="icon-themes" class="icon32">
			<br/>
		</div>
		<h2>Simple - Appearance Settings</h2>
		
		
		<div class="header-description">Use this page to configure the appearance of your theme. Change the font colors and background options</div>
		
		<form method="POST" action="" id="manager_form" >
		
		<table class="form-table ansimuz-table">
		
			<tr valign="top">
				<th scope="row">Background degree</th>
				<td>
					<p><input type="checkbox" name="simple_degree" id="simple_degree" <?php echo get_option('simple_degree') ?> /> <span class="description">Hide degree for the header and footer.</span> </p>
				</td>
			</tr>
			
			<tr valign="top">
				<th scope="row">Logo</th>
				<td>
					<p><input type="text" name="simple_logo" id="simple_logo" size="60" value="<?php echo get_option('simple_logo') ?>" /><br/><span class="description"> Set the URL for the logo</span></p>
					
					<p><input type="text" name="simple_logo_left" id="simple_logo_left" size="3" value="<?php echo get_option('simple_logo_left') ?>" /><span class="description"> Horizontal position</span></p>
			
					<p><input type="text" name="simple_logo_top" id="simple_logo_top" size="3" value="<?php echo get_option('simple_logo_top') ?>" /><span class="description"> Vertical position</span></p>
				</td>
			</tr>
			
			<tr valign="top">
				<th scope="row">Text colors</th>
				<td>
				
					
					<p>#<input type="text" name="simple_font_color" id="simple_font_color"  size="7" value="<?php echo get_option('simple_font_color') ?>"  maxlength="6" /><span class="description"> General text color</span></p>
					
					<p>#<input type="text" name="simple_link_color" id="simple_link_color"  size="7" value="<?php echo get_option('simple_link_color') ?>" maxlength="6" /><span class="description"> Active links color</span></p>
					
					<p>#<input type="text" name="simple_link_color_visited" id="simple_link_color_visited"  size="7" value="<?php echo get_option('simple_link_color_visited') ?>" maxlength="6" /><span class="description"> Visited links color</span></p>
					
					<p>#<input  type="text" name="simple_link_color_hover" id="simple_link_color_hover" size="7" value="<?php echo get_option('simple_link_color_hover') ?>" maxlength="6" /><span class="description"> Hover links color</span></p>

				</td>
			</tr>
			
			<tr valign="top">
				<th scope="row">Cufon font replacement</th>
				<td>
					
					<p>
					<select name="simple_fontfamily">
						<option value="" <?php if(get_option('simple_fontfamily')=='') echo 'selected' ?>>Bebas Neue</option>
						<option value="chunkfive" <?php if(get_option('simple_fontfamily')=='chunkfive') echo 'selected' ?>>Chunk Five</option>
						<option value="daniel" <?php if(get_option('simple_fontfamily')=='daniel') echo 'selected' ?>>Daniel</option>
						<option value="quicksand" <?php if(get_option('simple_fontfamily')=='quicksand') echo 'selected' ?>>Quicksand</option>
						<option value="quicksand-bold" <?php if(get_option('simple_fontfamily')=='quicksand-bold') echo 'selected' ?>>Quicksand Bold</option>
						<option value="sansation" <?php if(get_option('simple_fontfamily')=='sansation') echo 'selected' ?>>Sansation</option>
						<option value="custom" <?php if(get_option('simple_fontfamily')=='custom') echo 'selected' ?>>- Custom font -</option>
					</select>
					<span class="description right">Choose what cufon font face to use for the headers, navigation, etc..</span>
					</p>
					
					<p><input type="text" name="simple_fontfamily_custom" id="simple_fontfamily_custom" size="60" value="<?php echo get_option('simple_fontfamily_custom') ?>" /><br/><span class="description"> Use a different cufon font. Save your cufon font file a the folder: "/js/fonts/name-of-font.font.js" and enter the name of the cufon js file in this field. </span></p>
					
				</td>
			</tr>
			
			
			
			
			<tr valign="top">
				<th scope="row">Main background</th>
				<td>
					<select name="simple_content_bg_color">
						<option value="" <?php if(get_option('simple_content_bg_color')=='') echo 'selected' ?>>Beige</option>
						<option value="black" <?php if(get_option('simple_content_bg_color')=='black') echo 'selected' ?>>Black</option>
						<option value="white" <?php if(get_option('simple_content_bg_color')=='white') echo 'selected' ?>>White</option>
						<option value="gray" <?php if(get_option('simple_content_bg_color')=='gray') echo 'selected' ?>>Gray</option>
						<option value="blue" <?php if(get_option('simple_content_bg_color')=='blue') echo 'selected' ?>>Blue</option>
					</select>
					<span class="description">Background color for the content area</span>
				</td>
			</tr>
			
			
			<!-- Header bg -->
			<tr valign="top">
				<th scope="row">Header Background</th>
				<td>
				
					<p>#<input type="text" name="simple_headerbg_color" id="simple_headerbg_color" size="8" value="<?php echo get_option('simple_headerbg_color') ?>"  /><span class="description"> Solid color </span></p>
					
					<p><span class="description">Predefined Background</span>
					<select name="simple_headerbg_predefined">
						<option value="">Default</option>
						<option value="none" <?php echo ( get_option('simple_headerbg_predefined') == 'none' ) ? 'selected"' : '' ?>>None</option>
						<?php
						// populate the options
						foreach($bgs_array as $option):	
							$bg_label = $option[0];
							$bg_path = 	get_bloginfo('template_url') . "/img/bgs/" . $option[1];
						?>
							<option value="<?php echo $bg_path ?>" <?php echo ( get_option('simple_headerbg_predefined') == $bg_path ) ? 'selected"' : '' ?>><?php echo $bg_label ?></option>
						<?php endforeach; ?>
					</select>
					</p>
					
					<p>
					<span class="description">Background  repeat </span>
					<select name="simple_headerbg_repeat" id="simple_headerbg_repeat">
						<option value="" <?php if(get_option('simple_headerbg_repeat')=='') echo 'selected' ?>>default</option>
		
						<option value="repeat" <?php if(get_option('simple_headerbg_repeat')=='repeat') echo 'selected' ?>>repeat</option>
						<option value="no-repeat" <?php if(get_option('simple_headerbg_repeat')=='no-repeat') echo 'selected' ?>>no-repeat</option>
						<option value="repeat-y" <?php if(get_option('simple_headerbg_repeat')=='repeat-y') echo 'selected' ?>>repeat-y</option>
						<option value="repeat-x" <?php if(get_option('simple_headerbg_repeat')=='repeat-x') echo 'selected' ?>>repeat-x</option>
					</select>
					</p>
					
					<p><input type="text" name="simple_headerbg_path" id="simple_headerbg_path" size="60" value="<?php echo get_option('simple_headerbg_path') ?>"  />
					<br/><span class="description"> Set the url for the background path or leave blank for no background. </span>
					</p>
					
				</td>
			</tr>
			<!-- ENDS Header bg -->
			
			<!-- Footer bg -->
			<tr valign="top">
				<th scope="row">Footer Background</th>
				<td>
				
					<p>#<input type="text" name="simple_footerbg_color" id="simple_footerbg_color" size="8" value="<?php echo get_option('simple_footerbg_color') ?>"  /><span class="description"> Solid color </span></p>
					
					
					
					<p><span class="description">Predefined Background</span>
					<select name="simple_footerbg_predefined">
						<option value="">Default</option>
						<option value="none" <?php echo ( get_option('simple_headerbg_predefined') == 'none' ) ? 'selected"' : '' ?>>None</option>
						<?php
						// populate the options
						foreach($bgs_array as $option):	
							$bg_label = $option[0];
							$bg_path = 	get_bloginfo('template_url') . "/img/bgs/" . $option[1];
						?>
							<option value="<?php echo $bg_path ?>" <?php echo ( get_option('simple_footerbg_predefined') == $bg_path ) ? 'selected"' : '' ?>><?php echo $bg_label ?></option>
						<?php endforeach; ?>
					</select>
					</p>
					
					<span class="description">Background repeat </span>
					<select name="simple_footerbg_repeat" id="simple_footerbg_repeat">
						<option value="" <?php if(get_option('simple_footerbg_repeat')=='') echo 'selected' ?>>default</option>
		
						<option value="repeat" <?php if(get_option('simple_footerbg_repeat')=='repeat') echo 'selected' ?>>repeat</option>
						<option value="no-repeat" <?php if(get_option('simple_footerbg_repeat')=='no-repeat') echo 'selected' ?>>no-repeat</option>
						<option value="repeat-y" <?php if(get_option('simple_footerbg_repeat')=='repeat-y') echo 'selected' ?>>repeat-y</option>
						<option value="repeat-x" <?php if(get_option('simple_footerbg_repeat')=='repeat-x') echo 'selected' ?>>repeat-x</option>
					</select>
					
					<p><input type="text" name="simple_footerbg_path" id="simple_footerbg_path" size="60" value="<?php echo get_option('simple_footerbg_path') ?>"  />
					<br/><span class="description"> Set the url for the background path or leave blank for no background. </span>
					</p>
					
				</td>
			</tr>
			<!-- ENDS Footer bg -->
			
		</table>
		
			
			<p><input type="submit" name="search" value="Update Options" class="button-primary" /></p>
			<input type="hidden" name="update_themeoptions" value="true" />
			
		</form>
	</div>