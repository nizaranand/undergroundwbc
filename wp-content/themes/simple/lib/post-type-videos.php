<?php

#--------------------------------------------------------------------
#
#	CUSTOM POST TYPE 'VIDEOS'
#
#--------------------------------------------------------------------


$args = array(
	'label' => __('Videos'),
	'singular_label' => __('Video'),
	'public' => true,
	'show_ui' => true,
	'capability_type' => 'post',
	'hierarchical' => false,
	'rewrite' => true,
	'supports' => array('title', 'thumbnail', 'excerpt')
);

register_post_type( 'video', $args);

//

add_action("admin_init", "admin_simple_video_init");
add_action('save_post', 'save_simple_video_data');

function admin_simple_video_init(){
	add_meta_box("prodInfo-meta", "Video info", "meta_video_options", "video", "normal", "low");
}

function meta_video_options(){
	global $post;
	$custom = get_post_custom($post->ID);
	$videoURL = $custom["videoURL"][0];
?>
	<p>
		<label><strong>Video URL</strong></label>
		<input name="videoURL" value="<?php echo $videoURL; ?>" size="80"/><br/>
		<span class="description">Enter a url for the video. It can be vimeo, youtube...</span>
	</p>
	<input type="hidden" name="update_video" id="update_video" value="true" />
<?php
}

// dave data
function save_simple_video_data(){
	global $post;
	// save video data
	if($_POST['update_video']){
		update_post_meta($post->ID, "videoURL", $_POST['videoURL']);
	}
}

// video taxonomy ----------------------------------------------------//

register_taxonomy("category_video", array('video'), array("hierarchical" => true, "label" => "Video Categories", "singular_label" => "Video Category", "rewrite" => true) );


// video taxonomy ----------------------------------------------------//

add_filter("manage_edit-video_columns", "video_edit_columns");
add_action("manage_posts_custom_column",  "video_custom_columns");

function video_edit_columns($columns){
	$columns = array(
		"cb" => "<input type='checkbox' />",
		"title" => "Title",
		"video_url" => "Video URL",
		"category_video" => "Category"
	);
	return $columns;
}

function video_custom_columns($column){
	global $post;
	switch ($column){
		case "video_url":
			$custom = get_post_custom();
			echo $custom["videoURL"][0];
			break;
		case "category_video":
			echo get_the_term_list($post->ID, 'category_video', '', ', ','');
			break;
	}
}
