
<?php get_header();?>

<section id="home" class="block crop">
	<?php
		$q = new WP_Query( array(
			'post_type' => 'dreams',
			...
		) );


		if ( $q->have_posts() ) :

		

	?>

	<div id="dreams">
	
	<?php



		while ( $q->have_posts() ) {

			$q->the_post();
			$id = get_the_ID();

	?>

	<?php?>

	<article class="dream">

		<div class="drawing">
			<img src="<?php echo ...img_url...; ?>" />
		</div>

		<div class="info">

			<hgroup class="title">
				<h2 class="dream-title"><?php the_title(); ?></h2>
				<?php if ( get_the_field('number', $id ) ) : ?><h3 class="dream-number"><?php the_field( 'number', $id ); ?></h3><?php endif; ?>
			</hgroup>

			<hgroup class="metadata">
				<?php if ( get_the_field('dream_length', $id ) ) : ?><h4 class="dream-length"><?php the_field( 'dream_length', $id ); ?></h4><?php endif; ?>
				<h4 class="dream-author"></h4>
				<h4 class="dream-date"></h4>
				<h4 class="dream-drawing-title"></h4>
			</hgroup>

			<h5 class="excerpt"></h5>
			
		</div>

	</article>

	<?php endwhile; ?>

	</div>

	<?php endif; ?>

</section>

		
<?php get_footer(); ?>
