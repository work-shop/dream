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


});






