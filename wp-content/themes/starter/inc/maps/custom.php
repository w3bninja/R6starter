 <style type="text/css">
            /* Set a size for our map container, the Google Map will take up 100% of this container */
            #map {
                width: 100%;
                height: 500px;
            }
        </style>
        
        <!-- 
            You need to include this script tag on any page that has a Google Map.
            The following script tag will work when opening this example locally on your computer.
            But if you use this on a localhost server or a live website you will need to include an API key. 
            Sign up for one here (it's free for small usage): 
                https://developers.google.com/maps/documentation/javascript/tutorial#api_key
            After you sign up, use the following script tag with YOUR_GOOGLE_API_KEY replaced with your actual key.
                <script type="text/javascript" src="https://maps.googleapis.com/maps/api/js?key=YOUR_GOOGLE_API_KEY"></script>
        -->
        <script type="text/javascript" src="https://maps.googleapis.com/maps/api/js"></script>
        
        <script type="text/javascript">
		
		var geocoder = new google.maps.Geocoder();
		var address = "<?php echo $fullAddress ?>";
		
		geocoder.geocode( { 'address': address}, function(results, status) {
		
		if (status == google.maps.GeocoderStatus.OK) {
			window.latitude = results[0].geometry.location.lat();
			window.longitude = results[0].geometry.location.lng();
			} 
		}); 
		
		
            // When the window has finished loading create our google map below
            google.maps.event.addDomListener(window, 'load', init);
        
            function init() {
				
				var contentString = '<div id="content">'+
					'<div id="siteNotice">'+
					'</div>'+
					'<h5 id="firstHeading" class="firstHeading">Test Map</h5>'+
					'<div id="bodyContent">'+
					'<p><?php echo $fullAddress ?></p>'+
					'</div>'+
					'</div>';
		
				var infowindow = new google.maps.InfoWindow({
				  content: contentString
				});
				
				
                // Basic options for a simple Google Map
                // For more options see: https://developers.google.com/maps/documentation/javascript/reference#MapOptions
                var mapOptions = {
                    // How zoomed in you want the map to start at (always required)
                    zoom: 11,
                    // The latitude and longitude to center the map (always required)
                    center: new google.maps.LatLng(latitude, longitude), // New York
					scrollwheel: false,
					navigationControl: false,
					mapTypeControl: false,
					scaleControl: false,
					draggable: true,
					disableDefaultUI: true,
                    // How you would like to style the map. 
                    // This is where you would paste any style found on Snazzy Maps.
					
                    styles: <?php include(locate_template('inc/maps/custom/map-style.php')); ?>
					
                };
                // Get the HTML DOM element that will contain your map 
                // We are using a div with id="map" seen below in the <body>
                var mapElement = document.getElementById('map');
                // Create the Google Map using our element and options defined above
                var map = new google.maps.Map(mapElement, mapOptions);
                // Let's also add a marker while we're at it
                var marker = new google.maps.Marker({
                    position: new google.maps.LatLng(latitude, longitude),
                    map: map,
                    title: 'Test Map',
					icon: 'https://maps.google.com/mapfiles/kml/shapes/parking_lot_maps.png'
                });
				marker.addListener('click', function() {
				  infowindow.open(map, marker);
				});
            }
        </script>
        <div id="map"></div>