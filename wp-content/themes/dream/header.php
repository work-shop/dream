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
 		
  <?php if (is_single()) {
 			$headerState = 'loading before header-closed';
 			$headerStateForHeader = 'closed';
 			
 		} else{
 			$headerState = 'loading before header-open dreams-orbiting';
 			$headerStateForHeader = 'open'; 					
 	} ?>		

<body <?php body_class($headerState); ?>>

	<div id="background"></div>

	<header id="header" class="<?php echo $headerStateForHeader; ?>">

		<div id="nav-toggle" class="off">
			<?php get_template_part('galaxy'); ?>
		</div>
		
		<nav id="nav">
		<a href="<?php bloginfo('site_url'); ?>">
			<h1 id="site-title">
			A &nbsp;&nbsp;Dream &nbsp; of<br/>
			the &nbsp; Drawing<br/>
			for Everything
			</h1>
		</a>
			
			<ul>
				<li><a href="#" id="orbit-toggle" class="display-toggle nav-icon active"><span class="icon" data-icon="&#8230;
"></span></a></li>					
				<li><a href="#" id="grid-toggle" class="display-toggle nav-icon"><span class="icon" data-icon="&Acirc;"></span></a></li>		
				<li><a href="#" id="number-toggle" class="display-toggle nav-icon"><span class="" data-icon="">1</span></a></li>	
				<li><a href="#archive" class="jump">archive</a></li>											
				<li><a href="#about">about</a></li>
				<li><a href="#contact">contact</a></li>
				
			</ul>
		
		</nav>

	</header>
	
	<div id="close">
		<a href="#close" class="display-block dream-toggle close-link centered">
			<span class="icon" data-icon="&#8217;"></span>
		</a> 
	</div>	
			
	<div id="content">
