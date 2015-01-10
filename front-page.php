<!doctype html>

<!--[if lt IE 7]><html <?php language_attributes(); ?> class="no-js lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
<!--[if (IE 7)&!(IEMobile)]><html <?php language_attributes(); ?> class="no-js lt-ie9 lt-ie8"><![endif]-->
<!--[if (IE 8)&!(IEMobile)]><html <?php language_attributes(); ?> class="no-js lt-ie9"><![endif]-->
<!--[if gt IE 8]><!--> <html <?php language_attributes(); ?> class="no-js"><!--<![endif]-->

	<head>
		<meta charset="utf-8">

		<!-- Google Chrome Frame for IE -->
		<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">

		<title><?php wp_title(' | ', true, 'right'); ?><?php bloginfo('name'); ?></title>

		<!-- mobile meta (hooray!) -->
		<meta name="HandheldFriendly" content="True">
		<meta name="MobileOptimized" content="320">
		<meta name="viewport" content="width=device-width, initial-scale=1.0"/>

		<!-- favicon -->
		<link rel="icon" href="<?php echo get_template_directory_uri(); ?>/favicon.png">

		<!-- WordPress Pingback Url-->
		<link rel="pingback" href="<?php bloginfo('pingback_url'); ?>">
		<!-- wordpress head functions -->

		<!-- Grab Google CDN's jQuery, fall back to local if offline -->
	<!-- 2.0 for modern browsers, 1.10 for .oldie -->
		<style>
			.footer {display: none;}
		</style>
	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
		<ul class="bg-slideshow">
		    <li><span>Image 01</span></li>
		    <li><span>Image 02</span></li>
		    <li><span>Image 03</span></li>
		</ul>

<div class="container">

	<div class="main">
		<div class="main-landing">
		<div class="main-landing-image">
			<img src="<?php bloginfo('template_url'); ?>/img/main-landing-image.png">
		</div>
		</div>
	</div>

<?php get_footer(); ?>