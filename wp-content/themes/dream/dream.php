	<article class="dream " style="<?php echo arr_format_translate( $fixed_vals[ $i % count( $fixed_vals ) ] ); ?>">
	
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