// Developer: Aaron Landry

// FUNCTIONS
// Section Sizing
$.fn.sectionSizing = function() {
	if ($('.section').length > 0) {
		var headerHeight = $(".header-top").outerHeight();
		var subheadHeight = $(".sticky-container-inner.container-fixed").outerHeight();
		var headHeight = headerHeight+subheadHeight;
		$(".section").css("min-height", $(window).height()-headHeight + "px");
		$(".max-height").css("max-height", $(window).height() + "px");
		$(".full-height").css("height", $(window).height() + "px");
		$(".parent-height").each(function() {
			$(this).css("height", $(this).parent().height() + "px");
		});
	}
};

$.fn.makeItFit = function() {
	if ($(this).length > 0) {
		$(this).each(function() {
			var set = $(this);
			var video = set.find('.video');
			var play = set.find('.play');
			var pause = set.find('.pause');

			play.on('click', function(){
				video.get(0).play();
				set.addClass('active');
				play.hide();
			});
			pause.on('click', function(){
				video.get(0).pause();
			});
			set.fitVids();
		});
	}
};
$.fn.square = function() {
	if ($(this).length > 0) {
		$(this).each(function() {
			$(this).outerHeight($(this).outerWidth());
		$('.square-sib').siblings().outerHeight($(this).outerHeight());
		});
	}
};

$.fn.slider = function() {
	$(this).slick({
		slidesToShow: 1,
		slidesToScroll: 1,
		dots: true,
		arrows: true,
		fade: false,
		centerPadding: '0px',
		infinite: false,
		prevArrow : $(".prev"),
    	nextArrow : $(".next")
	});
};
$.fn.videoLoader = function() {
	if ($(this).length > 0) {
		if($(window).width() >= 768){
			var sources = document.querySelectorAll('video.video-header source');
			// Define the video object this source is contained inside
			var video = document.querySelector('video.video-header');
			for(var i = 0; i<sources.length;i++) {
			  sources[i].setAttribute('src', sources[i].getAttribute('data-src'));
			}
			// If for some reason we do want to load the video after, for desktop as opposed to mobile (I'd imagine), use videojs API to load
			video.load();
		}
	}
};
$.fn.fancy = function() {
	// Fancybox
	$(this).fancybox({
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
};
$.fn.iso = function() {
// ISOTOPE
	if ($(this).length > 0) { 
		var qsRegex;
		var filters = {};
		var $container = $(this).isotope({
			itemSelector: '.item',
			layoutMode: 'packery',
			percentPosition: true,
			filter: '',
			masonry: {
				// use element for option
				columnWidth: '.grid-sizer'
			  }
		});
		// layout Isotope again after all images have loaded
		$container.imagesLoaded( function() {
			$container.isotope('layout');
		});
		// store filter for each group
		$('.iso-filters').on( 'click', '.button', function() {
			var $this = $(this); // get group key
			var $buttonGroup = $this.parents('.button-group');
			var filterGroup = $buttonGroup.attr('data-filter-group');
			filters[ filterGroup ] = $this.attr('data-filter'); // set filter for group
			var filterValue = '';
			for ( var prop in filters ) { // combine filters
				filterValue += filters[ prop ];
			}
			$container.isotope({ filter: filterValue }); // set filter for Isotope
		});

		// change is-checked class on buttons
		$('.button-group').each( function( i, buttonGroup ) {
			var $buttonGroup = $( buttonGroup );
			$buttonGroup.on( 'click', '.button', function() {
				$buttonGroup.find('.is-checked').removeClass('is-checked');
				$( this ).addClass('is-checked');
			});
		});
	}
	// END ISOTOPE
};


// SMOOTH SCROLL
$.fn.scrollTo = function() {
	if ($(this).length > 0) {
		$(this).on("click", function(event){
			 event.preventDefault();
			 var dest=0;
			 var destOffset = 200;
			 if($(this.hash).offset().top > $(document).height()-$(window).height()){
				  dest=$(document).height()-$(window).height(); //calculate destination place
			 }else{
				  dest=$(this.hash).offset().top; //calculate destination place
			 }
			 //go to destination
			 $('html,body').animate({scrollTop:dest-destOffset}, 1000,'swing');
		 });
	 }
};

//Masonry Grid
$.fn.grid = function() {
	if ($(this).length > 0) { 
		$(this).packery({
			itemSelector: '.item'
		});
	}
};

//Auto Adust Height Grid
$.fn.gridBox = function() {
	if ($(this).length > 0) { 
		var $gridbox = $(this).imagesLoaded( function() {
		  $gridbox.each(function(){  
				 var $columns = $('.item',this);
				 var maxHeight = Math.max.apply(Math, $columns.map(function(){
					 return $(this).height();
				 }).get());
				 $columns.height(maxHeight);
			});
		});
	}
};

$(window).on('scroll', function () {
	
});

$(window).bind("load", function() {
	$('.loader').animate({'opacity': '0'}, 500, function(){
		$(this).css({'display': 'none'});
		$(".bg").animate({'opacity': '1'}, 500);
	});
});




// On Document Ready
$(function () {
	var count = 40;
	var apiToken = '3589406413.139002a.ad07efcee33d49719d3cc655bfb9e7a1';
	var url = 'https://api.instagram.com/v1/users/self/media/recent/?access_token=' + apiToken + '&count=' + count;
	$.ajax({
		type: 'GET',
		url: url,
		success: function(data) {
			for (var i = 0; i < data.data.length; i++) { 
				$('#instagram').append('<div class="item col-sm-3"><img src="'+ data.data[i].images.standard_resolution.url +'" class="img-responsive"></div>');
			}
		},
		error: function() {}
	});
	
	
	// Section Sizing
	$.fn.sectionSizing();
	$(window).resize(function() {
		$.fn.sectionSizing();
	});
	$('.square').square();
	$('.video-container').makeItFit();
	$('.slider').slider();
	$('.grid').grid();
	$('.grid-box').gridBox();
	$('#iso').iso(); // ISOTOPE
	$('.fancy').fancy(); //FANCYBOX
	$('.video-header').videoLoader(); //LOAD VIDEOS
	$('.scroll').scrollTo();
	
	$.fn.edgeMenu('.edge-menu','top','closed',true,false);
	// Menu Click Subitem
	$('.edge-menu .nav a').on('click', function(){
		var clickedURL = $(this).attr('href');
		var clickedURLNoHash = clickedURL.split('#')[0];
		var clickedURLHash = clickedURL.substring(clickedURL.indexOf('#'));
		var currentURL = url.replace(/^.*\/\/[^\/]+/, '');
		var currentURLNoHash = currentURL.split('#')[0];

		$('.edge-menu, body').toggleClass('open closed');

		if(clickedURLHash) {	
			  $('html, body').animate({
				scrollTop: $(clickedURLHash).offset().top//-150
			  }, 1500, 'swing');
		}
		return false;
	});
	
	
	
	
	// NAVIGATION
	
	//Navigation helper
    $(".navigation-inner ul li").hover(function(){
        $(this).addClass("hover");
        $('ul:first',this).css('visibility', 'visible');
    }, function(){
        $(this).removeClass("hover");
        $('ul:first',this).css('visibility', 'hidden');
    });
	
	// Sticky Element - Sticks the element to the top of the site
	$('.stuck').parent().addClass('container-fixed');
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
	
	
	


	// Accordion Navigation
	if ($('.nav-accordion').length > 0) {
		$(".nav-accordion li:has(ul li)").find("a:first").addClass("subs");
		$( "<i class='fa fa-angle-down'></i>" ).appendTo( ".nav-accordion .subs" );
		$('.nav-accordion .subs i').on("click",function(e){
			e.preventDefault();
			$(this).parent().parent().find('ul:first').toggle();
		});
	}
	
	// TOOLS

	
	
	
});

