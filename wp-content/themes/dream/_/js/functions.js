var hh = 60;
var scrollOffset = 60;
var minSmallOffset = 240;
var cw,ch,bh,dh,ch2;
var headerState = false;
var headerState2 = true;
loaded = false;
opening = false;

jQuery(document).ready(function($) {

	view(); 
	
	$('#backtotop').click(function(event) {
	  	event.preventDefault();
		$('body,html').animate({scrollTop:0},2000);
	});


	$('#nav-toggle').click(function(event) {
	  	event.preventDefault();
		navToggle();
	});
	
	//m for menu
	$(document).keypress(function(e) {
		if(e.which == 109) {
			navToggle();
		}	
	});
	
	//h for header
	$(document).keypress(function(e) {
		if(e.which == 104) {
			headerToggle();
		}	
	});	
	
	$(".jump").click(function(e){
		e.preventDefault();
		var thelink = $(this).attr("href");
		thelink = thelink.toLowerCase();
		goToByScroll(thelink);	

	});


	$('.flip-link').click(function(event) {
	  	event.preventDefault();
	  	id = $(this).attr('href');
		blockToggle(id,$(this));		
	});	
	
	$('.close-icon').click(function(event) {
	  	event.preventDefault();

	  	if($('body').hasClass('block-closed')){
			$('body').removeClass('block-closed').addClass('block-open');	
		}	  	
		else if($('body').hasClass('block-open')){
			$('body').removeClass('block-open').addClass('block-closed');	
		}	  			
	  	
		$('.block.open').removeClass('open').addClass('closed');
		$('.flip-link.on').removeClass('on').addClass('off');					  			
	});	
	

});//end document.ready


$(window).load(function() {


});//end window.load



$(window).ready(function() {


});//end window.ready



$(window).resize(function() {

	view();	
	
});//end window.resize


$(window).scroll(function(e) { 

	view(); 


});//end window.scroll


function goToByScroll(locale){
	$('html,body').animate({
		scrollTop: $(locale).offset().top - 0
	},2000);
}

function blockToggle(_id,_this){

	if(!toggling){

		var toggling=true;
	
		if($(_id).hasClass('closed')){
			$('body').removeClass('block-closed').addClass('block-open');							
			$('.block.open').removeClass('open').addClass('closed');	
			$('.flip-link.on').removeClass('on').addClass('off');		
			$(_this).addClass('on').removeClass('off');	
			$(_id).addClass('open').removeClass('closed');
		}
		else if($(_id).hasClass('open')){
			$('body').removeClass('block-open').addClass('block-closed');					
			$('.flip-link.on').removeClass('on').addClass('off');			
			$(_this).addClass('off').removeClass('on');		
			$(_id).addClass('closed').removeClass('open');
		}
		
		setTimeout(function(){toggling=false},1000);
		
	}	

}


function navToggle() {

	if(!headerState2){
		$('#header').removeClass('hidden');
		$('#header').addClass('visible');
		headerState2 = true;	
	}	
	
	if(!headerState){
		$('#header').removeClass('closed');
		$('#header').addClass('open');
		$('body').removeClass('header-closed');
		$('body').addClass('header-open');	
		$('#blanket').addClass('on');

		headerState = true;
		
	}
	else if (headerState) {
		$('#header').removeClass('open');
		$('#header').addClass('closed');
		$('body').removeClass('header-open');
		$('body').addClass('header-closed');
		$('#blanket').removeClass('on');
		headerState = false;
									
	}
	
}


function headerToggle() {
	if(!headerState2){
		$('#header').removeClass('hidden');
		$('#header').addClass('visible');
		headerState2 = true;
		
	}
	else if (headerState2) {
		$('#header').removeClass('visible');
		$('#header').addClass('hidden');
		headerState2 = false;							
	}
	
}


function view(){
		
	ch = $(window).height();
	cw = $(window).width();
	
	$(".block.crop").css('min-height',ch);
	
	if(!loaded){
		loadElements();
	}
			
}


function spy(){
	var menu = $('#about-nav .jump-about');
	var targets = new Array();
	
	//an array with [i][0] = menu item and [i][1] = scroll item
	menu.each(function(i){
		targets[i] = new Array(2);
		var temp = $(this).attr('href');
		var offset = $(temp).offset();	
		targets[i][0] = $(this);		
		targets[i][1] = offset.top;
	});
	
	for(var j = 0; j < targets.length; j++){
		if(($(window).scrollTop()+250) >= targets[j][1]){
			menu.removeClass('active');
			targets[j][0].addClass('active');
		}
	}	
	
}

function loadElements(){
	loaded = true;
	setTimeout(function(){
		$('.loading').addClass('loaded');
		$('.landing').addClass('landed');
		view();
	},1000);		
		
}

