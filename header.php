<!DOCTYPE html>
<html <?php language_attributes(); ?> class="no-js no-svg">
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>">
<!--[if IE]>
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<![endif]-->
<meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
<link rel="apple-touch-icon-precomposed" href="path/to/favicon-152x152.png">
<link rel="icon" href="path/to/favicon-32.png" sizes="32x32">
<!--[if IE]><link rel="shortcut icon" href="path/to/favicon.ico"><![endif]-->
<!-- et utiliser /favicon.ico pour IE10 -->
<!-- Windows8 tuile Modern UI (facultatif et invalide HTML W3C) -->
<meta name="msapplication-TileColor" content="#D83434">
<meta name="msapplication-TileImage" content="path/to/favicon-144x144.png">
<!-- /Windows8 -->
<link rel="stylesheet" href="<?php bloginfo('stylesheet_url'); ?>" type="text/css">
<link rel="pingback" href="<?php bloginfo('pingback_url'); ?>">

		<?php // wordpress head functions ?>
		<?php wp_head(); ?>
		<?php // end of wordpress head ?>

		<?php // drop Google Analytics Here ?>
		<?php // end analytics ?>

</head>

<body <?php body_class(); ?>>

		<header  id="header" role="banner" class="pam">

		
		<div class="logonicotine">
		<?php require_once TEMPLATEPATH . '/assets/img/clubnicotine.svg';?>
		</div>

		<!-- class="wrapper clearfix" -->
			<?php wp_nav_menu([
				'theme_location' => 'main', // voir function register_nav_menus
				'container' => 'nav',
				'container_class' => 'nav-main nav-collapse'
			]); ?>
			<!-- <?php bloginfo('name'); ?> -->		


		</header>


		<main id="main" role="main" class="pam">

