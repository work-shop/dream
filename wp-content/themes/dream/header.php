<!DOCTYPE html>

<html>

<head>

	<meta charset="<?php bloginfo('charset'); ?>">
	
	<?php if (is_search()) { ?>
		<meta name="robots" content="noindex, nofollow" /> 
	<?php } ?>

	<title> 
	   <?php
		   if (!(is_404()) && (is_single()) || (is_page())) {
	          	bloginfo('name'); echo ' - '; wp_title('');
	          }
	      elseif (is_404()) {
	         	echo 'Oops!'; 
	         }
	      if (is_home()) {
	         	bloginfo('name'); echo ' - '; bloginfo('description'); 
	         }
	      else {
	         	bloginfo('name'); echo ' - '; bloginfo('description'); 
	         }
	   ?>
	</title>
				   
	<meta name="description" content="<?php bloginfo('description'); ?>">
	<meta name="google-site-verification" content="">
	<meta name="author" content="Work-Shop">
		
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
	
	<link rel="shortcut icon" href="<?php bloginfo('template_directory'); ?>/_/img/favicon.ico">
	<link rel="pingback" href="<?php bloginfo('pingback_url'); ?>" />
			
    <!--[if lt IE 9]>
      <script src="<?php bloginfo('template_directory'); ?>/_/js/html5shiv.js"></script>
      <script src="<?php bloginfo('template_directory'); ?>/_/js/respond.js"></script>
    <![endif]-->	

    	
	<?php wp_head(); ?>
			
</head>

<body <?php body_class('before header-closed'); ?>>

	<div id="background"></div>

	<header id="header" class="closed">

		<div id="nav-toggle" class="off">
			<img src="<?php bloginfo('template_directory'); ?>/_/img/toggle.png" alt="menu-toggle-icon" />
		</div>
		
		<nav id="nav">
			<h1 id="site-title">
			A Dream for<br/>
			the Drawing<br/>
			of Everything
			</h1>
			
			<ul>
				<li><a href="#">about</a></li>
				<li><a href="#">contact</a></li>
				<li><a href="#">famous dreams</a></li>
			</ul>
		
		</nav>

	</header>
	
	<div id="headerfix"></div>
		
	<div id="content">
