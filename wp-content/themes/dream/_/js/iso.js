
$(function(){

    var $container = $('#grid');

	$container.isotope({
	  masonry: {
	    columnWidth: 140 }
	});

	  $.Isotope.prototype._masonryResizeChanged = function() {
		 return true;
	};

  $.Isotope.prototype._masonryReset = function() {
    // layout-specific props
    this.masonry = {};
    this._getSegments();
    var i = this.masonry.cols;
    this.masonry.colYs = [];
    while (i--) {
      this.masonry.colYs.push( 0 );
    }


  };

var $optionSets = $('.option-set #options'),
  $optionLinks = $optionSets.children(':not(.exclude)');

$optionLinks.click(function(){
var $this = $(this);
// don't proceed if already selected
if ( $this.hasClass('selected') ) {
  return false;
}
var $optionSet = $this.parents('.option-set');
$optionSet.find('.selected').removeClass('selected');
$this.addClass('selected');

var container = $( "#grid" );

container.isotope({ filter: $(this).attr("data-option-value") });

	pos = container.offset();

     $('body,html').animate({
	     scrollTop: pos.top - 100
	}, 1000);		

// make option object dynamically, i.e. { filter: '.my-filter-class' }
var options = {},
    key = $optionSet.attr('data-option-key'),
    value = $this.attr('data-option-value');
// parse 'false' as false boolean
value = value === 'false' ? false : value;
options[ key ] = value;
if ( key === 'layoutMode' && typeof changeLayoutMode === 'function' ) {
  // changes in layout modes need extra logic
  changeLayoutMode( $this, options )



} else {
  // otherwise, apply new options
  $container.isotope( options );
}

return false;
});

});