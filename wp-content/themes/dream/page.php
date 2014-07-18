<?php get_header();?>

<?php while ( have_posts() ) : the_post(); ?>

<div class="page-heading bg-brand">
	<div class="container">
		<div class"row">
			<h3><?php the_title(); ?></h3>
		</div>	
	</div>
</div>

<div class="page-body page-default">

	<div class="row">
	
		<div class="col-sm-4 col-md-3 page-nav">
			<h2 class="" >Information</h2>
			<div class="page-menu">
				<?php wp_nav_menu(array('menu' => 'Page Menu' )); ?>
			</div>
		</div>	
		
		<div class="col-sm-8 col-md-9">
		
			<div class="page-header">
				<div class="">
					<h2 ><?php the_title(); ?></h2>
				</div>
				<p class="page-introduction"><?php the_field('page_introduction'); ?></p>					
			</div>
			<div class="page-content serif">
			
			</div>
			
		</div>
		
	</div>
	
</div>	

<?php endwhile; ?>

<?php get_footer();?>
