// template.js
// dream

/*
	for reference, markup structure of an entire dream

	.dream
		.container
			.dream-header
				.title
					<h2>
				.metadata
					.length
						<h3>
					.author
						<h3>
					.date
						<h3>
					.number
						<h3>

			.dream-body
			.dream-footer

*/

/*
	for reference, JSON structure of the dream object

	{
		paragraphs: [jQuery.fn.init]			contains references to all the paragraphs in the content as jQuery objects
		images: [jQuery.fn.init]				contains references to all the image objects in the context as jQuery objects
		emphasized: [jQuery.fn.init]			contains references to all the <em> tags in the content as jQuery objects
		links: [jQuery.fn.init]					contains references to all the <a> tags objects in the context as jQuery objects
		lettering: [jQuery.fn.init]				contains references to all the <q> tags in the content as jQuery objects
												these represent individual letters

		fn: {
	
			random( n : int ) -> int 			returns a random int scaled by n						


		}
	}
	

*/

// wait for the 'preprocessed' event, then execute the interaction,
// parameterized of the event object, and the specific dream object.
$(document).on('preprocessed', function( evt, dream ) {
	var P_ll = 80; // this represents the probable line length, 
				   // which we will use to index the one dimensional array of 
				   // of characters as a 2D array interpreted as the position of the neighbors.

	var O_factor = .9 // this represents the dropoff factor as we drift from the point of click.


	function mk1D( i, j ) { }
	function mk2D( i ) { }


	for ( var i in dream.lettering ) {
		for ( var j in dream.lettering[ i ] ) {
			/*
				## some logic... 
				we have access to both the current object, and its index position in the 
				lettering permutation. we should work off of the 



			*/
			dream.lettering[ i ][ j ].bind( 'click', function( e ) {

				



			});

		}
	}

});






