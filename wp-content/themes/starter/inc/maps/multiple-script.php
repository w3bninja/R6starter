<script type="text/javascript" src="https://maps.googleapis.com/maps/api/js?key=AIzaSyD9P25HJahbIQQkRrminWGhk2A49Dw-z5w"></script>
<script>
	
window.addEventListener('DOMContentLoaded', function() {
	(function($) {
            
        
	// *
	// * Add multiple markers
	// * 2013 - en.marnoto.com
	// *

	// necessary variables
	var map;
	var infoWindow;


	<?php 
	if (empty($pageCount)) {
		$pageCount = 100;
	}
	 ?>
		var $mapOverlay = 'https://sansabaroyalty.com/wp-content/themes/sansaba/mapData5.kml';
	// markersData variable stores the information necessary to each marker	http://www.no5w.com/CQxCountyOverlays-DL.php
	var markersData = [
	<?php 
		$args = array( 'post_type' => 'locations', 'posts_per_page' => $pageCount );
		$loop = new WP_Query( $args );
		while ( $loop->have_posts() ) : $loop->the_post();
			$locationAddress1 	= get_cfc_field('location-group', 'location-address-1', $post->ID );
			$locationAddress2 	= get_cfc_field('location-group', 'location-address-2', $post->ID );
			$locationCity 		= get_cfc_field('location-group', 'location-city', $post->ID );
			$locationZip 		= get_cfc_field('location-group', 'location-postal-code', $post->ID );
			$locationLat = get_cfc_field('location-group', 'location-latitude', $post->ID );
			$locationLong = get_cfc_field('location-group', 'location-longitude', $post->ID );
			$fullAddress = $locationAddress1 . ', ' . $locationCity . ', ' . $locationState . ', ' . $locationZip;


			$prepAddr 	= strtolower(str_replace(' ', '+', str_replace(',', '', $fullAddress)));
			$geocode	= file_get_contents('https://maps.google.com/maps/api/geocode/json?address='.$prepAddr.'&sensor=false?key=' . $mapAPI . '');
			$output		= json_decode($geocode, true);
			$latitude 	= $output->results[0]->geometry->location->lat;
			$longitude 	= $output->results[0]->geometry->location->lng;
			if(empty($longitude)){
				if(empty($locationLong)){
					$longitude = 0;
				}else{$longitude = $locationLong;}
			}
			if(empty($latitude)){
				if(empty($locationLat)){
					$latitude = 0;
				}else{$latitude = $locationLat;}
			}
		?>
		{
			lat: <?php echo $latitude; ?>,
			lng: <?php echo $longitude; ?>,
			name: "<?php echo get_the_title(); ?>",
			address1:"<?php echo $locationAddress1; ?><?php echo $locationAddress2; ?>",
			address2: "<?php echo $locationCity; ?>,<?php echo $locationState; ?>",
			postalCode: "<?php echo $locationZip; ?>"
		},
		<?php endwhile; ?>
	];


	function initialize() {

		var mapOptions = {
			center: new google.maps.LatLng(37.2774965,-101.9949621),
			zoom: 5,
			maxZoom: 10,
			minZoom: 3,
			mapTypeId: 'hybrid',
			disableDefaultUI: true,
			zoomControl: true,
    		scaleControl: true,
			styles: [
				{
					featureType: "road",
					stylers: [
							 {visibility: "off"}
					]
				},
				{
					featureType: "all",
					elementType: "labels",
					stylers: [
						{ visibility: "off" }
					]
				},
				{
					featureType: "administrative.province",
					elementType: "geometry.stroke",
					stylers: [
						{ visibility: "on" },
						{ weight: 2 },
						{ color: "#FFFFFF" }
					]
				}
			]
			<?php /*?>styles: <?php include(locate_template('inc/maps/custom/map-style.php')); ?><?php */?>
		};




	   map = new google.maps.Map(document.getElementById('map-canvas'), mapOptions);

		var ctaLayer = new google.maps.KmlLayer({
		  url: $mapOverlay,
		  map: map
		});

	   // a new Info Window is created
	   infoWindow = new google.maps.InfoWindow();

	   // Event that closes the Info Window with a click on the map
	   google.maps.event.addListener(map, 'click', function() {
		  infoWindow.close();
	   });

	   // Finally displayMarkers() function is called to begin the markers creation
	   displayMarkers();
	}

	google.maps.event.addDomListener(window, 'load', initialize);



	// This function will iterate over markersData array
	// creating markers with createMarker function
	function displayMarkers(){

	   // this variable sets the map bounds according to markers position
	   var bounds = new google.maps.LatLngBounds();

	   // for loop traverses markersData array calling createMarker function for each marker 
	   for (var i = 0; i < markersData.length; i++){

		  var latlng = new google.maps.LatLng(markersData[i].lat, markersData[i].lng);
		  var name = markersData[i].name;
		  var address1 = markersData[i].address1;
		  var address2 = markersData[i].address2;
		  var postalCode = markersData[i].postalCode;


		  createMarker(latlng, name, address1, address2, postalCode);

		  // marker position is added to bounds variable
		  bounds.extend(latlng);  
	   }

	   // Finally the bounds variable is used to set the map bounds
	   // with fitBounds() function
	   map.fitBounds(bounds);

	}

	// This function creates each marker and it sets their Info Window content
	function createMarker(latlng, name, address1, address2, postalCode){


	   var marker = new google.maps.Marker({
		  map: map,
		  position: latlng,
		  title: name,
		  icon: '<?php bloginfo( 'template_url' ); ?>/assets/img/map-pin.png'
	   });

	   // This event expects a click on a marker
	   // When this event is fired the Info Window content is created
	   // and the Info Window is opened.
	   
		if ($(window).width() >= 1024){
			google.maps.event.addListener(marker, 'mouseover', function() {

			  // Creating the content to be inserted in the infowindow
			  var iwContent = '<div id="iw_container">' +
					'<div class="iw_title">' + name + '</div>' +
				 '<div class="iw_content">' + address1 +
				 address2 + '</div></div>';

			  // including content to the Info Window.
			  infoWindow.setContent(iwContent);

			  // opening the Info Window in the current map and at the current marker location.
			  infoWindow.open(map, marker);

		   });
			google.maps.event.addListener(marker, 'mouseout', function() {
				  infoWindow.close();
			   });
		}else{
			google.maps.event.addListener(marker, 'click', function() {

			  // Creating the content to be inserted in the infowindow
			  var iwContent = '<div id="iw_container">' +
					'<div class="iw_title">' + name + '</div>' +
				 '<div class="iw_content">' + address1 +
				 address2 + '</div></div>';

			  // including content to the Info Window.
			  infoWindow.setContent(iwContent);

			  // opening the Info Window in the current map and at the current marker location.
			  infoWindow.open(map, marker);

		   });
		}

	}
	})(jQuery);
});
</script>