<?php

// make slides global
global $slides;
if(get_option('slides') ){
	$slides = get_option('slides');
}

// update the DB
if($_POST['update_themeoptions'] == true){

	//display
	$display = ($_POST['simple_slideshow_display'] == 'on') ? 'checked' : '';
	update_option('simple_slideshow_display', $display);
	
	// slideshow
	update_option('simple_slideshow_fx', $_POST['fx']);
	update_option('simple_slideshow_slices', $_POST['simple_slideshow_slices']);
	update_option('simple_slideshow_speed', $_POST['speed']);
	update_option('simple_slideshow_timeout', $_POST['timeout']);
	update_option('simple_slideshow_starting', $_POST['simple_slideshow_starting']); 
	update_option('simple_slideshow_directionNav', $_POST['simple_slideshow_directionNav']);
	update_option('simple_slideshow_directionHover', $_POST['simple_slideshow_directionHover']); 
	update_option('simple_slideshow_controlNav', $_POST['simple_slideshow_controlNav']);
	
	// slide manager
	$slides = array();
	foreach($_POST['src'] as $k => $v){
		$slides[] = array(
			'src' => $v,
			'link' => $_POST['link'][$k],
			'caption' => stripslashes($_POST['caption'][$k])
		);
	}// foreach
	
	update_option('slides', $slides);
			
				
	// success message
	echo "<div id='setting-error-settings_updated' class='updated settings-error'> 
<p><strong>Settings saved.</strong></p></div> ";
}


// number of slides
if(get_option('simple_slideshow_number') == ''){
	$n_slides = 1;
}else{
	$n_slides = get_option('simple_slideshow_number');
}


?>



<div class="wrap">
		<div id="icon-themes" class="icon32">
			<br/>
		</div>
		<h2>Simple Slideshow Settings</h2>
		
		<div class="header-description">With these options you can change the way the slider is behaving. Also you can sort the items of the slider.</div>
		
		<form method="POST" action="" id="manager_form" >
		
			<table class="form-table ansimuz-table">
				
				<tr valign="top">
					<th scope="row">Hide slideshow</th>
					<td><input type="checkbox" name="simple_slideshow_display" id="simple_slideshow_display" <?php echo get_option('simple_slideshow_display') ?> /><span class="description"> Check this field if you dont want to display a slideshow in the front page.</span></td>
				</tr>
				
				<tr valign="top">
					<th scope="row">Transition effect</th>
					<td>
						<select name="fx">
							<option value="random" <?php if(get_option('simple_slideshow_fx')=='') echo 'selected' ?>>Random</option>
							<option value="sliceDown" <?php if(get_option('simple_slideshow_fx')=='sliceDown') echo 'selected' ?>>Slice Down</option>
							<option value="sliceDownLeft" <?php if(get_option('simple_slideshow_fx')=='sliceDownLeft') echo 'selected' ?>>Slice Down Left</option>
							<option value="sliceUp" <?php if(get_option('simple_slideshow_fx')=='sliceUp') echo 'selected' ?>>Slice Up</option>
							<option value="sliceUpLeft" <?php if(get_option('simple_slideshow_fx')=='sliceUpLeft') echo 'selected' ?>>Slice Up Left</option>
							<option value="sliceUpDown" <?php if(get_option('simple_slideshow_fx')=='sliceUpDown') echo 'selected' ?>>Slice Up Down</option>
							<option value="sliceUpDownLeft" <?php if(get_option('simple_slideshow_fx')=='sliceUpDownLeft') echo 'selected' ?>>Slice Up Down Left</option>
							<option value="fold" <?php if(get_option('simple_slideshow_fx')=='fold') echo 'selected' ?>>Fold</option>
							<option value="fade" <?php if(get_option('simple_slideshow_fx')=='fade') echo 'selected' ?>>Fade</option>
							<option value="slideInRight" <?php if(get_option('simple_slideshow_fx')=='slideInRight') echo 'selected' ?>>Slide In Right</option>
							<option value="slideInLeft" <?php if(get_option('simple_slideshow_fx')=='slideInLeft') echo 'selected' ?>>Slide In Left</option>
						</select>
						<span class="description"> Choose transition fx for the slideshow</span>
					</td>
				</tr>
				
				<tr valign="top">
					<th scope="row">Number of slices</th>
					<td>
						<input type="text" name="simple_slideshow_slices" id="simple_slideshow_slices" maxlength="3" size="3" value="<?php echo get_option('simple_slideshow_slices') ?>" /><span class="description"> Number of parts when image slices</span>
					</td>
				</tr>
				
				<tr valign="top">
					<th scope="row">Transition speed</th>
					<td>
						<input type="text" name="speed" id="speed" maxlength="6" size="6" value="<?php echo get_option('simple_slideshow_speed') ?>" /><span class="description"> Time to complete a transition in miliseconds</span>
					</td>
				</tr>
				
				<tr valign="top">
					<th scope="row">Transition timeout</th>
					<td>
						<input type="text" name="timeout" id="timeout" maxlength="6" size="6" value="<?php echo get_option('simple_slideshow_timeout') ?>" /><span class="description"> Delay between transitions in miliseconds</span>
					</td>
				</tr>
				
				<tr valign="top">
					<th scope="row">Starting slide</th>
					<td>
						<input type="text" name="simple_slideshow_starting" id="simple_slideshow_starting" maxlength="2" size="2" value="<?php echo get_option('simple_slideshow_starting') ?>" /><span class="description"> What slide the slider starts with. Default is 0 (first slide)</span>
					</td>
				</tr>
				
				<tr valign="top">
					<th scope="row">Direction navigation visibility</th>
					<td>
						<select name="simple_slideshow_directionNav">
							<option value="" <?php if(get_option('simple_slideshow_directionNav')=='') echo 'selected' ?>>Show</option>
							<option value="false" <?php if(get_option('simple_slideshow_directionNav')=='false') echo 'selected' ?>>Hide</option>
						</select>
						<span class="description"> Toggle directional next and prev arrows visibility</span>
					</td>
				</tr>
				
				<tr valign="top">
					<th scope="row">Direction navigation autohide</th>
					<td>
						<select name="simple_slideshow_directionHover">
							<option value="" <?php if(get_option('simple_slideshow_directionHover')=='') echo 'selected' ?>>Autohide</option>
							<option value="false" <?php if(get_option('simple_slideshow_directionHover')=='false') echo 'selected' ?>>Always visible</option>
						</select>
						<span class="description"> Toggle autohide for the next and prev arrows navigation</span>
					</td>
				</tr>
				
				<tr valign="top">
					<th scope="row">Control navigation visibility</th>
					<td>
						<select name="simple_slideshow_controlNav">
							<option value="" <?php if(get_option('simple_slideshow_controlNav')=='') echo 'selected' ?>>Visible</option>
							<option value="false" <?php if(get_option('simple_slideshow_controlNav')=='false') echo 'selected' ?>>Hidden</option>
						</select>
						<span class="description"> Toggle control navigation visibility</span>
					</td>
				</tr>
				
			</table>

			
			<!-- SLIDER MANAGER -->
			<h2>Slider Manager</h2><span class="description"> Recommended image dimmensions 960 x 321 pixels</span>	<br/><br/>
			<ul id="manager_form_wrap">
				
				<?php if(get_option('slides')) :  ?>
					
					<?php foreach($slides as $k => $slide): ?>
				
					<li class="slide">
						<label> Image source <span>(required)</span> </label>
						<input type="text" name="src[]" class="slide_src" value="<?php echo $slide['src'] ?>">
						<label> Image link <span>(required)</span> </label>
						<input type="text" name="link[]" id="slide_link" value="<?php echo $slide['link'] ?>">
						<label> Image caption </label>
						<textarea name="caption[]" cols="20" rows="2" class="slidecaption"><?php echo $slide['caption'] ?></textarea>
						<button class="remove_slide button-secondary">Remove this slide</button>
					</li>
					
					<?php endforeach; ?>
					
				<?php else: ?>
				
					<li class="slide">
						<label> Image source <span>(required)</span> </label>
						<input type="text" name="src[]" class="slide_src">
						<label> Image link <span>(required)</span> </label>
						<input type="text" name="link[]" id="slide_link">
						<label> Image caption </label>
						<textarea name="caption[]" cols="20" rows="2" class="slidecaption"></textarea>
						<button class="remove_slide button-secondary">Remove this slide</button>
					</li>
					
				<?php endif; ?>
			</ul>
			<!-- ENDS SLIDER MANAGER  -->
			
			<p><input type="submit" name="search" value="Update Options" class="button-primary" /></p>
			<input type="hidden" name="update_themeoptions" value="true" />
			
		</form>
		

</div>