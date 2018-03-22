<?php 
	$fromAddress = "Hammond, la";
	$toAddress = $fullAddress;
?>


<style>
.adp-placemark{margin:0; border:0;}
.adp-placemark td{padding:10px 20px;}
.adp-directions td{padding:10px; border-top:1px solid #EEE;}

	
      /* Always set the map height explicitly to define the size of the div
       * element that contains the map. */
      #direction-map {
        height: 100%; min-height:400px;
      }
      #floating-panel {
        z-index: 5;
        background-color: #fff;
        padding: 5px;
        border: 1px solid #999;
        text-align: center;
        font-family: 'Roboto','sans-serif';
        line-height: 30px;
        padding-left: 10px;
      }
      #floating-panel {
        background: #fff;
        padding: 5px;
        font-size: 14px;
        font-family: Arial;
        border: 1px solid #ccc;
        box-shadow: 0 2px 2px rgba(33, 33, 33, 0.4);
        display: none;
      }
      @media print {
        #direction-map {
          height: 500px;
          margin: 0;
        }
        #right-panel {
          float: none;
          width: auto;
        }
      }
    </style>



<i>To get directions to either of our locations, type your starting address in the "From" field then choose the appropriate campus from the drop down menu and click "Get Directions."</i>
	<div id="direction-map"></div>
    <div id="floating-panel">
      <strong>Start:</strong>
      <input id="start" value="<?php $fromAddress ?>">
      <br>
      <strong>End:</strong>
      <input id="end" value="<?php $fromAddress ?>">
	</div>






    
    
	<div id="right-panel"></div>

<script>
      function initMap() {
        var directionsDisplay = new google.maps.DirectionsRenderer;
        var directionsService = new google.maps.DirectionsService;
        var map = new google.maps.Map(document.getElementById('direction-map'), {
          zoom: 7,
          center: {lat: 41.85, lng: -87.65}
        });
        directionsDisplay.setMap(map);
        directionsDisplay.setPanel(document.getElementById('right-panel'));

        var control = document.getElementById('floating-panel');
        control.style.display = 'block';
        //map.controls[google.maps.ControlPosition.TOP_CENTER].push(control);

        var onChangeHandler = function() {
          calculateAndDisplayRoute(directionsService, directionsDisplay);
        };
        document.getElementById('start').addEventListener('change', onChangeHandler);
        document.getElementById('end').addEventListener('change', onChangeHandler);
      }

      function calculateAndDisplayRoute(directionsService, directionsDisplay) {
        var start = document.getElementById('start').value;
        var end = document.getElementById('end').value;
        directionsService.route({
          origin: start,
          destination: end,
          travelMode: 'DRIVING'
        }, function(response, status) {
          if (status === 'OK') {
            directionsDisplay.setDirections(response);
          } else {
            window.alert('Directions request failed due to ' + status);
          }
        });
      }
    </script>
    <script async defer
    src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDJ6EbRZnghJCCKb1yT0OJ41zxxOuORv4I&callback=initMap">
    </script>