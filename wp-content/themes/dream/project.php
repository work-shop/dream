<div class="project project-body page-container loading">

	<div class="clip">

		<div class="flexslider-project container">
	
			<?php $images = get_field('project_gallery');
			 
			if( $images ): ?>
		        <ul class="slides">
		            <?php foreach( $images as $image ): ?>
		                <li>
		                    <img src="<?php echo $image['sizes']['project-slideshow']; ?>" alt="<?php echo $image['alt']; ?>" />
		                    <p><?php echo $image['caption']; ?></p>
		                </li>
		            <?php endforeach; ?>
		        </ul>				
					
				<div id="previous-project" class="flexslider-direction previous flex-previous">
					<span class="icon" data-icon="&#8216;"></span>
				</div>					
				
				<div id="next-project" class="flexslider-direction next flex-next">
					<span class="icon" data-icon="&#8212;"></span>
				</div>	
				
										
		<?php endif; ?>		
		
		</div>
	
	</div>

	<div class="project-info container">
		<div class="row">
			<div class="col-sm-8 col-md-9">
				<h3 class="bold"><?php the_title(); ?></h3>
				<?php if(get_field('project_location')): ?>
					<p class="location">Project Location: <?php the_field('project_location'); ?></p>		
				<?php endif; ?>	
				<?php if(get_field('project_client')): ?>						
					<p class="client">Client: <?php the_field('project_client'); ?></p>
				<?php endif; ?>					
				<?php if(get_field('project_completion_date')): ?>				
					<p class="date">Date Completed: <?php the_field('project_completion_date'); ?></p>
				<?php endif; ?>						
				<?php if(get_field('project_status')): ?>							
					<p class="date">Project Status: <?php the_field('project_status'); ?></p>		
				<?php endif; ?>	
									
				<div class="project-description text">
					<?php the_content(); ?>							
				</div>		
			</div>
			
			<div class="col-sm-4 col-md-3 project-links">
				<ul>
					<li><a href="#related" class="jump">Related Projects</a></li>
					<?php while( has_sub_field('project_links') ): ?>
							<li><a href="<?php the_sub_field('link_url'); ?>"><?php the_sub_field('link_text'); ?></a></li>
					<?php endwhile; ?>			
				</ul>
			</div>
		</div>
			
	</div>	
	
	<div class="container" id="related">
		<div class="page-heading bg-gray">
			<div class"row">
				<h3>Related Projects</h3>
			</div>	
		</div>
	</div>		
	
	<div class="container related">
		<div class="row">
			<div class="tiles clearfix">
				<ul>
          <?php

                // related posts logic.
                $tags = array_map(function( $x ) {
                    return $x->term_id;
                }, wp_get_post_tags( get_the_ID() ));

                $posted = array( get_the_ID() );
                $posts = 0;
                if ( !empty($tags) ) {
                    $RPQ = new WP_Query( array(
                        "post_type" => 'project',
                        "posts_per_page" => 4,
                        "nopaging" => true,
                        "tag__in" => $tags,
                        "post__not_in" => $posted
                    ) );
                    while ( $RPQ->have_posts()&&$posts<4 ) {
                        $post = $RPQ->next_post(); ?>
                        
						<li class="tile project-tile">
							<a href="<?php the_permalink(); ?>">
								<div class="overlay"></div>
							
							<?php if ( has_post_thumbnail() ) {
										the_post_thumbnail('project-tile');
									}
									else { } ?>
								<p class="project-title">
									<?php the_title(); ?> - <?php the_field('project_location'); ?>
								</p>						
							</a>
						</li>
						
						<?php array_push( $posted, $post->ID );
                        $posts += 1;
                    }
                    wp_reset_query();
                }

                if ( $posts<4 ) {
                    $AddQ = new WP_Query( array(
                        "post_type" => 'project',
                        "posts_per_page" => (4-$posts),
                        "nopaging" => true,
                        "post__not_in" => $posted
                    )); 
                                        
                   while ( $AddQ->have_posts()&&$posts<4 ) {
                        $post = $AddQ->next_post(); ?>
					
						<li class="tile project-tile">
							<a href="<?php the_permalink(); ?>">
								<div class="overlay"></div>
							
							<?php if ( has_post_thumbnail() ) {
										the_post_thumbnail();
									}
									else { ?>
										<img src="<?php bloginfo('template_directory'); ?>/_/img/blank-small.jpg">											
									<?php } ?>
								<p class="project-title">
									<?php the_title(); ?> - <?php the_field('project_location'); ?>
								</p>						
							</a>
						</li>                    
                                         
                     <?php $posts += 1;
                    }
                    wp_reset_query();
                }
            ?>
		
				</ul>
			</div>
		</div>	
	</div>
	
		

</div>
