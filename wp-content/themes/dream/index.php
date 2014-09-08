
<?php get_header();?>

<?php

	function str_format( $dim, $top, $left ) {
		return 'width: '.$dim.'%; height:'.$dim.'%; transform: translate('.$top.'%, '.$left.'%;);';
	}

	function arr_format_translate( $array ) {
		return '-webkit-transform: translate('.$array[1].'%,'.$array[2].'%);';
	}
	
	function arr_format_size( $array ) {
		//return 'width:'.$array[0].'%; height:'.$array[0].'%;';
		return 'width:'.$array[0].'%;';
	}	
	
?>

<section id="dreams" class="block crop">
	<?php

		$rand = FALSE; //no longer using the random method
		$population = 7;
		srand( $population*rand(0,10000) );

		$q = new WP_Query( array(
			'post_type' => 'dreams',
			'posts_per_page' => $population

		) );

		$fixed_vals = array(
				// dimension, top, left
			array( 13,80,6 ),
			array( 38,55,40 ),
			array( 12,9,70 ),
			array( 6,25,30 ),
			array( 18,16,7 ),
			array( 5,79,82 ),			
		);

		if ( $q->have_posts() ) :	

	?>
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
		$maxY	= 80;

		$scale_factor = 15;

		if ( $dream_length != 0 ) {
			//$dim 	= (100 / $dream_length) * $scale_factor;
			$dim 	= rand(8,18);

		} else {
			$dim 	= rand(8,18);
		}
		
		$top 	= rand( $minY,$maxY );
		$left 	= rand( $minX,$maxY );

		global $post;
	?>
	

	<article class="dream <?php echo 'dream' . $i; ?>" style="<?php echo arr_format_translate( $fixed_vals[ $i % count( $fixed_vals ) ] ); ?>">
	
		<div class="dream-inner">
	
			<a href="#<?php echo $post->post_name; ?>" >
	
				<?php if (has_post_thumbnail()) : ?> 	
				<div class="dream-drawing" style="<?php echo arr_format_size( $fixed_vals[ $i % count( $fixed_vals ) ] ); ?>">
					<?php the_post_thumbnail('drawing') ?>
				</div>
				
				<div class="hover-info">
					<?php if ( $dream_number ) : ?><h4 class="dream-number hidden">Dream No. <?php echo $dream_number; ?></h4><?php endif; ?>
					<h4 class="dream-title hidden"><?php the_title(); ?></h4>
					<h4 class="excerpt italic">Chemistry is a sort of dream. Or a code anyway.</h4>						
				</div>
									
				<?php endif; ?>
				
				<div class="dream-body">
		
					<div class="dream-info">
			
						<hgroup class="title">
							<?php if ( $dream_number ) : ?>
							<h4 class="dream-number">Dream No. <?php echo $dream_number; ?></h4>
							<?php endif; ?>
										
						<hgroup class="metadata">
							<?php if ( $dream_length ) : ?><h4 class="dream-length"><?php echo $dream_length; ?> words &nbsp;&nbsp;&nbsp;&nbsp;<?php endif; ?>
							<?php if ( $dream_author ) : ?>Written by <?php echo $dream_author; ?> &nbsp;&nbsp;&nbsp;&nbsp;<?php endif; ?>
							<?php if ( $dream_date ) : ?><?php echo $dream_date; ?><?php endif; ?>
							<?php if ( $dream_drawing_title ) : ?><h4 class="dream-drawing-title">Drawing: <?php echo $dream_drawing_title; ?></h4><?php endif; ?>
						</hgroup>
						
							<h2 class="dream-title"><?php the_title(); ?></h2>
						</hgroup>

						<hr class="hidden"/>
						
						<h4 class="excerpt italic">Chemistry is a sort of a dream. Or a code anyway.</h4>		
						
						<hr />				
									
					</div>
				
					<div class="dream-text">
						
						<div class="container">
							<div class="row">			
						
								<div class="dream-text-inner serif ">
									<?php the_field('dream_text'); ?>
								</div>
								
							</div>				
						</div>
						
					</div>
				
				</div>
				
			</a>
			
		</div><!--inner-->

	</article>

	<?php $i++; endwhile; ?>

	<?php endif; ?>

</section>
		
<?php get_footer(); ?>
