</div>

<footer id="footer" class="hidden">
	<div class="container">
		<div class="row">
				
		</div>
	</div>
</footer>

	
<?php wp_footer(); ?>

<div id="foot" class="hidden">

	<script type="text/javascript">
	     less.env = "development"; less.watch();
	</script>

	<?php

    	if ( is_single() ) {

    		if ( $file_name = get_field('script_file') ) {

    			echo '<script type="text/javascript" charset="utf-8" lang="javascript" src="'
    			     .get_template_directory_uri().'/_/js/preprocessor.js"></script>';

    			echo '<script type="text/javascript" charset="utf-8" lang="javascript" src="'
    			     . get_template_directory_uri() . '/' . 'script_files/' . $file_name . '"></script>';

    		} else if ( $interaction = get_field('interaction') 
    				    && $file_name = get_field( 'script_file', $interaction->ID ) ) {

    			echo '<script type="text/javascript" charset="utf-8" lang="javascript" src="'
    			     .get_template_directory_uri().'/_/js/preprocessor.js"></script>';
    			     
    			echo '<script type="text/javascript" charset="utf-8" lang="javascript" src="'
    			     . get_template_directory_uri() . '/' . 'script_files/' . $file_name . '"></script>';

    		}

			unset( $interaction );
    		unset( $file_name );

    	}

    ?>

</div>
	
</body>

</html>