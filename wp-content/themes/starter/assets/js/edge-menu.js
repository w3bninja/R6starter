jQuery.fn.edgeMenu = function(menu,direction,startPosition,full,push){
	var $menu = menu || '.edge-menu';
	var $direction = direction || 'left';
	var $startPosition = startPosition || 'closed';
	var $full = full || false;
	var $push = push || false;
	var $set = $(this);
	if($push){
		$('body').addClass('push-' + $direction); //Add push direction( top/left/right/bottom ) to body
	}
	$($menu).addClass($direction); //Add direction( top/left/right/bottom ) to menu
	if($full){
		// Use Full Menu Layout
		$($menu).addClass('full');
	}
	$('body').addClass($startPosition); //Add starting position( open/closed ) to menu
	$($menu).addClass($startPosition);	//Add starting position( open/closed ) to body

	// Add touch to close
	$(document).on('click', function(e){
		if ( $(e.target).is('.edge-control, .edge-control *') ) { 
			// Add touch to close to control
			e.preventDefault();
			$($menu + ', body').toggleClass('open closed');
		}else if($(e.target).is($menu + ', ' + $menu + ' *')){ 
			// Dont close if menu is clicked
		}else{
			// Close when outside of menu is clicked
			$($menu + ', body').removeClass('open');
			$($menu + ', body').addClass('closed');
		}
	});

	// JQUERY TOUCH, SWIPE
	
	if($(window).width() <= 800){
		var handler = function (e) {
			if(e == 'up'){
				var $swipeDirection = 'top';
			}else if(e == 'down'){
				var $swipeDirection = 'bottom';
			}else{
				var $swipeDirection = e;
			}
			$($menu + '.' + $swipeDirection + ', body.push-' + $swipeDirection).addClass('closed');
			$($menu + '.' + $swipeDirection + ', body.push-' + $swipeDirection).removeClass('open');
		};
		$("body").swipe(handler);
	}
};