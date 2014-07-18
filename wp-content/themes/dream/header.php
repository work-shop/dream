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

<body <?php body_class('before menu-closed'); ?>>

	<header id="header">
	
		<div class="container">
		
			<div class="row header-top">
				<div class="left">
					<h3 class="page-title"><?php the_title(); ?></h3>
				</div>
				<a id="nav-toggle" href="#" class="right">
					menu<span class="icon" data-icon="x"></span>
				</a>
			</div>
			
			<nav class="row header-nav">
				<div id="blanket"></div>
				<?php get_template_part('engine-nav'); ?>			
			</nav>
			
		</div>		

	</header>
		
	<div id="content">
