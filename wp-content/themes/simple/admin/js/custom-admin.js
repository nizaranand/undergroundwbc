jQuery(document).ready(function($) {
	
	// Calls appendo for slides
	$('#manager_form_wrap').appendo({
		allowDelete: false,
		labelAdd: 'Add New Item',
		subSelect: 'li.slide:last'
	});
	
	// remove slide item
	$('li.slide .remove_slide').live('click', function(){
		if($('#manager_form_wrap li.slide').size() == 1){
			alert('Sorry, you need a least one item');
		}else{
			$(this).parent().slideUp(300,function(){
				$(this).remove();
			})
		}
		return false;
	});
	
	// sortable
	$('#manager_form_wrap').sortable({
		placeholder: 'slide-highlight'
	});

});