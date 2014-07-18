<?php get_header();?>

<?php while ( have_posts() ) : the_post(); ?>

	<section id="about-home" class="block flexslider-full crop loading">
		<div id="previous-about" class="flexslider-full-direction previous flex-previous">
			<span class="icon" data-icon="&#8216;"></span>
		</div>				
		<?php if(get_field('about_page_slideshow','option')): ?>
		
		<ul class="slides"> 
		
			<?php while(has_sub_field('about_page_slideshow','option')): ?>
			
				<?php $slide_image = get_sub_field('slide_image'); ?>
					<li style="background-image: url('<?php echo $slide_image[sizes][slideshow]; ?>'); background-size: cover;">
						<a href="<?php the_sub_field('slide_link'); ?>">										
							<?php if(get_sub_field('slide_description')): ?>
								<div class="flex-caption">
									<h1 class="white">
										<?php the_sub_field('slide_description'); ?>
									</h1>
								</div>	
							<?php endif; ?>												
						</a>
					</li>	
									
			<?php endwhile; ?>	 
		
		</ul>	
		
		<div class="flexslider-full-controls"></div> 		
		
		<?php endif; ?>
		<div id="next-about" class="flexslider-full-direction next flex-next">
			<span class="icon" data-icon="&#8212;"></span>
		</div>			

		<div class="section-footer bg-gray">
			<a href="#about" class="jump">
				<h4>learn more</h4>
				<span class="icon" data-icon="&rdquo;"></span>
			</a>
		</div>
		
	</section>
	
	<div class="homefix"></div>
	
<div id="about-intro" class="bg-brand block loading padded hidden">

	<div class="container">
		<div class="row">
			<div class="col-sm-10 col-sm-offset-1">
				<h1 class=""><?php the_field('about_page_introduction','option'); ?></h1>
			</div>
		</div>	
	</div>

</div>	

<section class="loading block bg-gradient padded fixed-nav-container" id="about">

	<div class="container">

		<div class="row">
		
			<div class="col-sm-3 page-nav fixed-nav" id="about-nav">
					<ul>
						<li><a href="#about_about"class="jump-about active">About</a></li>
						<li><a href="#about_people"class="jump-about hidden">People</a></li>
						<li><a href="#about_clients"class="jump-about hidden">Clients</a></li>
						<li><a href="#about_awards"class="jump-about">Awards</a></li>
						<li><a href="#about_publications"class="jump-about">Publications</a></li>
						<li><a href="#about_jobs"class="jump-about">Jobs</a></li>						
						<li><a href="#about_contact"class="jump-about">Contact</a></li>
					</ul>
			</div>	
			
			<div class="col-sm-9 col-sm-offset-3" id="about-content">
				<div class="page-content about">
					
					<section class="about-section" id="about_about">
						<h3 class="section-heading bg-brand">About</h3>						
						<h3 class="section-intro"><?php the_field('about_introduction','option'); ?></h3>						
						<div class="section-body row">
							<div class="col-sm-8">
								<p class="text"><?php the_field('about_body','option'); ?></p>
							</div>
							<div class="col-sm-3 col-sm-offset-1">
								<p><?php the_field('contact_info','option'); ?></p>
							</div>							
						</div>
					</section>	
					
					<section class="about-section hidden" id="about_people">
						<h3 class="section-heading bg-brand">People</h3>						
						<h3 class="section-intro"><?php the_field('people_introduction','option'); ?></h3>						
						<div class="section-body row">
							<?php the_field('people_introduction_image','option'); ?>				
						</div>
					</section>	

					<section class="about-section hidden" id="about_clients">
						<h3 class="section-heading bg-brand">Clients</h3>						
						<h3 class="section-intro"><?php the_field('clients_introduction','option'); ?></h3>						
						<div class="section-body row">
							<?php the_field('clients_body','option'); ?>				
						</div>
					</section>	

					<section class="about-section" id="about_awards">
						<h3 class="section-heading bg-brand">Awards</h3>						
						<h3 class="section-intro"><?php the_field('awards_introduction','option'); ?></h3>						
						<div class="section-body row">
							<div class="col-sm-10">
								<ul class="awards-list">
									<?php 
									$ac = 1;
									while(has_sub_field('awards','option')): 
									?>
										<li class="<?php if($ac >= 9): echo 'awards-trim '; endif; ?>"><span class="bold"><?php the_sub_field('award_year','option'); ?> </span> <?php the_sub_field('award_description','option'); ?></li>
									<?php 
									$ac = $ac+1;
									endwhile; ?>
								</ul>
								<?php if($ac >= 9):  ?>
									<a href="#" id="awards-expand" class="bg-brand">show all awards +</a>
								<?php endif; ?>
							</div>					
						</div>
					</section>	
					
					<section class="about-section" id="about_publications">
						<h3 class="section-heading bg-brand">Publications</h3>						
						<h3 class="section-intro"><?php the_field('publications_introduction','option'); ?></h3>						
						<div class="section-body row">
							<div class="col-sm-12">						
								<ul>
									<?php while(has_sub_field('publications','option')): ?>
										<li class="col-sm-3 col-xs-4"><?php $slide_image_2 = get_sub_field('publication_image','option'); ?>
											<?php if(get_sub_field('publication_link')): ?>
												<a href="<?php the_sub_field('publication_link','option'); ?>" target="_blank">
											<?php endif; ?>
									
											<img src="<?php echo $slide_image_2[sizes][publications]; ?>" alt="publication">
											<p><?php the_sub_field('publication_title','option'); ?></p>
											<?php if(get_sub_field('publication_link')): ?>
												</a>
											<?php endif; ?>
																														
											</li>
									<?php endwhile; ?>
								</ul>	
							</div>			
						</div>
					</section>	
					
					<section class="about-section" id="about_jobs">
						<h3 class="section-heading bg-brand">Jobs</h3>						
						<h3 class="section-intro"><?php the_field('jobs_introduction','option'); ?></h3>						
						<div class="section-body row">
							<ul class="col-sm-12">
								<?php while(has_sub_field('jobs','option')): ?>
									<li>
										<p><?php the_sub_field('job_title','option'); ?></p>
										<p><?php the_sub_field('job_description','option'); ?>
										<?php if(get_sub_field('job_link')): ?>
											<a href="<?php the_sub_field('job_link','option'); ?>" target="_blank" class="bold">More Info</a>
										<?php endif; ?>
									</li>
								<?php endwhile; ?>
							</ul>			
						</div>
					</section>

					<section class="about-section" id="about_contact">
						<h3 class="section-heading bg-brand">Contact</h3>						
						<div class="section-body row">
							<div class="col-sm-8">
								<h3><?php the_field('contact_introduction','option'); ?></h3>
							</div>
							<div class="col-sm-3 col-sm-offset-1">
								<p><?php the_field('contact_info_2','option'); ?></p>
							</div>								
						</div>
					</section>																	
								
				</div>
			</div>		
										
		</div>
		
	</div>	
		
</section>	

<section id="callout-firm" class="block callout min-small loading">
	
<?php $background_image_2 = get_field('callout_2_background_image','option'); ?>
<section id="callout-clients" class="block callout min padded" style="background-image: url('<?php echo $background_image_2[sizes][slideshow]; ?>')">	
	
	<div class="callout-overlay dark"></div>	
	
	<div class="container">
		<div class="row">	
			<div class="callout-text">
				<h1><?php the_field('callout_2_text','option'); ?></h1>
			</div>
		</div>
	</div>
	
</section>		


<?php endwhile; ?>

<?php get_footer();?>
