<?php
/*
Template name: Contact 
*/
?>
<?php get_header() ?>
<?php if( have_posts() ) : while ( have_posts() ) : the_post(); ?>

<?php
// Input form functions prints

function printTextArea($field_id, $type, $tooltip){
	echo '<textarea  name="'.$field_id.'"  id="'.$field_id.'" rows="5" cols="20" class="form-poshytip" title="'.$tooltip.'" ></textarea>';
}

function printInputText($field_id, $type, $tooltip){
	echo '<input name="'.$field_id.'"  id="'.$field_id.'" type="'.$type.'" class="form-poshytip" title="'.$tooltip.'" />';
}
?>

<!-- CONTACT INCLUDES -->
<script type="text/javascript">
	jQuery(document).ready(function($) {
	
		// hide messages 
		$("#error").hide();
		$("#success").hide();
		
		// on submit...
		$("#submit").click(function() {
			$("#error").hide();
			
			// values for to & subject
			var to = $("#to").val();
			var subject = $("#subject").val();
			
			// required fields
			<?php 
			$fields = get_option('contact_form_fields');
			$c = 0;
	      	foreach($fields as $k => $field): $field_id = "id_" . $c++; ?>
	      	
	      		// get value
		      	var <?php echo $field_id ?> = $("#<?php echo $field_id ?>").val();
		      	
		      	// required fields
		      	<?php if($field['required']): ?>
					if(<?php echo $field_id ?> == "" ){
						$("#error").fadeIn().text("Missing required fields for <?php echo $field['label'] ?>.");
						$("#<?php echo $field_id ?>").focus();
						return false;
					}
				<?php endif; ?>
	      	<?php endforeach; ?>
			
			// Build the labels for the fields in a CVS string var
			<?php
				$fields = get_option('contact_form_fields');
				$temp = "";
				foreach($fields as $k => $field):
				 	$temp .= $field['label']	. ',';
				endforeach;
				// remove last comma
				$temp = substr($temp, 0, -1);
			?>
			
			// data string
			var dataString = 'subject=' + subject
							+ '&to=' + to
							+ '&fields_labels=<?php echo $temp ?>'
							<?php  
							$fields = get_option('contact_form_fields');
							$c = 0;
	      					foreach($fields as $k => $field): $field_id = "id_" . $c++; ?>
	      						+ '&<?php echo $field_id ?>=' + <?php echo $field_id ?>	
							<?php endforeach; ?>
							;
							
							         
			// ajax
			$.ajax({
				type:"POST",
				url: "<?php echo get_template_directory_uri() . "/send-mail.php"; ?>",
				data: dataString,
				success: success
			});
			
			
		});  
			
			
		// on success...
		 function success(){
		 	 $("#success").fadeIn();
		 	 $("#contactForm fieldset").fadeOut();
		 }
		
	    return false;
	});

</script>
<!-- ENDS CONTACT INCLUDES -->
	
	
<div class="content">
<!-- CONTENT BELOW -->
	
	<!-- title -->
	<div class="title-holder">
		<span class="title"><?php the_title() ?></span>
		<span class="subtitle"><?php echo get_post_meta(get_the_ID(), 'subtitle', true) ?></span>
	</div>
	<!-- ENDS title -->
	
	<!-- page-content -->
	<div class="page-content">
		<?php the_content() ?>
		<!-- 2 cols -->
		<div class="one-half">
			<h4><?php echo get_option('simple_contact_form_label') ?></h4>
			<p><?php echo get_option('simple_contact_msg') ?></p>
			<!-- form -->
				<?php 
				$fields = get_option('contact_form_fields');
				if($fields != ''):
				?>
				<form id="contactForm" action="#" method="post">
					<fieldset>
						<!-- Fields -->
						<?php 
						$c = 0;
				      	foreach($fields as $k => $field): $field_id = "id_" . $c++; ?>
				    		<p>
								<label><?php echo $field['label'] ?> <?php if($field['required']) echo '*'; ?></label>
								<?php switch($field['type']):
									case 'textarea': printTextArea($field_id, $field['type'], $field['tooltip']); break; 
									default: printInputText($field_id, $field['type'], $field['tooltip']); break; 
								endswitch; ?>
							</p>
				        <?php endforeach; ?>
						<!-- ENDS Fields -->
						
						<!-- send mail configuration -->
						<input type="hidden" value="<?php echo get_option('simple_contact_emails') ?>" name="to" id="to" />
						<input type="hidden" value="<?php echo get_option('simple_from_emails') ?>" name="from" id="from" />
						<input type="hidden" value="<?php echo get_option('simple_contact_subject') ?>" name="subject" id="subject" />
						<input type="hidden" value="<?php bloginfo('template_url') ?>/send-mail.php" name="sendMailUrl" id="sendMailUrl" />
						<!-- ENDS send mail configuration -->
						
						
						<p><input type="button" value="SEND" name="submit" id="submit" /></p>
					</fieldset>
					<p id="error" class="warning">Message</p>
				</form>
				<p id="success" class="success"><?php echo get_option('simple_contact_thanks') ?></p>
				<?php endif; ?>
				<!-- ENDS form -->
	
		</div>
		<div class="one-half last">
			<h4><?php echo get_option('simple_contact_location_label') ?></h4>
			
			<p><?php echo nl2br(get_option('simple_map_text')) ?></p>
			<p class="<?php if(get_option('simple_contact_map') == '') echo 'inv' ?>">
				<?php if(get_option('simple_contact_map_link')): ?>
					<a href="<?php echo get_option('simple_contact_map_link') ?>">
				<?php endif; ?>
					<img src="<?php echo get_option('simple_contact_map') ?>" alt="Location" class="shadow-img"/>
				<?php if(get_option('simple_contact_map_link')): ?>
					</a>
				<?php endif; ?>
				
			</p>
			<p><?php echo nl2br(get_option('simple_contact_address')) ?></p>
		</div>
		<div class="clear "></div>
		<!-- ENDS 2 cols -->
	
	</div>
	<!-- ENDS page-content -->
	
<!-- CONTENT ABOVE -->
</div>
<?php endwhile; endif; ?>
<?php get_footer() ?>
