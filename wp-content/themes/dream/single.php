<?php get_header(); ?>

<?php while ( have_posts() ) : the_post(); ?>

		<div class="template template-single template-single-dream">
		
			<?php
			$id = get_the_ID();
			
			$dream_number = get_field('dream_number', $id );
			$drawing_name = get_field('drawing_name', $id );
			$dream_author = get_field('dream_author', $id );
			$dream_date = get_field('dream_date', $id );
			$dream_teaser = get_field('dream_teaser', $id );
			
			$dream_template = get_field('dream_template', $id );
			$light_or_dark = get_field('light_or_dark', $id );	
			
			?>	
	
			<article class="dream <?php echo $dream_template . ' ' . $light_or_dark; ?>" id="dream-<?php echo $id; ?>">	
				
				<?php if($dream_template == 'template-background'): ?>
					<?php $background_image_url = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'background' ); ?>
					<div class="dream-background-image" style="background-image: url('<?php echo $background_image_url[0]; ?>')">				
						<?php // the_post_thumbnail('background'); ?>
					</div>
				<?php endif; ?>						
				
				<div class="dream-background">				
					
				</div>	
											
				
				<div class="dream-inner">
									
					<div class="dream-drawing">
						
						<?php the_post_thumbnail('drawing'); ?>
					
					</div>
					
					<div class="dream-header centered">
						
						<hgroup class="metadata">
						
							<?php if ( $dream_number ) : ?>
								<h4 class="dream-number">Dream No. &nbsp;&nbsp;&nbsp;&nbsp; <span class="italic"><?php echo $dream_number; ?></span></h4>
							<?php endif; ?>
							
							<?php if ( $drawing_name ) : ?>
								<h4 class="dream-drawing-title">Drawing &nbsp;&nbsp;&nbsp;&nbsp; <span class="italic"><?php echo $drawing_name; ?></span></h4>
							<?php endif; ?>
										
							<?php if ( $dream_author || $dream_date ) : ?>
								<h4><?php echo $dream_author; ?> &nbsp;&nbsp;&nbsp;&nbsp; <?php echo $dream_date; ?></h4>
							<?php endif; ?>
							
						</hgroup>
						
						<h1 class="dream-title"><?php the_title(); ?></h1>
						<h2 class="dream-teaser italic"><?php echo $dream_teaser; ?></h2>
						
						<hr />				
									
					</div>
					
					<div class="dream-body">
					
						<div class="row">
						
							<div class="col-sm-12 col-md-8 col-md-offset-2 dream-text-column dream-text brown">
								
								<?php the_content(); ?>
							
							</div>
							
							<div class="col-sm-4 col-sm-offset-8 col-md-offset-0 col-md-2 dream-sidenote-column dream-sidenotes">
								<h4>sidenote</h4>
							</div>							
						
						</div>
					
					</div>
				
				</div>
	
			</article>
	
		</div>
	
	<?php endwhile; ?>

<?php get_footer(); ?>