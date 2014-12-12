
<?php get_header();?>

<?php

	function str_format( $dim, $top, $left ) {
		return 'width: '.$dim.'%; height:'.$dim.'%; transform: translate('.$top.'%, '.$left.'%;);';
	}

/*
	function arr_format_translate( $array ) {
		return 'left:'.$array[1].'%; top:'.$array[2].'%;';
	}
*/
	
	function arr_format_translate( $array ) {
		return 'data-left="'.$array[1].'" data-top="'.$array[2].'"';
	}
	
/*
	function arr_format_size( $array ) {
		//return 'width:'.$array[0].'%; height:'.$array[0].'%;';
		return 'width:'.$array[0].'%;';
	}	
*/
	
	function arr_format_size( $array ) {
		//return 'width:'.$array[0].'%; height:'.$array[0].'%;';
		return $array[0];
	}		
	
?>

<div id="marker"></div>

<section id="dreams" class="block crop">
	<?php

		$rand = FALSE; //no longer using the random method
		$population = 6;
		srand( $population*rand(0,10000) );

		$q = new WP_Query( array(
			'post_type' => 'dreams',
			'dream_categories'=> 'featured',
			'posts_per_page' => $population

		) );

		$fixed_vals = array(
			// dimension, left, top
			array( 10, 10, 10 ), 
			array( 30, 5, 40 ), 
			array( 8, 60, 40 ), 
			array( 12, 70, 5 ), 
			array( 4, 60, 70 ), 
			array( 5, 40, 3 ),
				 
			array( 8, 12, 30 ),
			 	
			array( 5, 12, 30 ), 	
										
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
	

	<article class="dream <?php echo 'dream' . $i . ' ' . $dream_template . ' ' . $light_or_dark; ?>" <?php  echo arr_format_translate( $fixed_vals[ $i % count( $fixed_vals ) ] );  ?> 		
	data-width="<?php echo arr_format_size( $fixed_vals[ $i % count( $fixed_vals ) ] ); ?>"
	>		
		
		<div class="dream-background"></div><!--dream-background-->
		
		<div class="dream-inner">
			
			<a class="dream-link" href="#<?php echo $post->post_name; ?>">
	
				<div class="dream-drawing">
				
					<?php if (has_post_thumbnail()) { ?> 
						<?php the_post_thumbnail('drawing') ?>
					<?php } else{  ?>

					<?php } ?>
						
				</div>
														
				<div class="dream-hover">
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
								
								<hr/>
								
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
	
	<?php wp_reset_query(); ?>

</section>

<section id="archive" class="block min">

	<div class="container">
		<div class="row">
	
			<div class="col-sm-12">
				<h1 class="">Archive</h1>
			</div>
			
			<div id="archive-filters" class="col-sm-8">
				<h3>filters</h3>
			</div>
			
			<div id="search" class="col-sm-4">
				<h3>search</h3>
			</div>		
			
		</div>
		
		<div class="row" id="archive-container">	
			
			<?php
			$q2 = new WP_Query( array(
				'post_type' => 'dreams',
				'posts_per_page' => 5
			) );	
			
			if ( $q2->have_posts() ) :	
				$j = 0;
				
				$n = $q2->found_posts;			
							
					while ( $q2->have_posts() ) : 
	
						$q2->the_post(); ?>
					
						<article class="col-sm-4 archive-dream">
							<h3><?php the_title(); ?></h3>
						</article>
							
					<?php $j++; endwhile; ?>
				<?php endif; ?>
		<?php wp_reset_query(); ?>
				
			
						
		</div>
	</div>

</section>
		
<?php get_footer(); ?>
