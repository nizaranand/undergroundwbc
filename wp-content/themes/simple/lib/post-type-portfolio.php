<?php

#--------------------------------------------------------------------
#
#	CUSTOM POST TYPE 'PORTFOLIO'
#
#--------------------------------------------------------------------

// Portfolio posts PHP5 -----------------------------//

// allow smart posts
if(isPHP5() ){
	require_once(TEMPLATEPATH . '/lib/functions-helper.php');
}

$args = array(
	'label' => __('Portfolio'),
	'singular_label' => __('Portfolio item'),
	'public' => true,
	'show_ui' => true,
	'capability_type' => 'post',
	'hierarchical' => false,
	'rewrite' => true,
	'supports' => array('title', 'editor', 'thumbnail', 'excerpt')
);

if(isPHP5() ){
	sd_register_post_type( 'portfolio', $args);
}else{
	register_post_type( 'portfolio', $args);
}

//

add_action("admin_init", "admin_simple_init");
add_action('save_post', 'save_simple_data');

function admin_simple_init(){
	add_meta_box("prodInfo-meta", "Portfolio info", "meta_portfolio_options", "portfolio", "normal", "low");
}

function meta_portfolio_options(){
	global $post;
	$custom = get_post_custom($post->ID);
	$bigImg = $custom["bigImg"][0];
	$client = $custom["client"][0];
	$date = $custom["date"][0];
	$link = $custom["link"][0];
	$gallery =  $custom["gallery"][0];
?>
	<p>
		<label><strong>Big image URL</strong></label>
		<input name="bigImg" value="<?php echo $bigImg; ?>" size="90"/><br/>
		<span class="description">Set an URl for the big image for this project</span>
	</p>
	<p>
		<label><strong>Client</strong></label>
		<input name="client" value="<?php echo $client; ?>" size="90"/><br/>
		<span class="description">The name of the project client</span>
	</p>
	<p>
		<label><strong>Project date</strong></label>
		<input name="date" value="<?php echo $date; ?>" size="90" /><br/>
		<span class="description">The date of the completion of the project</span>
	</p>
	<p>
		<label><strong>Project Link</strong></label>
		<input name="link" value="<?php echo $link; ?>" size="90" /><br/>
		<span class="description">The url of the project. Include the http://</span>
	</p>
	<p>
		<label><strong>Gallery ID</strong></label>
		<input name="gallery" value="<?php echo $gallery; ?>" size="5" /><br/>
		<span class="description">Set a gallery ID from the nextGen gallery</span>
	</p>
	<input type="hidden" name="update_portfolio" id="update_portfolio" value="true" />
<?php
}

// dave data
function save_simple_data(){
	global $post;
	// save portfolio data
	if($_POST['update_portfolio']){
		update_post_meta($post->ID, "bigImg", $_POST['bigImg']);
		update_post_meta($post->ID, "client", $_POST['client']);
		update_post_meta($post->ID, "date", $_POST['date']);
		update_post_meta($post->ID, "link", $_POST['link']);
		update_post_meta($post->ID, "gallery", $_POST['gallery']);
	}
}

// portfolio taxonomy ----------------------------------------------------//

register_taxonomy("category_portfolio", array('portfolio'), array("hierarchical" => true, "label" => "Portfolio Categories", "singular_label" => "Portfolio Category", "rewrite" => true) );


// portfolio taxonomy ----------------------------------------------------//

add_filter("manage_edit-portfolio_columns", "portfolio_edit_columns");
add_action("manage_posts_custom_column",  "portfolio_custom_columns");

function portfolio_edit_columns($columns){
	$columns = array(
		"cb" => "<input type='checkbox' />",
		"title" => "Title",
		"client" => "Client",
		"category_portfolio" => "Category"
	);
	return $columns;
}

function portfolio_custom_columns($column){
	global $post;
	switch ($column){
		case "client":
			$custom = get_post_custom();
			echo $custom["client"][0];
			break;
		case "category_portfolio":
			echo get_the_term_list($post->ID, 'category_portfolio', '', ', ','');
			break;
	}
}
