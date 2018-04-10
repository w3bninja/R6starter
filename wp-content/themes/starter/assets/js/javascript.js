// Developer: Adam Culpepper & Aaron Landry
// Firm: Envoc (envoc.com)
//set items container to full screen width
$.fn.inlineFull = function() {
	set = $(this);
	set.each(function() {
	//set items container to full screen width
		$(this).wrap("<div class='inline-full-container'></div>");
		$(this).wrap("<div class='inline-full-container-inner'></div>");
		$(this).parent().parent().outerHeight($(this).parent().outerHeight(true));
	});
	$(window).bind("load", function() {
		setTimeout(function(){
		  set.each(function() {
				$(this).parent().parent().outerHeight($(this).parent().outerHeight(true));
			});
		}, 1000);
	});
  	$(window).resize(function() {
		set.each(function() {
			$(this).parent().parent().outerHeight($(this).parent().outerHeight(true));
		});
  	});
};



$(function () {
	
	var $container = $('#iso');
  
	$container.isotope();
	
	
	$('.iso-item').load(function(){
		$('.iso-set').isotope({
		  itemSelector: '.iso-item'
		});
		// layout Isotope again after all images have loaded
		$container.imagesLoaded( function() {
		  $container.isotope('layout');
		});
	});
  // store filter for each group
  var filters = {};

  $('.iso-filters').on( 'click', '.button', function() {
    var $this = $(this);
    // get group key
    var $buttonGroup = $this.parents('.button-group');
    var filterGroup = $buttonGroup.attr('data-filter-group');
    // set filter for group
    filters[ filterGroup ] = $this.attr('data-filter');
    // combine filters
    var filterValue = '';
    for ( var prop in filters ) {
      filterValue += filters[ prop ];
    }
    // set filter for Isotope
    $container.isotope({ filter: filterValue });
  });



  // change is-checked class on buttons
  $('.button-group').each( function( i, buttonGroup ) {
    var $buttonGroup = $( buttonGroup );
    $buttonGroup.on( 'click', '.button', function() {
      	$buttonGroup.find('.is-checked').removeClass('is-checked');
      	$( this ).addClass('is-checked');
    });
  });
	

	
	
	
	
	
	
	
	
	$('.inline-full').inlineFull();
	
	window.location.origin || (window.location.origin = window.location.protocol + '//' + window.location.host);
	window.app = {};
	var url = app.url = (location.href); //Cached for heavy general use

	//Navigation helper
    $(".navigation-inner ul li").hover(function(){
        $(this).addClass("hover");
        $('ul:first',this).css('visibility', 'visible');
    }, function(){
        $(this).removeClass("hover");
        $('ul:first',this).css('visibility', 'hidden');
    });
	
	// Sticky Element - Sticks the element to the top of the site
	$(".sticky").wrap("<div class='sticky-container'></div>");
	$(".sticky").wrap("<div class='sticky-container-inner'></div>");
	$(window).on('scroll', function () {
		var scrollTop	= $(window).scrollTop(),
		elementOffset	= $('.sticky-container').offset().top,
		distance		= (elementOffset - scrollTop);
		$(".sticky-container").height($(".sticky-container-inner").height());
		if(distance < 0){
			$('.sticky-container-inner').addClass('container-fixed');
		} else {
			$('.sticky-container-inner').removeClass('container-fixed');
		}
	});
	
	// PARALLAX
	if ($('.parallax').length > 0) {
		$('.parallax').parallax();
	}
	
	// SMOOTH SCROLL
	if ($('.scroll').length > 0) {
		$(".scroll").on("click", function(event){
			 event.preventDefault();
			 //calculate destination place
			 var dest=0;
			 var destOffset = 0;
			 if($(this.hash).offset().top > $(document).height()-$(window).height()){
				  dest=$(document).height()-$(window).height();
			 }else{
				  dest=$(this.hash).offset().top;
			 }
			 //go to destination
			 $('html,body').animate({scrollTop:dest-destOffset}, 1000,'swing');
		 });
	 }
	
	
	// LAYOUT
	
	// Headers
	$('.page-header-inner').appendTo( $('.page-header') );
	// Sidebars
	 $('.sidebar-section').wrapAll('<div class="col-md-3 sidebar"/>');
	$('.sidebar-section').appendTo($('.sidebar-inner'));
	$('.sidebar').appendTo( $('.content-inner') );
	
	if ($('.sidebar').length > 0) { 
		$('.content-col').wrapAll('<div class="col-md-9"/>');
	}

	
	//Masonry Grid
	var $grid = $('.grid').imagesLoaded( function() {
	  // init Masonry after all images have loaded
	  $grid.masonry({
		itemSelector: '.item'
	  });
	});
	
	//Auto Adust Height Grid
	var $gridbox = $('.grid-box').imagesLoaded( function() {
	  $gridbox.each(function(){  
			 var $columns = $('.item',this);
			 var maxHeight = Math.max.apply(Math, $columns.map(function(){
				 return $(this).height();
			 }).get());
			 $columns.height(maxHeight);
		});
	});

	//Push Navigation Menu
	$('.toggle-menu').jPushMenu({
		closeOnClickLink   : false,
		closeOnClickOutside: true
	});
	
	// responsive Tabs
	$('.responsiveTabs').responsiveTabs({
		rotate: false,
		startCollapsed:	'accordion',
		collapsible: 	'accordion',
		setHash: 		true,
		active:			0,
		scrollToAccordion: true
	});
	

});


 window.alert = function(msg) {
	msg = msg.replace('ERROR: ','');
	$('body').append('<div class="msg text-center"></div>')
	$('.msg').text(msg);
	$('.msg').fadeIn().delay(5000).fadeOut();
	$('.msg').prepend('<i class="fa fa-warning"></i>')
 }

$(document).ready(function() {
	//$("body").css("display", "none");
//	$("body").fadeIn(1000); 
//	$('a').click(function(e){
//		redirect = $(this).attr('href');
//		e.preventDefault();
//		$('body').fadeOut(400, function(){
//			document.location.href = redirect
//		});
//	});
	
	
	$('.pager .slide1').addClass('active');
	$('.cycle-slideshow').on('cycle-after', function(e, opts) {
		var current = opts.slideNum;
		var previous = current - 1;
		$('.pager a').removeClass('active');
		$('.pager .slide' + current).addClass('active');
	});
	
	if ($('.nav-accordion').length > 0) {
		$(".nav-accordion li:has(ul li)").find("a:first").addClass("subs");
		$( "<i class='fa fa-angle-down'></i>" ).appendTo( ".nav-accordion .subs" );
		$('.nav-accordion .subs i').on("click",function(e){
			e.preventDefault();
			$(this).parent().parent().find('ul:first').toggle();
		});
	}
	
    $("img").error(function(){
        $(this).remove();
    });
	
	$(".fancy").fancybox({
		maxWidth	: 800,
		maxHeight	: 600,
		fitToView	: true,
		width		: '70%',
		height		: '70%',
		autoSize	: true,
		closeClick	: false,
		openEffect	: 'none',
		closeEffect	: 'none'
	});
	$(".fancy.ajax").fancybox({type: 'ajax'});
	$(".various").fancybox({
		maxWidth	: 800,
		maxHeight	: 600,
		fitToView	: false,
		width		: '70%',
		height		: '70%',
		autoSize	: true,
		closeClick	: false,
		openEffect	: 'none',
		closeEffect	: 'none',
		padding		: 0,
		margin		: 0
	});
	$(".signin-box").fancybox({
		maxWidth	: 800,
		maxHeight	: 600,
		fitToView	: false,
		width		: '70%',
		height		: '70%',
		autoSize	: true,
		closeClick	: false,
		openEffect	: 'none',
		closeEffect	: 'none',
		padding		: 0,
		margin		: 0
	});
	
	var offset = 220;
    var duration = 500;
    jQuery(window).on("scroll",function() {
        if (jQuery(this).scrollTop() > offset) {
            jQuery('.back-to-top').fadeIn(duration);
        } else {
            jQuery('.back-to-top').fadeOut(duration);
        }
    });
    
    jQuery('.back-to-top').on("click",function(event) {
        event.preventDefault();
        jQuery('html, body').animate({scrollTop: 0}, duration);
        return false;
    });
});

