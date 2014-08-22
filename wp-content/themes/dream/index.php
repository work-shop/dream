
<?php get_header();?>

<?php

	function str_format( $dim, $top, $left ) {
		return 'position:absolute; width: '.$dim.'%; height:'.$dim.'%; top:'.$top.'%; left:'.$left.'%;';
	}

	function arr_format( $array ) {
		return 'position:absolute; width: '.$array[0].'%; height:'.$array[0].'%; top:'.$array[1].'%; left:'.$array[2].'%;';
	}
	
?>

<section id="home" class="block crop">
	<?php

		$rand = FALSE;
		$population = 7;
		srand( $population*rand(0,10000) );

		$q = new WP_Query( array(
			'post_type' => 'dreams',
			'number_posts' => $population

		) );

		$fixed_vals = array(
				// dimension, top, left
			array( 10,35,6 ),
			array( 23,40,40 ),
			array( 15,5,70 ),
			array( 40,25,20 ),
			array( 1,5,3 ),
		);

		if ( $q->have_posts() ) :	

	?>

	<div id="dreams">
	<?php

	$i = 0;

	while ( $q->have_posts() ) :

		$q->the_post();
		$id = get_the_ID();

		$dream_length = get_field('dream_length', $id );
		$dream_author = get_field('dream_author', $id );
		$dream_number = get_field('dream_number', $id );
		$dream_date = get_field('dream_date', $id );
		$dream_drawing_title = get_field('dream_drawing_title', $id );

		// percentages, ie 0 <= x <= 100
		$minX	= 10;
		$minY	= 5;
		$maxX	= 80;
		$maxY	= 90;

		$scale_factor = 15;

		if ( $dream_length != 0 ) {
			//$dim 	= (100 / $dream_length) * $scale_factor;
			$dim 	= rand(8,20);

		} else {
			$dim 	= rand(8,20);
		}
		
		$top 	= rand( $minY,$maxY );
		$left 	= rand( $minX,$maxY );

		global $post;
	?>
	
	<?php if ( $rand ) { ?>
		<article class="dream" style="<?php echo str_format($dim, $top, $left); ?>">
	<?php } else { ?>
		<article class="dream" style="<?php echo arr_format( $fixed_vals[ $i % count( $fixed_vals ) ] ); ?>">
	<?php } ?>

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

	<?php $i++; endwhile; ?>

	</div>

	<?php endif; ?>

</section>

		
<?php get_footer(); ?>
