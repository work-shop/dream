<div class="post page-body page-container">

	<div class="container">
		<div class="row">
			<div class="col-sm-6">
	
				<article <?php post_class('single-article'); ?>>
					<h2 class="post-title hidden bold">
						<?php the_title(); ?>
					</h2>		
					<p class="reg date"><?php echo get_the_date(); ?> | 
						<?php if(in_category('2')){
							echo 'News';
						}
						else{
							echo 'Blog';
						} ?>
													
					</p>

					<?php if ( has_post_thumbnail() ) : ?>
						<div class="image-container">
							<?php the_post_thumbnail('project-large'); ?>
						</div>
					<?php endif; ?>	
					
					<div class="post-content">			
						<?php the_content(); ?>
					</div>
					
					<div class="share-post">
					<h3 class="bold">Share this story 
				<a class="addthis_button_facebook" addthis:url="<?php the_permalink(); ?>"  addthis:title="Mikyoung Kim Design"><span class="icon social" data-icon="F"></span></a>							
				<a class="addthis_button_twitter" addthis:url="<?php the_permalink(); ?>" addthis:title="Mikyoung Kim Design"><span class="icon social" data-icon="t"></span></a>	
					</h3>
					
					</div>
							
				</article>	    	    			
				       				
			</div>
		</div>		
	</div>	

</div>