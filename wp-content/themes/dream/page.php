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
	<div class="container">
		<div class="row">
		
			<?php get_template_part('galaxy'); ?>
			
		</div>
	</div>
</div>	

<?php endwhile; ?>

<?php get_footer();?>
