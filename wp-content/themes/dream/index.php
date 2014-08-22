
<?php get_header();?>

<?php

	function str_format( $dim, $top, $left ) {
		return 'position:absolute; width: '.$dim.'%; height:'.$dim.'%; top:'.$top.'%; left:'.$left.'%;';
	}
	
?>

<section id="home" class="block crop">
	<?php

		$population = 7;
		srand( $population*rand(0,10000) );

		$q = new WP_Query( array(
			'post_type' => 'dreams',
			'number_posts' => $population

		) );


		if ( $q->have_posts() ) :	

	?>

	<div id="dreams">
	<?php

	while ( $q->have_posts() ) :

		$q->the_post();
		$id = get_the_ID();

		$dream_length = get_field('dream_length', $id );
		$dream_author = get_field('dream_author', $id );
		$dream_number = get_field('dream_number', $id );
		$dream_date = get_field('dream_date', $id );
		$dream_drawing_title = get_field('dream_drawing_title', $id );

		// percentages, ie 0 <= x <= 100
		$minX	= 20;
		$minY	= 5;
		$maxX	= 80;
		$maxY	= 50;

		$scale_factor = 5;

		if ( $dream_length != 0 ) {
			//$dim 	= (100 / $dream_length) * $scale_factor;
			$dim 	= rand(10,25);

		} else {
			$dim 	= rand(10,25);
		}
		
		$top 	= rand( $minY,$maxY );
		$left 	= rand( $minX,$maxY );

		global $post;
	?>
	
	<article class="dream" style="<?php echo str_format($dim, $top, $left); ?>">
		<a href="#<?php echo $post->post_name; ?>" >

		<?php if (has_post_thumbnail()) : ?> 	
		<div class="drawing">
			<?php the_post_thumbnail('drawing') ?>
		</div>
		<?php endif; ?>

		<div class="info">

			<hgroup class="title">
				<?php if ( $dream_number ) : ?><h3 class="dream-number">Dream No. <?php echo $dream_number; ?></h3><?php endif; ?>
				<h2 class="dream-title"><?php the_title(); ?></h2>
			</hgroup>

			<hgroup class="metadata">
				<?php if ( $dream_length ) : ?><h4 class="dream-length"><?php echo $dream_length; ?> words</h4><?php endif; ?>
				<?php if ( $dream_author ) : ?><h4 class="dream-author">Written by <?php echo $dream_author; ?></h4><?php endif; ?>
				<?php if ( $dream_date ) : ?><h4 class="dream-date"><?php echo $dream_date; ?></h4><?php endif; ?>
				<?php if ( $dream_drawing_title ) : ?><h4 class="dream-drawing-title">Drawing: <?php echo $dream_drawing_title; ?></h4><?php endif; ?>
			</hgroup>

			<?php // if ( get_the_field('dream_excerpt', $id ) ) : ?><h5 class="excerpt">I eat a fennel salad. I become aware that the Venerable Chogyam Trungpa Rinpoche is watching me eat.<?php // the_field( 'dream_excerpt', $id ); ?></h5><?php // endif; ?>
			
		</div>
		</a>

	</article>

	<?php endwhile; ?>

	</div>

	<?php endif; ?>

</section>

		
<?php get_footer(); ?>
