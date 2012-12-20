<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" <?php language_attributes() ?>> 
	<head>
		<?php global $cssPath, $themePath, $jsPath, $imgPath; ?>
		<!-- Allows replies in the comment list -->
		<?php if ( is_singular() ) wp_enqueue_script( 'comment-reply' );?>
		<?php wp_head() ?>

		<meta http-equiv="Content-Type" content="<?php bloginfo('html_type') ?>; charset=<?php bloginfo('charset') ?>" />
		<title><?php bloginfo('name') ?><?php wp_title() ?></title>
			
		<!-- CSS -->
		<link rel="stylesheet" href="<?php echo $themePath ?>style.css" type="text/css" media="screen" />
		<!--[if IE 6]>
			<link rel="stylesheet" type="text/css" media="screen" href="<?php echo $cssPath ?>ie-hacks.css" />
			<script type="text/javascript" src="<?php echo $jsPath ?>DD_belatedPNG.js"></script>
			<script>
	      		/* EXAMPLE */
	      		DD_belatedPNG.fix('*');
	    	</script>
		<![endif]-->
		<!--[if IE 7]>
			<link rel="stylesheet" href="<?php echo $cssPath ?>ie7-hacks.css" type="text/css" media="screen" />
		<![endif]-->
		<!--[if IE 8]>
			<link rel="stylesheet" href="<?php echo $cssPath ?>ie8-hacks.css" type="text/css" media="screen" />
		<![endif]-->
		<!-- ENDS CSS -->
		
		<!-- content bg -->
		<?php simple_content_bg() ?>	
		
		<!-- custom admin styles -->
		<?php simple_custom_styles() ?>
		
		<!-- prettyPhoto -->
		<link rel="stylesheet" href="<?php echo $jsPath ?>prettyPhoto/css/prettyPhoto.css" type="text/css" media="screen" />
		<!-- ENDS prettyPhoto -->
	
	
		<!-- JS -->
		<script type="text/javascript" src="<?php echo $jsPath ?>jquery-1.5.1.min.js"></script>
		<script type="text/javascript" src="<?php echo $jsPath ?>jqueryui.js"></script>
		<script type="text/javascript" src="<?php echo $jsPath ?>easing.js"></script>
		<script type="text/javascript" src="<?php echo $jsPath ?>jquery.cycle.all.js"></script>
		<script type="text/javascript" src="<?php echo $jsPath ?>tooltip/jquery.tools.min.js"></script>
		<script type="text/javascript" src="<?php echo $jsPath ?>filterable.pack.js"></script>
		<script type="text/javascript" src="<?php echo $jsPath ?>prettyPhoto/js/jquery.prettyPhoto.js"></script>
		<script type="text/javascript" src="<?php echo $jsPath ?>twitter.js"></script>
		<script type="text/javascript" src="<?php echo $jsPath ?>jquery.tabs/jquery.tabs.pack.js"></script>
		<script type="text/javascript" src="<?php echo $jsPath ?>custom.js"></script>
		<!-- ENDS JS -->
		
		<!-- Cufon -->
		<script src="<?php echo $jsPath ?>cufon-yui.js" type="text/javascript"></script>
		<script src="<?php echo $jsPath ?>fonts/<?php echo getFontFamilyName() ?>.font.js" type="text/javascript"></script>
        <!-- /Cufon -->
		
		<!-- superfish -->
		<link rel="stylesheet" type="text/css" media="screen" href="<?php echo $cssPath ?>superfish-custom.css" /> 
		<script type="text/javascript" src="<?php echo $jsPath ?>superfish-1.4.8/js/hoverIntent.js"></script> 
		<script type="text/javascript" src="<?php echo $jsPath ?>superfish-1.4.8/js/superfish.js"></script> 
		<!-- ENDS superfish -->
		
		<!-- tabs -->
        <link rel="stylesheet" href="<?php echo $cssPath ?>jquery.tabs.css" type="text/css" media="print, projection, screen" />
        <!-- Additional IE/Win specific style sheet (Conditional Comments) -->
        <!--[if lte IE 7]>
        <link rel="stylesheet" href="<?php echo $cssPath ?>jquery.tabs-ie.css" type="text/css" media="projection, screen">
        <![endif]-->
  		<!-- ENDS tabs -->
  		
  		<!-- poshytip -->
		<link rel="stylesheet" href="<?php bloginfo('template_url') ?>/js/poshytip-1.0/src/tip-twitter/tip-twitter.css" type="text/css" />
		<link rel="stylesheet" href="<?php bloginfo('template_url') ?>/js/poshytip-1.0/src/tip-yellowsimple/tip-yellowsimple.css" type="text/css" />
		<script type="text/javascript" src="<?php bloginfo('template_url') ?>/js/poshytip-1.0/src/jquery.poshytip.min.js"></script>
		<!-- ENDS poshytip -->
		
		<!-- Nivo slider -->
		<link rel="stylesheet" href="<?php bloginfo('template_url') ?>/css/nivo-slider.css" type="text/css" media="screen" />
		<script src="<?php bloginfo('template_url') ?>/js/nivo-slider/jquery.nivo.slider.js" type="text/javascript"></script>
		<!-- ENDS Nivo slider -->
  		
  		<!-- custom var -->
		<?php simple_set_js_vars() ?>
		
	</head>	
	
	<body>

		<!-- HEADER -->
		<?php $headerCSSID = (is_front_page()) ? 'home-header' : 'header';?>
		<div id="<?php echo $headerCSSID ?>">
		<div <?php simple_degree() ?>>
			<!-- header-wrapper -->
			<div class="wrapper">
				<?php simple_logo() ?>
				<?php simple_search() ?>
				<?php simple_menu() ?>
			</div>
			<!-- ENDS header-wrapper -->
		</div>
		</div>
		<!-- ENDS HEADER -->
			
		<!-- MAIN -->
		<div id="main">
			<!-- wrapper -->
			<div class="wrapper">