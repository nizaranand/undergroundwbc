<?php
// get the last search...
$last_search = esc_attr( apply_filters( 'the_search_query' , get_search_query() ) );
if($last_search != ""){
	$search_string = $last_search;
	}else{
	$search_string = "Search...";
}
?>
<div class="top-search">
	<form  method="get" id="searchform" action="<?php bloginfo('home') ?>">
		<div>
			<input type="text" value="<?php echo $search_string ?>" name="s" id="s" onfocus="defaultInput(this)" onblur="clearInput(this)" />
			<input type="submit" id="searchsubmit" value=" " />
		</div>
	</form>
</div>