
<div class="container work page-body page-container">

	<nav id="filters" class="option-set">	
		<ul id="options" data-option-key="filter">
			<li class="sort">Filter By:</li>
            <li class="filter selected" data-option-value="*"><a href="#filter">All</a></li>
            <li class="filter" data-option-value=".civic-institutional"><a href="#filter">civic + institutional</a></li>
            <li class="filter" data-option-value=".plaza-2"><a href="#filter">plaza</a></li>                        
            <li class="filter" data-option-value=".garden-2"><a href="#filter">garden</a></li>                        
            <li class="filter" data-option-value=".art-environments"><a href="#filter">environmental art</a></li>
            <li class="filter hidden" data-option-value=".healing-healthcare"><a href="#filter">healing + healthcare</a></li>
            <li class="filter" data-option-value=".urban-masterplan"><a href="#filter">masterplan</a></li>
            <li class="nav-toggle-projects exclude" ><a href="#">project index</a></li>            
		</ul>
	</nav>
	
	<div id="grid" class="clearfix">
		
		<?php
		$args = array(
		'post_type' => 'project',
		'project_category' => '',
		'posts_per_page' => '-1'
		);
		$work_query = new WP_Query( $args );
		
		if ( $work_query->have_posts() ) { ?>
		
			<?php while ( $work_query->have_posts() ) {
				$work_query->the_post(); 
				$terms = get_the_terms( $post->ID, 'project_category' );				
					$term_IDs = '';
					foreach ( $terms as $term  ) {
					if($term->term_id != 9) { 
						  $term_IDs .= $term->slug . ' ';
						}
					} ?>	
					
					<article class="element <?php if( has_term( 'featured-2', 'project_category' ) ) { echo 'featured element-large '; } else { echo 'element-small '; } echo $term_IDs; ?>">
						<a href="<?php the_permalink(); ?>">
							<div class="overlay"></div>
							<div class="image-container">
								<?php if ( has_post_thumbnail() ) {
								
											if( has_term( 'featured-2', 'project_category') ){  
												the_post_thumbnail('project-large'); 
											}
											else{
												 the_post_thumbnail('project-small');
											}
										}
										else { 
											if( has_term( 'featured-2', 'project_category') ){  ?>
													<img src="<?php bloginfo('template_directory'); ?>/_/img/blank-large.jpg" alt="blank">		
												<? }
												else{ ?>
													<img src="<?php bloginfo('template_directory'); ?>/_/img/blank-small.jpg" alt="blank">		
												<?php }
										 } ?>
							</div>			 
							<p class="project-title">
								<?php the_title(); ?> - <?php the_field('project_location'); ?>
							</p>						
						</a>
					</article>	    	    			
				
			<?php } ?>
		       
		<?php } else { } wp_reset_postdata(); ?>	

	</div>


</div>