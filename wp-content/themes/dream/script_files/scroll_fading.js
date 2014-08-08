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
	}
	

*/

// wait for the 'preprocessed' event, then execute the interaction,
// parameterized of the event object, and the specific dream object.
$(document).on('preprocessed', function( evt, dream ) {

	$(document).bind("scroll", function( evt ) {
		/*
			set up some constants
			the minimum opacity, the maximum reassumed opacity,
			and the transition maximum.
		 */
		var min = .1,
			max = 1,
			time = 2000;

		/*
 			select random indices in the set of letters
		 */
		var i_1 = Math.abs( Math.floor( dream.fn.random( dream.lettering.length ) % dream.lettering.length ) );
		var	i_2 = Math.abs( Math.floor( dream.fn.random( dream.lettering[ i_1 ].length ) % dream.lettering[ i_1 ].length ) );


		/*
 			select a random letter in the set based on these indices.
		 */
		var letter = dream.lettering[ i_1 ][ i_2 ];


		/*
			if the letter is fresh, fade it out for a random increment, otherwise
			fade it back in.
		 */
		if ( letter.css( 'opacity' ) > min ) {
			letter.animate( { 'opacity': min }, Math.floor( dream.fn.random( time ) ) );
		} else {
			letter.animate( {'opacity': max }, Math.floor( dream.fn.random( time ) )  );
		}

	});

});






