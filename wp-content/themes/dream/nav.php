		<div class="col-sm-2">
		<?php 
			$args = array(
			'post_type' => 'interactions',
			'interaction_type' => 'scrolling',
			'posts_per_page' => '-1'
			);
			$nav_query = new WP_Query( $args );
			if ( $nav_query->have_posts() ) { ?>
			    <h4 class="bold uppercase">scrolling</h4>
			    <ul>
				<?php while ( $nav_query->have_posts() ) {
					$nav_query->the_post(); ?>
					<li class="">
						<a href="<?php the_permalink(); ?>" class="small">							
						<?php the_title(); ?>				
						</a>
					</li>
				<?php } ?>
			       </ul>
			<?php } else { }
			wp_reset_postdata(); ?>				
		</div>		
		