<?php get_header();?>

<?php while ( have_posts() ) : the_post(); ?>

	<div class="page-heading">
		<div class="container">
			<div class="row">
				<h3 class="col-sm-6 bold"><?php the_title(); ?></h3>
			</div>		
		</div>
	</div>
		
	<?php the_content(); ?>

<?php endwhile; ?>


<?php get_footer();?>
