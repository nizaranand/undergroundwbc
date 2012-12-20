<?php

#--------------------------------------------------------------------
#
#	SHORTCODES
#
/*

PRE

	[pre]content[/pre]
				
LINK BUTTONS
	
	[link_button href="link" target="_self|_blank"]text[/link_button]
	
TABS
	[tabs]
	  [tab title="your title"]...[/tab]
	  [tab title="your title"]...[/tab]
	  ...
   [/tabs]

TWO COLUMNS
	
	[one_half]...[/one_half] [one_half_last]...[/one_half_last] 
	
THREE COLUMNS

	[one_third]...[/one_third] [one_third_last]...[/one_third_last]
	
FOUR COLUMNS

	[one_fourth]...[/one_fourth] [one_fourth_last]...[/one_fourth_last]
	
2/3 COLUMNS

	[two_third]...[/two_third] [two_third_last]...[/two_third_last]
	
3/4 COLUMNS

	[three_fourth]...[/three_fourth] [three_fourth_last]...[/three_fourth_last]

HEADERS

	[h1]...[/h1]...[h6]...[/h6]

PULLQUOTES

	[pullquote_left]...[/pullquote_left]
	
	[pullquote_right]...[/pullquote_right]
	
DROPCAP

	[dropcap]...[/dropcap]
	
HIGHLIGHT
	
	[hl]...[/hl]
	
INFOBOXES

	[box_info]...[/box_info]
	
	[box_success]...[/box_success]
	
	[box_error]...[/box_error]
	
	[box_warning]...[/box_warning]
	
MONO BOXES

	[mono_box type="arrow" align="alignleft|alignright"]...[/mono_box]
	
ACCORDION

	[accordion_box title="Lorem ipsum"]...[/accordion_box]
	
TOGGLE BOX

	[toggle_box title="Lorem ipsum"]...[/toggle_box]
	
LISTS

	[lists type="check|arrow|plus|star|heart"]
		<ul>
			<li>Content</li>
			<li>Content</li>
			<li>Content</li>
			...
		</ul>
	[/lists]
	
YOUTUBE

	 [youtube id="youtube_video_id" width="width" height="height" /]
	 
VIMEO

	 [vimeo id="vimeo_video_id" width="width" height="height" /]
	 
SLIDESHOW

	[slideshow]
		[img src="image_source" link="image_link" caption="image_caption"/]
	[/slideshow]

CONTACT FORM

	 [contact_form subject="email_subject" recipient="email_recipient" name_label="form_name_label" email_label="form_email_label" comments_label="form_comments_label" name_tool="form_name_tooltip" email_tool="form_email_tooltip" comments_tool="form_comments_tooltip" sent_message="form_sent_message" button_label="form_submit_label" /]
	 
#---------------------------------------------------------------------*/



// Clears <p> and <br> tags for the outputs ---------------------------*/

function uds_clear_autop($content){

    $content = str_ireplace('<p>', '', $content);
    $content = str_ireplace('</p>', '', $content);
    $content = str_ireplace('<br />', '', $content);
    return $content;
}
add_filter('uds_shortcode_out_filter', 'uds_clear_autop');

// PRE ---------------------------------------------------------------------*/

function pre($atts, $content=null){
	return '<pre>'.do_shortcode($content).'</pre>';
}
add_shortcode('pre', 'pre');


// LINK BUTTONS ---------------------------------------------------------------------*/

function link_button($atts, $content=null){
	extract(shortcode_atts( array( 
							'href' => '#',
							'target' => 'TARGET' 
							), $atts ));
							
	if($target == 'TARGET'){ $target = '_self'; }
	return '<a href="'.$href.'" target="'.$target.'" class="link-button"><span>'.do_shortcode($content).'</span></a><div class="clear"></div>';
}
add_shortcode('link_button', 'link_button');

// TABS ---------------------------------------------------------------------*/

function tabs($atts, $content=null){
	global $anzimus_tabs;
	$anzimus_tabs = array();
	do_shortcode($content);
	$out = '<div class="tabbed"><ul>';
	// titles
	foreach( $anzimus_tabs as $tab ) {
		$out .= '<li><a href="#'.$tab['id'].'"><span>' . $tab['title'] . '</span></a></li>';
	}
	$out .= '</ul>';
	// content
	foreach( $anzimus_tabs as $tab ) {
		$out .= '<div id="'.$tab['id'].'">' . $tab['content'] . '</div>';
	}
	$out .= '</div>';
	
	$anzimus_tabs = array();
	
	return $out;
}
//
function tab($atts, $content=null){
	global $anzimus_tabs;
	extract(shortcode_atts(array('title' => ''),$atts));
	
	// create random id between 0 and 10000
	$id = rand(0,10000);
	
	$anzimus_tabs[] = array('id'=>$id,
							'title'=>$title,
							'content'=>do_shortcode($content));
}
add_shortcode('tabs', 'tabs');
add_shortcode('tab', 'tab');

// TWO COLUMNS ---------------------------------------------------------------------*/

function one_half($atts, $content=null){
	return '<div class="one-half">'.do_shortcode($content).'</div>';
}
function one_half_last($atts, $content=null){
	return '<div class="one-half last" >'.do_shortcode($content).'</div><br class="clear" />';
}
add_shortcode('one_half', 'one_half');
add_shortcode('one_half_last', 'one_half_last');

// THREE COLUMNS ---------------------------------------------------------------------*/

function one_third($atts, $content=null){
	return '<div class="one-third">' .do_shortcode($content). '</div>';
}
function one_third_last($atts, $content=null){
	return '<div class="one-third last" >'.do_shortcode($content).'</div><br class="clear" />';
}
add_shortcode('one_third', 'one_third');
add_shortcode('one_third_last', 'one_third_last');

// FOUR COLUMNS ---------------------------------------------------------------------*/

function one_fourth($atts, $content=null){
	return '<div class="one-fourth">' .do_shortcode($content). '</div>';
}
function one_fourth_last($atts, $content=null){
	return '<div class="one-fourth last" >'.do_shortcode($content).'</div><div class="clear"></div>';
}
add_shortcode('one_fourth', 'one_fourth');
add_shortcode('one_fourth_last', 'one_fourth_last');

// 2/3 COLUMNS ---------------------------------------------------------------------*/

function two_third($atts, $content=null){
	return '<div class="two-third">' .do_shortcode($content). '</div>';
}
function two_third_last($atts, $content=null){
	return '<div class="two-third last" >'.do_shortcode($content).'</div><div class="clear"></div>';
}
add_shortcode('two_third', 'two_third');
add_shortcode('two_third_last', 'two_third_last');

// 3/4 COLUMNS ---------------------------------------------------------------------*/

function three_fourth($atts, $content=null){
	return '<div class="three-fourth">' .do_shortcode($content). '</div>';
}
function three_fourth_last($atts, $content=null){
	return '<div class="three-fourth last" >'.do_shortcode($content).'</div><div class="clear"></div>';
}
add_shortcode('three_fourth', 'three_fourth');
add_shortcode('three_fourth_last', 'three_fourth_last');


// HEADERS ---------------------------------------------------------------------*/

function h1($atts, $content=null){
	return '<h1 class="custom">'.do_shortcode($content).'</h1>';
}
function h2($atts, $content=null){
	return '<h2 class="custom">'.do_shortcode($content).'</h2>';
}
function h3($atts, $content=null){
	return '<h3 class="custom">'.do_shortcode($content).'</h3>';
}
function h4($atts, $content=null){
	return '<h4 class="custom">'.do_shortcode($content).'</h4>';
}
function h5($atts, $content=null){
	return '<h5 class="custom">'.do_shortcode($content).'</h5>';
}
function h6($atts, $content=null){
	return '<h6 class="custom">'.do_shortcode($content).'</h6>';
}
add_shortcode('h1', 'h1');
add_shortcode('h2', 'h2');
add_shortcode('h3', 'h3');
add_shortcode('h4', 'h4');
add_shortcode('h5', 'h5');
add_shortcode('h6', 'h6');

// PULLQUOTES ---------------------------------------------------------------------*/

function pullquote_left($atts, $content=null){
	return '<span class="pullquote-left">'.do_shortcode($content).'</span>';
}
add_shortcode('pullquote_left', 'pullquote_left');

function pullquote_right($atts, $content=null){
	return '<span class="pullquote-right">'.do_shortcode($content).'</span>';
}
add_shortcode('pullquote_right', 'pullquote_right');

// DROPCAP ---------------------------------------------------------------------*/

function dropcap($atts, $content=null){
	return '<span class="dropcap">'.do_shortcode($content).'</span>';
}
add_shortcode('dropcap', 'dropcap');

// HIGHLIGHT ---------------------------------------------------------------------*/

function hl($atts, $content=null){
	return '<span class="highlight">'.do_shortcode($content).'</span>';
}
add_shortcode('hl', 'hl');

// INFOBOXES ---------------------------------------------------------------------*/

function box_info($atts, $content=null){
	return '<p class="info">'.do_shortcode($content).'</p>';
}
function box_success($atts, $content=null){
	return '<p class="success">'.do_shortcode($content).'</p>';
}
function box_error($atts, $content=null){
	return '<p class="error">'.do_shortcode($content).'</p>';
}
function box_warning($atts, $content=null){
	return '<p class="warning">'.do_shortcode($content).'</p>';
}
add_shortcode('box_info', 'box_info');
add_shortcode('box_success', 'box_success');
add_shortcode('box_error', 'box_error');
add_shortcode('box_warning', 'box_warning');

// MONO BOXES ---------------------------------------------------------------------*/

function mono_box($atts, $content=null){
	extract(shortcode_atts( array( 
							'type' => 'TYPE',
							'align' => 'alignleft' 
							), $atts ));
	return '<p class="mono-box"><img src="'.get_bloginfo('template_url').'/img/mono-icons/'.$type.'32.png" alt="" class="'.$align.'" />'.do_shortcode($content).'</p>';
}
add_shortcode('mono_box', 'mono_box');

// ACCORDION ---------------------------------------------------------------------*/

function accordion_box($atts, $content=null){
	extract(shortcode_atts( array( 
							'title' => 'ITEM' 
							), $atts ));
	return '<h5 class="accordion-trigger custom"><a href="#">'.$title.'</a></h5>
				<div class="accordion-container">
				    <div class="block">
						<p>'.do_shortcode($content).'</p>
					</div>
				</div>';
}
add_shortcode('accordion_box', 'accordion_box');


// TOGGLE ---------------------------------------------------------------------*/

function toggle_box($atts, $content=null){
	extract(shortcode_atts( array( 
							'title' => 'ITEM' 
							), $atts ));
	return '<h5 class="toggle-trigger custom"><a href="#">'.$title.'</a></h5>
				<div class="toggle-container">
					<div class="block">
						<p>'.do_shortcode($content).'</p>
					</div>
				</div>';
}
add_shortcode('toggle_box', 'toggle_box');


// LISTS ---------------------------------------------------------------------*/

function lists($atts, $content=null){
	extract(shortcode_atts(array(
							'type' => 'check'
							),$atts));
	return'<div class="lists-' . $type . '">'.do_shortcode($content).'</div>';
}
add_shortcode('lists', 'lists');

// YOUTUBE ---------------------------------------------------------------------*/

function youtube( $atts, $content = null ) {
	
	extract(shortcode_atts(array('id' => '2Qd_IsxgAf8',
								 'width' => '489',
								 'height'  => '390'),$atts));
	
	return '<iframe title="YouTube video player" width="'.$width.'" height="'.$height.'" src="http://www.youtube.com/embed/'.$id.'" frameborder="0" allowfullscreen></iframe>';
	
}
add_shortcode('youtube', 'youtube');

// VIMEO ---------------------------------------------------------------------*/

function vimeo( $atts, $content = null ) {
	
	extract(shortcode_atts(array('id' => '14361690',
								 'width' => '400',
								 'height'  => '168'),$atts));
	
	return '<iframe src="http://player.vimeo.com/video/'.$id.'" width="'.$width.'" height="'.$height.'" frameborder="0"></iframe>';
	
}
add_shortcode('vimeo', 'vimeo');

// SLIDESHOW ---------------------------------------------------------------------*/

function slideshow($atts, $content=null){
	extract(shortcode_atts( array( 
							'width' => '960',
							'height' => '300' 
							), $atts ));
	$out = '<div class="slider2-wrapper" style="height: ' . $height . 'px; width: ' . $width . 'px"><div id="slider2">'.do_shortcode($content).'</div></div>';
	
	return apply_filters('uds_shortcode_out_filter', $out);

}
// slideshow img 
function img($atts, $content=null){
	extract(shortcode_atts( array( 
							'src' => 'http://luiszuno.com/themes/wp-torn/wp-content/uploads/2011/04/02.jpg',
							'link' => '#',
							'caption' => ''
							), $atts ));
	$caption = ($caption == '') ? '' : 'title="'.$caption.'"';
	
	$ret = '<a href="'.$link.'"><img src="'.$src.'" '.$caption.' /></a>';
	 
	return $ret;
}
add_shortcode('slideshow', 'slideshow');
add_shortcode('img', 'img');

// CONTACT FORM ---------------------------------------------------------------------*/

function contact_form($atts, $content=null){
	$user_info = get_userdatabylogin( 'admin' );
	extract(shortcode_atts( array( 
							'subject' => 'Contact form',
							'recipient' => $user_info->user_email ,
							'name_label' => 'Name',
							'email_label' => 'Email',
							'comments_label' => 'Comments',
							'name_tool' => 'Enter your name',
							'email_tool' => 'Enter your email',
							'comments_tool' => 'Enter your comments',
							'sent_message' => 'Thanks for your comments',
							'button_label' => 'Send'
							), $atts ));
							
	$sendmailurl = get_bloginfo('template_url').'/lib/send-mail-sc.php';
	
	$out =  '
	<script type="text/javascript" src="'.get_bloginfo('template_url').'/js/form-validation-sc.js"></script>
	<form id="sc-contact-form" action="#" method="post">
		<fieldset>
			<p>
				<label>'.$name_label.':</label>
				<input name="name"  id="name" type="text" class="form-poshytip" title="'.$name_tool.'" />
			</p>
			<p>
				<label>'.$email_label.':</label>
				<input name="email"  id="email" type="text" class="form-poshytip" title="'.$email_tool.'" />
			</p>
			<p>
				<label>'.$comments_label.':</label>
				<textarea  name="comments"  id="comments" rows="5" cols="20" class="form-poshytip" title="'.$comments_tool.'" ></textarea>
			</p>
			<input type="hidden" value="'.$recipient.'" name="to" id="to" />
			<input type="hidden" value="'.$subject.'" name="subject" id="subject" />
			<input type="hidden" value="'.$sendmailurl.'" name="sendmailurl" id="sendmailurl" />
			<p><input type="button" value="'.$button_label.'" name="submit" id="submit" /></p>
		</fieldset>
		<p class="error">Error message</p>
		<p class="success">'.$sent_message.'</p>
	</form>
	';
	
	return $out;					
}
add_shortcode('contact_form', 'contact_form');
								 
	
	

