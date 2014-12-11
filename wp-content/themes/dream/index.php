
<?php get_header();?>

<?php

	function str_format( $dim, $top, $left ) {
		return 'width: '.$dim.'%; height:'.$dim.'%; transform: translate('.$top.'%, '.$left.'%;);';
	}

	function arr_format_translate( $array ) {
		return 'top:'.$array[1].'%; left:'.$array[2].'%;';
	}
	
	function arr_format_size( $array ) {
		//return 'width:'.$array[0].'%; height:'.$array[0].'%;';
		return 'width:'.$array[0].'%;';
	}	
	
?>

<div id="marker"></div>

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

		$dream_number = get_field('dream_number', $id );
		$drawing_name = get_field('drawing_name', $id );
		$dream_author = get_field('dream_author', $id );
		$dream_date = get_field('dream_date', $id );
		$dream_teaser = get_field('dream_teaser', $id );
		
		$dream_template = get_field('dream_template', $id );
		$light_or_dark = get_field('light_or_dark', $id );	

		global $post;
	?>
	

	<article class="dream <?php echo 'dream' . $i . ' ' . $dream_template . ' ' . $light_or_dark; ?>" style="<?php  echo arr_format_translate( $fixed_vals[ $i % count( $fixed_vals ) ] ); ?>">		
		
		<div class="dream-background"></div><!--dream-background-->
		
		<div class="dream-inner">
			
			<a class="dream-link" href="#<?php echo $post->post_name; ?>" >
	
				<div class="dream-drawing" style="<?php echo  arr_format_size( $fixed_vals[ $i % count( $fixed_vals ) ] ); ?>">
				
					<?php if (has_post_thumbnail()) { ?> 
						<?php the_post_thumbnail('drawing') ?>
					<?php } else{  ?>

					<?php } ?>
						
				</div>
														
				<div class="dream-hover">
					<?php if ( $dream_number ) : ?><h4 class="dream-number hidden">Dream No. <?php echo $dream_number; ?></h4><?php endif; ?>
					<h4 class="dream-title hidden"><?php the_title(); ?></h4>
					<h4 class="excerpt italic"><?php echo $dream_teaser; ?></h4>						
				</div>	
				
				<div class="dream-content">			

					<div class="dream-header centered">
						
						<hgroup class="metadata">
						
							<?php if ( $dream_number ) : ?>
								<h4 class="dream-number">Dream No. &nbsp;&nbsp; <span class=""><?php echo $dream_number; ?></span></h4>
							<?php endif; ?>
							
							<?php if ( $drawing_name ) : ?>
								<h4 class="dream-drawing-title">Drawing &nbsp;&nbsp; <span class=""><?php echo $drawing_name; ?></span></h4>
							<?php endif; ?>
										
							<?php if ( $dream_author || $dream_date ) : ?>
								<h4><?php echo $dream_author; ?>  &nbsp;&nbsp;• &nbsp;&nbsp; <?php echo $dream_date; ?></h4>
							<?php endif; ?>
							
						</hgroup>
						
						<h1 class="dream-title"><?php the_title(); ?></h1>
						<h3 class="dream-teaser italic"><?php echo $dream_teaser; ?></h3>
						
						<hr />				
									
					</div><!-- dream-header -->
						
					<div class="dream-body">
					
						<div class="row">
						
							<div class="col-sm-12 col-md-8 col-md-offset-2 dream-text-column dream-text brown">
								
								<?php the_content(); ?>
								
								<?php get_template_part('guidepost'); ?>

							
							</div>
							
							<div class="col-sm-4 col-sm-offset-8 col-md-offset-0 col-md-2 dream-sidenote-column dream-sidenotes">
							</div>							
						
						</div>
					
					</div><!-- dream-header -->
					
				</div>
												
			</a><!-- dream-link -->
			
		</div><!--dream-inner-->

	</article>

	<?php $i++; endwhile; ?>

	<?php endif; ?>

</section>

<section id="archive" class="block min">

	<div class="container">
		<div class="row">
	
			<div class="col-sm-12">
				<h1 class="">Archive</h1>
			</div>
			
		</div>
	</div>

</section>
		
<?php get_footer(); ?>
