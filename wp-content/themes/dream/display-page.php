<?php 
$display_post = get_field('display_form','option'); 
$display_id = $display_post->ID;
$form = get_field('form_to_display',$display_id);
$form_id = $form->id;
$post_id = $display_id;
?>

		<?php
			$entries = RGFormsModel::get_leads($form_id,$star); ?>
			<div class="flexslider" id="display">
				<ul class="entry-list slides">	
					<?php
					$count = 1;
					foreach($entries as $entry){ 
						
						if($entry[is_starred] == 1){
						
							//print_r($entry);
							
							$name = $entry[2];
							$date_created = $entry[date_created]; 
							$date = date_format($date_created, 'F d, Y');						
							
							$form_category = $entry[10];
							switch($form_category){
							
								case 'text':
									
									break;					
							
								case 'image':
									
									break;
		
								case 'text-and-image':
										
									break;												
							
								case 'text-or-image':
									
									if($entry[6] == 'Written Response'){
										$entry_content = $entry[7];
										$entry_content_type = 'text-only text';
									}
									else{
										$entry_content = '<img src="' . $entry[8] . '" alt="image">';		
										$entry_content_type = 'image-only image';		
									}
									 
									break;	
									
								case 'text-and-or-image':
									
									break;													
							
								case 'video':
									
									break;
									
								default:
									echo 'unrecognized category';
									break;
									
							}
						?>
						<li class="panel panel-default entry <?php echo $form_category . ' ' . $entry_content_type; ?>" id="entry-<?php echo $count; ?>">	
							<div class="panel-border panel-border-top"></div>
							<div class="panel-heading">
								<h5 class="panel-title">
									<?php echo 	'entry_id: ' . $entry[id] . ' &nbsp; &nbsp; entry_content_type: ' . $entry_content_type;	?> 		
								</h5>
							</div>					
							<div class="panel-body entry-content">
								<?php echo $entry_content; ?>
							</div>
							<div class="panel-footer">
								Posted by <?php echo $name . ' on ' . $date_created; ?>
							</div>					
							<div class="panel-border panel-border-bottom"></div>							
							<?php //print_r($entry); ?>
						</li>				
				<?php } else {}
				$count++;
				} ?>
				</ul>	
			</div>	
