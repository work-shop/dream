// preprocessor.js
// dream

/*


	.dream
		.dream-header
		.dream-body
			.dream-gallery
			.dream-text
		.dream-footer




*/


$(document).on("ready", function() {
	
	var innerTextObjects = function( element, object ) {
		var html = "";
		var tagname = "q";
		var text = element.text();
		var letters = [];

		for ( var i = 0; i < text.length; i++ ) {
			if ( !(/\s/.test( text[ i ] )) ) {
				html += "<" + tagname + ">" + text[ i ] + "</"+tagname+">";
			}
		}

		element.html( html );
		element.children.each( function( i,d ) ) { letters.push( $( d ) ); }
		object.lettering.push( letters );


	};

	var segregate = function( element, object ) {
		var targets = [[elem: 'img', name: 'images'], 
		 			   [elem: 'p', name:'paragraphs', additional: innerTextObjects], 
		 			   [elem: 'em', name:'emphasized', additional: innerTextObjects], 
		 			   [elem: 'a', name: 'links', additional: innerTextObjects]];

		for ( var i in targets ) {
			element.children( targets[ i ].elem ).each( function( _,d ) {
				if ( targets[ i ].additional != undefined ) {
					targets[ i ].additional( $( d ), object );
				}
				object[ targets[ i ].name ].push( $( d ) );
				
			});
		}

		return object;


	};


	$(document).trigger('preprocessed', [ 
		segregate( $( ".dream-body" ), {
			paragraphs: [],
			emphasized: []
			images: [],
			links: [],
			lettering: []
		} ) 
	]);
});










