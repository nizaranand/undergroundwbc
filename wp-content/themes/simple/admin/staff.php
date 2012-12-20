<?php

// make slides global
global $members;
if(get_option('members') ){
	$members = get_option('members');
}

// update the DB
if($_POST['update_themeoptions'] == true){

	// slide manager
	$members = array();
	foreach($_POST['src'] as $k => $v){
		$members[] = array(
			'src' => $v,
			'name' => stripslashes($_POST['name'][$k]),
			'profile' => stripslashes($_POST['profile'][$k]),
			'info' => stripslashes($_POST['info'][$k])
		);
	}// foreach
	
	update_option('members', $members);

	// success message
	echo "<div id='setting-error-settings_updated' class='updated settings-error'> 
<p><strong>Settings saved.</strong></p></div> ";

}

// number of staff members
if(get_option('simple_staff_number') == ''){
	$n_staff = 3;
}else{
	$n_staff = get_option('simple_staff_number');
}
		
?>

<div class="wrap">
		<div id="icon-themes" class="icon32">
			<br/>
		</div>
		<h2>Simple - Staff Settings</h2>
		
		
		<div class="header-description">Add, delete and sort staff members</div>
		
		<form method="POST" action="" id="manager_form" >
		
			<table class="form-table ansimuz-table">
			</table>
			
			<!-- STAFF MANAGER -->
			<ul id="manager_form_wrap">
				
				<?php if(get_option('members')) :  ?>
					
					<?php foreach($members as $k => $member): ?>
				
					<li class="slide">
						<label> Picture source <span>(required)</span> </label>
						<input type="text" name="src[]" value="<?php echo $member['src'] ?>" >
						<label> Name <span>(required)</span> </label>
						<input type="text" name="name[]" value="<?php echo $member['name'] ?>">
						<label> Profile </label>
						<textarea name="profile[]" cols="20" rows="2" class="slidecaption"><?php echo $member['profile'] ?></textarea>
						<label> Info </label>
						<textarea name="info[]" cols="20" rows="2" class="slidecaption"><?php echo $member['info'] ?></textarea>
						<button class="remove_slide button-secondary">Remove this slide</button>
					</li>
					
					<?php endforeach; ?>
					
				<?php else: ?>
				
					<li class="slide">
						<label> Picture source <span>(required)</span> </label>
						<input type="text" name="src[]" >
						<label> Name <span>(required)</span> </label>
						<input type="text" name="name[]" >
						<label> Profile </label>
						<textarea name="profile[]" cols="20" rows="2" class="slidecaption"></textarea>
						<label> Info </label>
						<textarea name="info[]" cols="20" rows="2" class="slidecaption"></textarea>
						<button class="remove_slide button-secondary">Remove this slide</button>
					</li>
					
				<?php endif; ?>
			</ul>
			<!-- ENDS STAFF MANAGER  -->
			
			<p><input type="submit" name="search" value="Update Options" class="button-primary" /></p>
			<input type="hidden" name="update_themeoptions" value="true" />
			
		</form>
	</div>