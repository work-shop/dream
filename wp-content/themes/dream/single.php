<?php get_header(); ?>

<?php while ( have_posts() ) : the_post(); ?>

		<div class="template template-single template-single-dream">
		
			<?php get_template_part('dream'); ?>			
	
		</div>
	
	<?php endwhile; ?>

<?php get_footer(); ?>