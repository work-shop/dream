<?php
  /*
   * single-interactions.php
   * dream
   */
?>

<?php get_header(); ?>

<?php 

if(get_field('dream')){
	$dream_id = get_field('dream');
}
else{
	$dream_id = 57;
}

?>

<div class="dream">

		<div class="dream-header">
		
			<div class="title">
				<h2><?php echo get_the_title($dream_id); ?></h2>
			</div>
			
			<div class="metadata">
						
				<?php if(get_field('dream_length',$dream_id)): ?>
				<div class="author">
					<h3><?php the_field('dream_length',$dream_id); ?> words</h3>
				</div>
				<?php endif; ?>
				
				<?php if(get_field('dream_author',$dream_id)): ?>
				<div class="author">
					<h3><?php the_field('dream_author',$dream_id); ?></h3>
				</div>
				<?php endif; ?>
				
				<?php if(get_field('dream_date',$dream_id)): ?>
				<div class="date">
					<h3><?php the_field('dream_date',$dream_id); ?></h3>
				</div>
				<?php endif; ?>
										
				<?php if(get_field('dream_number',$dream_id)): ?>
				<div class="number">
					<h3>No. <?php the_field('dream_number',$dream_id); ?></h3>
				</div>
				<?php endif; ?>		
				
			</div>
		
		</div>
		
		<div class="dream-body">
		
			<?php 
			$images = get_field('dream_gallery',$dream_id);
			if( $images ): ?>
					
			<div class="dream-gallery <?php if(count($images) > 1): echo 'multiple'; endif; ?>">
					<ul class="dream-images">
					
						<li class="dream-image">
							<?php foreach( $images as $image ): ?>
							 <img src="<?php echo $image['url']; ?>" alt="<?php echo $image['alt']; ?>" />
							 <?php endforeach; ?>
						</li>
					
					</ul>
				
				</div>	
					
			</div>					
					
			<?php endif; ?>
			
			<div class="dream-text">
				<div class="container">
					<div class="row">			
				
						<div class="dream-text-inner serif italic col-md-6 col-md-offset-3 col-sm-8 col-sm-offset-2">
							<?php the_field('dream_text',$dream_id); ?>
						</div>
						
					</div>				
				</div>
			</div>
			
			
		</div>
		
		<div class="dream-footer">
	
		
		</div>
		
</div>



<?php get_footer(); ?>
