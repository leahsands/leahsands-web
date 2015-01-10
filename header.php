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
		<?php wp_head(); ?>
	</head>

	<body <?php body_class(); ?>>

		<div class="container">
			<div class="nav-container">
			<div class="nav">
				<div class="site-logo-container">
					<a href="<?php echo home_url(); ?>"><img class="site-logo" src="<?php bloginfo('template_url'); ?>/img/site_logo.png"></a>
				</div>
				<a href="#" class="toggle" gumby-trigger="#show-nav">
					<div class="show-menu">
						<i class="icon-right-open-big"></i>
					</div>
				</a>
				<div class="row navigation-menu" id="show-nav">
					<div class="row">
						<?php wp_nav_menu( array( 'theme_location' => 'primary', 'menu_class' => 'eight columns','walker' => new Walker_Page_Custom, 'container' => '', 'container_class' => '' ) ); ?>
						<div class="four columns">
							<ul class="social">
								<li>
									<a href="http://www.facebook.com/leahsands.art" target="_blank"><i class="icon-facebook-circled"></i></a>
								</li>
								<li>
									<a href="http://www.twitter.com/sandswidge" target="_blank"><i class="icon-twitter-circled"></i></a>
								</li>
								<li>
									<a href="http://leahsands.tumblr.com" target="_blank"><i class="icon-tumblr-circled"></i></a>
								</li>
								<li>
									<a href="http://www.linkedin.com/in/leahsands" target="_blank"><i class="icon-linkedin-circled"></i></a>
								</li>
							</ul>
						</div>
					</div>
				</div>
			</div>
			<div class="clear"></div> 
			</div>

			<div class="row main-body">
				<section class="twelve columns">
