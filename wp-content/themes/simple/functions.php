<?

#--------------------------------------------------------------------
#
#	GENERAL SETUP
#
#--------------------------------------------------------------------

require_once(TEMPLATEPATH . '/lib/shortcodes.php');
require_once(TEMPLATEPATH . '/lib/post-type-portfolio.php');
require_once(TEMPLATEPATH . '/lib/post-type-videos.php');

// Define manager constant
define('MANAGER_URI', get_bloginfo('stylesheet_directory') . '/admin/');

// SHORTCUT VARS ----------------------------------------------------//

$themePath = get_bloginfo('template_url') . "/";
$cssPath = get_bloginfo('template_url') . "/css/";
$jsPath = get_bloginfo('template_url') . "/js/";
$imgPath = get_bloginfo('template_url') . "/img/";

// sidebar & footer ----------------------------------------------------//

if ( function_exists('register_sidebar') ){
	register_sidebar(array(
		'name' => 'Sidebar',
		'before_widget' => '<li class="sidemenu">',
		'after_widget' => '</li>',
		'before_title' => '<h2 class="custom">',
		'after_title' => '</h2>',
	));
	
	register_sidebar(array(
		'name' => 'Footer',
		'before_widget' => '<li class="col">',
		'after_widget' => '</li>',
		'before_title' => '<h6 class="custom">',
		'after_title' => '</h6>',
	
	));	
}

// Enable support for thumbnails -----------------------------//

add_theme_support('post-thumbnails');
if( function_exists('add_theme_support') ){
	add_theme_support('post-thumbnails');
}

add_filter('post_thumbnail_html', 'thumbnail_html', 10, 3);
function thumbnail_html($html, $post_id, $post_image_id){
	$link = get_permalink($post_id);
	$title = esc_attr(get_post_field('post_title', $post_id));
	$html = '<a href="'.$link.'" title="'.$title.'">'.$html.'</a>';
	return $html;
}

// Enable excerpt support for pages -----------------------------//

add_post_type_support( 'page', 'excerpt' );

// Enable Nav Menu -----------------------------//

if ( function_exists( 'add_theme_support' ) )
add_theme_support ('nav-menus');


function register_simple_menus() {
	register_nav_menus  (array(
		'main'   => __('Main Navigation', 'main' )
	));
}
add_action('init', 'register_simple_menus' );

// smart quotes remover ----------------------------------------------------//

remove_filter('the_content', 'wptexturize');
remove_filter('the_title', 'wptexturize');
remove_filter('the_excerpt', 'wptexturize');
remove_filter('comment_text', 'wptexturize');

#--------------------------------------------------------------------
#
#	ADMIN OPTIONS
#
#--------------------------------------------------------------------


	
function themeoptions_admin_menu(){
	// menu
	add_menu_page('Simple', 'Simple', 10, 'simple-menu', 'load_edit_page', get_template_directory_uri() .'/admin/admin-icon.png');
	add_submenu_page( 'simple-menu', 'General settings', 'General settings', 10,  'simple-menu', 'load_edit_page');
	add_submenu_page( 'simple-menu', 'Appearance', 'Appearance', 10, 'appearance', 'load_edit_page');
	add_submenu_page( 'simple-menu', 'Front Page', 'Front Page', 10, 'front', 'load_edit_page');
	add_submenu_page( 'simple-menu', 'Blog', 'Blog', 10, 'blog', 'load_edit_page');
	add_submenu_page( 'simple-menu', 'Slideshow', 'Slideshow', 10, 'slideshow', 'load_edit_page');
	add_submenu_page( 'simple-menu', 'Gallery', 'Gallery', 10, 'gallery', 'load_edit_page');
	add_submenu_page( 'simple-menu', 'Social net', 'Social net', 10, 'social', 'load_edit_page');
	add_submenu_page( 'simple-menu', 'Portfolio', 'Portfolio', 10, 'portfolio',  'load_edit_page');
	add_submenu_page( 'simple-menu', 'Contact', 'Contact', 10, 'contact',  'load_edit_page');
	add_submenu_page( 'simple-menu', 'Staff', 'Staff', 10, 'staff',  'load_edit_page');
	add_submenu_page( 'simple-menu', 'Archives', 'Archives', 10, 'archives',  'load_edit_page');
	
	// scripts
	wp_enqueue_script('jquery-ui-encore');
	wp_enqueue_script('jquery-ui-sortable');
	wp_enqueue_script('jquery-appendo', MANAGER_URI . '/js/jquery.appendo.js', false, '1.0', false);
	wp_enqueue_script('slider-manager', MANAGER_URI . '/js/custom-admin.js', false, '1.0', false);
	
	// styles
	wp_enqueue_style('slider-manager', MANAGER_URI . '/css/admin-styles.css', false, '1.0', 'all');
}

// Load the corresponding editing page
function load_edit_page(){
	//default page
	if($_GET['page'] == 'simple-menu'){
		include_once('admin/general.php');
	}else{
		include_once('admin/'.$_GET['page'].'.php');
	}
}

// init menu
add_action('admin_menu', 'themeoptions_admin_menu'); 


#--------------------------------------------------------------------
#
#	CUSTOM FUNCTIONS
#
#--------------------------------------------------------------------

// Check php version  -----------------------------//

function isPHP5(){
	$string_version = phpversion();
	$version = explode('.', $string_version);
	if($version[0] >= 5){
		return true;
	}else{
		return false;
	}
}

// Return the name of the font family ------------------------------------//

function getFontFamilyName(){
	// get the font family
	$fontFamilyName = get_option('simple_fontfamily');
	if($fontFamilyName == ""){
		$fontFamilyName = 'bebas-neue';
	}
	
	// override custom
	if(get_option('simple_fontfamily') == 'custom'){
		$fontFamilyName = get_option('simple_fontfamily_custom');
	}
	return $fontFamilyName;
}

// sets JS variables ----------------------------------------------------//

function simple_set_js_vars(){
	// get php variables for js
	//
	// get php variables for js
	// transition Fx
	if(get_option('simple_slideshow_fx') == ''){
		$slideshow_fx = 'random';
	}else{
		$slideshow_fx = get_option('simple_slideshow_fx');
	}
	// number of slices
	if(get_option('simple_slideshow_slices') == ''){
		$slideshow_slices = '15';
	}else{
		$slideshow_slices = get_option('simple_slideshow_slices');
	}
	// speed
	if(get_option('simple_slideshow_speed') == ''){
		$slideshow_speed = '500';
	}else{
		$slideshow_speed = get_option('simple_slideshow_speed');
	}
	// timeout
	if(get_option('simple_slideshow_timeout') == ''){
		$slideshow_timeout = '6000';
	}else{
		$slideshow_timeout = get_option('simple_slideshow_timeout');
	}
	// starting slide
	if(get_option('simple_slideshow_starting') == ''){
		$slideshow_starting = '0';
	}else{
		$slideshow_starting = get_option('simple_slideshow_starting');
	}
	// Toggle directional nav
	if(get_option('simple_slideshow_directionNav') == ''){
		$slideshow_directionNav = true;
	}else{
		$slideshow_directionNav = false;
	}
	// Toggle directional autohide
	if(get_option('simple_slideshow_directionHover') == ''){
		$slideshow_directionHover = true;
	}else{
		$slideshow_directionHover = false;
	}
	// Toggle navigation
	if(get_option('simple_slideshow_controlNav') == ''){
		$slideshow_controlNav = true;
	}else{
		$slideshow_controlNav = false;
	}

	//
	if(get_option('simple_twitter_user') == ''){
		$twitter_user = 'ansimuz';
	}else{
		$twitter_user = get_option('simple_twitter_user');
	}
	//
	echo "<script type='text/javascript'>\n" ;
	// slider
	echo "slideshow_fx = '".$slideshow_fx."';\n";
	echo "slideshow_slices = '".$slideshow_slices."';\n";
	echo "slideshow_speed = '".$slideshow_speed."';\n";
	echo "slideshow_timeout = '".$slideshow_timeout."';\n";
	echo "slideshow_starting = '".$slideshow_starting."';\n"; 
	echo "slideshow_directionNav = '".$slideshow_directionNav."';\n";
	echo "slideshow_directionHover = '".$slideshow_directionHover."';\n";
	echo "slideshow_controlNav = '".$slideshow_controlNav."';\n";
	// twitter
	echo "twitter_user = '".$twitter_user."';\n";
	// fontfamily
	echo "fontFamilyName = '". getFontFamilyName() ."';\n";
	echo "</script>";
} 

// logo config ----------------------------------------------------//

function simple_logo(){
	$src = (get_option('simple_logo') != '') ? get_option('simple_logo') : get_bloginfo('template_url') . '/img/logo.png'; 
?>
	<a href="<?php bloginfo('url') ?>"><img src="<?php echo $src ?>" alt="<?php bloginfo('name') ?>" id="logo" /></a>
<?php
}

// search  ----------------------------------------------------//

function simple_search(){
	// filter visibility
	if( get_option('simple_search_display') != 'never'){
		 if( get_option('simple_search_display') == ''){
			get_search_form();
		}else{
			// for blog only
			if( !is_page()  ){
				get_search_form();
			}
		}
	} // if 
}


// Main navigation function  ----------------------------------------------------//

function simple_menu(){
	if(has_nav_menu('main')){
		wp_nav_menu( array(
		    			'menu' => 'main_menu',
		    			'container' => 'div',
		    			'container_id' => 'nav-holder',
		    			'menu_id' => 'nav',
						'menu_class' => 'sf-menu',
						'theme_location' => 'main'
			)); 
	}else{
		regular_simple_menu();
	}
}

function regular_simple_menu(){
	?>
	<div id="nav-holder">
	   	<ul id="nav" class="sf-menu">
		<?php wp_list_pages('title_li=&sort_column=menu_order, post_title&show_home=1'); ?>
		</ul>
	</div>
	<?php
}

// nivo-slider  ----------------------------------------------------//

function simple_slider(){
	$slides = get_option('slides');
	if(get_option('simple_slideshow_display') == '' && $slides != ""){
?>
	<div id="slideshow">
		<div id="slider">
		<?php foreach($slides as $k => $slide): ?>
        	<a href="<?php echo $slide['link'] ?>">
        	<img src="<?php echo $slide['src'] ?>"  alt="" title="<?php echo $slide['caption'] ?>" /></a>
        <?php endforeach; ?>
      	</div>
	</div>
<?php
	}//if 
}


// Left Front blocks  ----------------------------------------------------//

function simple_left_front_blocks(){
	global $post;
	// vars
	$title = get_option('simple_left_blocks_header');
	$subtitle = get_option('simple_left_blocks_subheader');
	$label = (get_option('simple_left_blocks_link_label') == "") ? 'MORE' : get_option('simple_left_blocks_link_label');
	$the_link = get_option('simple_left_blocks_link');
	
	// get config
	$type = get_option('simple_front_left_type');
	$nPosts = get_option('simple_left_nposts');
	$includePosts = get_option('simple_left_include_posts');
	$nPosts = ($nPosts == '') ? 4 : $nPosts;
	
	// set category if it is not a page
	if($type != 'page'){
		$categorySlug = get_option('simple_front_left_category');
	}
	
	$args = array(
		'post_type' => $type,
		'numberposts' => $nPosts,
		'include' => $includePosts,
		'category_name' => $categorySlug
		); 
	$myposts = get_posts($args);
?>
	<!-- front-left-col -->
	<div class="front-left-col">
		<div class="bullet-title">
			<div class="big"><?php echo $title ?></div>
			<div class="small"><?php echo $subtitle ?></div>
		</div>
		<!-- news list -->
		<ul class="news-list">
			<?php 
			foreach($myposts as $post) :
				setup_postdata($post);
			?>
			<li>
				<div class="news-title"><a href="<?php the_permalink() ?>"><?php the_title() ?></a></div>
				<div class="news-brief"><?php the_excerpt() ?></div>
				<div class="news-date"><?php the_time('d M, Y') ?></div>
			</li>
			<?php endforeach; ?>
		</ul>
		<!-- ENDS news-list -->
		<p><a href="<?php echo $the_link ?>" class="link-button right"><span><?php echo $label ?></span></a></p>
	</div>
	<!-- ENDS front-left-col -->
<?php
}

// Right Front blocks  ----------------------------------------------------//

function simple_right_front_blocks(){
	global $post, $imgPath;
	// vars
	$title = get_option('simple_right_blocks_header');
	$subtitle = get_option('simple_right_blocks_subheader');
	// get config
	$type = get_option('simple_front_right_type');
	$nPosts = get_option('simple_right_nposts');
	$includePosts = get_option('simple_right_include_posts');
	$nPosts = ($nPosts == '') ? 4 : $nPosts;
	$thumb_size = get_option('simple_right_thumb_size');
	
	// set category if it is not a page
	if($type != 'page'){
		$categorySlug = get_option('simple_front_right_category');
	}
	
	$args = array(
		'post_type' => $type,
		'numberposts' => $nPosts,
		'include' => $includePosts,
		'category_name' => $categorySlug
		); 
	$myposts = get_posts($args);
?>
	<!-- front-right-col-->
	<div class="front-right-col">
		<div class="bullet-title">
			<div class="big"><?php echo $title ?></div>
			<div class="small"><?php echo $subtitle ?></div>
		</div>
		<ul class="blocks-holder">
			<?php 
			foreach($myposts as $post) :
				setup_postdata($post);
			?>
			<li class="block">
				<div class="block-ribbon">
					<div class="left">
						<div class="block-title"><a href="<?php the_permalink() ?>"><?php the_title() ?></a></div>
						<div class="block-date"><?php the_time('d M, Y') ?></div>
					</div>
					<div class="right"></div>
				</div>
				
				<div class="clip">
				<?php 
				if(has_post_thumbnail()) : 
		   			// select the size
		   			switch($thumb_size){
		   				case 'thumbnail': the_post_thumbnail('thumbnail'); break;
		   				case 'medium': the_post_thumbnail('medium'); break;
		   				case 'large': the_post_thumbnail('large');  break;
		   				case 'custom': the_post_thumbnail(array(get_option('simple_right_thumb_size_custom'), get_option('simple_thumb_size_custom'))); break;
		   				default: the_post_thumbnail(array(300,300)); break;
		   			}
	   			else : ?>
	   				<a href="<?php the_permalink(); ?>"><img src="<?php echo $imgPath ?>na-block.gif" alt="Thumbnail" title="<?php the_title() ?>"/></a>
	   			<?php endif; ?>
	   			</div>
			</li>
			<?php endforeach; ?>
		</ul>
	</div>
	<!-- ENDS front-left-col -->
<?php
}


// pagination  ----------------------------------------------------//

function simple_set_pagination_skin(){
	global $imgPath;
?>
	<style type="text/css">
		.ngg-navigation span,
		.ngg-navigation a.page-numbers,
		.ngg-navigation span.page-numbers,
		.ngg-navigation a.next,
		.ngg-navigation span.next,
		.ngg-navigation a.prev,
		.ngg-navigation span.prev{
			background-image: url(<?php echo $imgPath ?>sprites.png); }
		}
	</style>
<?php
}	

// twitter----------------------------------------------------//

function simple_twitter(){
?>
	<?php if(get_option('simple_twitter_display') == '' ): ?>
		<div class="twitter-reader <?php if(is_front_page()){ echo 'twitter-home'; } ?>">
			<div id="twitter-holder"></div>
		</div>
	<?php else: ?>
		<div class="twitter-reader-empty"></div>
	<?php endif; ?>
<?php
}

// followus ----------------------------------------------------//

function simple_follow(){
?>
	<div id="social-bar">
		<ul class="follow-us">
<?php
	$social_links = get_option('social_links');
	if(get_option('simple_follow_display') == '' && $social_links != "" ):
?>
			<li><span><?php echo get_option('simple_follow_label') ?></span></li>
			
			<?php foreach($social_links as $k => $link):  
				$social_caption = ( $link['caption'] == "") ? "" : "title='".$link['caption']."'";
				$use_poshytip = ($link['caption'] == "") ? "" : "poshytip";  
			?>
		
			<li> 
				<a href="<?php echo $link['link'] ?>" class="poshytip icon-32 <?php echo $link['class'] ?>-32" <?php echo $social_caption ?>>link</a>
			</li>
			<?php endforeach; ?>
<?php endif; ?>
		</ul>
	</div>
<?php
}//follow us


// Degree ----------------------------------------------------//

function simple_degree(){
	if(get_option('simple_degree') != 'checked'){
		echo 'class="degree"';
	}
}

// Content bg ----------------------------------------------------//

function simple_content_bg(){
	global $cssPath;
	if( get_option('simple_content_bg_color') != '' ):
?>
	<link rel="stylesheet" href="<?php echo $cssPath ?>content-<?php echo get_option('simple_content_bg_color') ?>.css" type="text/css" media="screen" />
<?php
	endif;
}

// Custom styles ----------------------------------------------------//

function simple_custom_styles(){
?>
	<style type="text/css" >
		
			<?php 
				// set vars
				// text color
				$text_color = get_option('simple_font_color');
				// header bg
				$headerbg_path = get_option('simple_headerbg_path');
				$headerbg_predefined = get_option('simple_headerbg_predefined');
				$headerbg_color = get_option('simple_headerbg_color');
				$headerbg_repeat = get_option('simple_headerbg_repeat');
				// footer bg
				$footerbg_path = get_option('simple_footerbg_path');
				$footerbg_predefined = get_option('simple_footerbg_predefined');
				$footerbg_color = get_option('simple_footerbg_color');
				$footerbg_repeat = get_option('simple_footerbg_repeat');
				//font
				$font_color = get_option('simple_font_color');
			?>
	
	
		body{
			<?php
				// general text color 
				if( $text_color != ''){
					echo  "color:#$text_color;";
				}
			?>
		}
		
		
		#header, #home-header{
			<?php
				// header bg
				if( $headerbg_path != ''){
					echo  "	background-image: url(".$headerbg_path.");";
					echo "background-position: top left;";
				}
				if( $headerbg_path == 'none'){
					echo  "	background-image: none";
				}
				if( $headerbg_predefined != ''){
					echo  "	background-image: url(".$headerbg_predefined.");";
					echo "background-position: top left;";
				}
				if( $headerbg_color != ''){
					echo  "background-color: #".$headerbg_color.";";
				}
				if( $headerbg_repeat != ''){
					echo  "background-repeat: ".$headerbg_repeat.";";
				}
			?>
		}
		
		
		#footer{
			<?php
				// footer bg
				if( $footerbg_path != ''){
					echo  "	background-image: url(".$footerbg_path.");";
					echo "background-position: top left;";
				}
				if( $footerbg_path == 'none'){
					echo  "	background-image: none";
				}
				if( $footerbg_predefined != ''){
					echo  "	background-image: url(".$footerbg_predefined.");";
					echo "background-position: top left;";
				}
				if( $footerbg_color != ''){
					echo  "background-color: #".$footerbg_color.";";
				}
				if( $footerbg_repeat != ''){
					echo  "background-repeat: ".$footerbg_repeat.";";
				}

			?>
		}
	
		
		a{ 
			<?php
				$c = get_option('simple_link_color');
				if($c != ""){
					echo 'color: #'.$c.';';
				}
			?>
		}
		
		a:visited{
			<?php
				$c = get_option('simple_link_color_visited');
				if($c != ""){
					echo 'color: #'.$c.';';
				}
			?>
		}
		
		a:hover{
			<?php
				$c = get_option('simple_link_color_hover');
				if($c != ""){
					echo 'color: #'.$c.';';
				}
			?>
		}
		
		#logo{
			<?php
				$top_logo = get_option('simple_logo_top');
				$left_logo = get_option('simple_logo_left');
				if($top_logo != ''){
					echo 'top: '.$top_logo.'px;';
				}
				if($left_logo != ''){
					echo 'left: '.$left_logo.'px;';
				}
			?>
		}
	</style>
<?php
}


?>