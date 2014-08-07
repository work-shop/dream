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

	

*/

// wait for the 'preprocessed' event, then execute the interaction,
// parameterized of the event object, and the specific dream object.
$(document).on('preprocessed', function( evt, dream ) {

	// your dream interaction code here...

});
