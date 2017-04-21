<!DOCTYPE HTML>
<html>
<head>
<title>Registration</title>
<?php require_once("headincludes.php"); ?>
</head>
<body>
<?php require_once("header.php"); ?>
<!-- content -->
<?php 
	require("config.php");
	$obj=new Task();
?>
<div class="container">
<div class="main">
<br>
  <h4>Polular Searches</h4>
  <div class="row">
    <div class="col-xs-4 col-sm-4 col-md-3" >
        <div class="col-xs-5 row">
          <img class="search-place-img"  onclick="search('hospital')" src="icons/003-first-aid-kit.png" alt="hospital">
        </div>
        <div class="col-xs-6 row">
          <span class="vertical-center">
            <p>Hospital</p>
          </span> 
        </div>
    </div>
    <div class="col-xs-4 col-sm-4 col-md-3">
        <div class="col-xs-5 row">
          <img class="search-place-img" onclick="search('police station')" src="icons/005-police-station.png" alt="police">
        </div>
        <div class="col-xs-6 row">
          <span class="vertical-center">
            <p>Police</p>
          </span> 
        </div>
    </div>
    <div class="col-xs-4 col-sm-4 col-md-3">
        <div class="col-xs-5 row">
          <img class="search-place-img" onclick="search('ATM')"  src="icons/002-atm.png" alt="atm">
        </div>
        <div class="col-xs-6 row">
          <span class="vertical-center">
            <p>ATM</p>
          </span> 
        </div>
    </div>
    
  </div>
<br>
	<div class="form-group">
		<input class="form-control" type="text" id="search" placeholder="Find Places">
	</div>
	<div id="map">
		
	</div>
		
	
</div>
</div>

<!-- footer_top -->
<?php require_once("footer.php"); ?>
<!-- footer -->
</body>
<script async defer src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAnatPJZOH9dh2d0yK-vw2h64o7qhrQaH0&v=3&libraries=places&callback=initMap"></script>
<script type="text/javascript">
var geocoder, map, markers=[];
var searchBounds,searchBox;
function initMap() {
    geocoder = new google.maps.Geocoder();


    geocoder.geocode({
        'address': 'jalandhar, Punjab'
    }, function(results, status) {
        if (status == google.maps.GeocoderStatus.OK) {
            var myOptions = {
                zoom: 13,
                center: results[0].geometry.location,
                mapTypeId: google.maps.MapTypeId.ROADMAP
            }
            map = new google.maps.Map(document.getElementById("map"), myOptions);

            var marker = new google.maps.Marker({
                map: map,
                position: results[0].geometry.location
            });
            searchBounds = map.getBounds();
            markers.push(marker)
        }

      var input = document.getElementById('search');
	    searchBox = new google.maps.places.SearchBox(input);
	    // Bias the SearchBox results towards current map's viewport.
        map.addListener('bounds_changed', function() {
        	if(searchBounds === undefined){
        		searchBounds = map.getBounds();
          		searchBox.setBounds(searchBounds);
        	}
        });
       

        // Listen for the event fired when the user selects a prediction and retrieve
        // more details for that place.
        searchBox.addListener('places_changed', function() {
          searchPlaces();
        });
    });
}	

var search = function (text){
  var input = document.getElementById('search');
  input.value = text;

  google.maps.event.trigger(input, 'focus')
  google.maps.event.trigger(input, 'keydown', {
      keyCode: 13
  });
  
}


function searchPlaces(){
  var places = searchBox.getPlaces();
          if (places.length == 0) {
            return;
          }

          // Clear out the old markers.
          markers.forEach(function(marker) {
            marker.setMap(null);
          });
          markers = [];

          // For each place, get the icon, name and location.
          var bounds = new google.maps.LatLngBounds();
          places.forEach(function(place) {
            if (!place.geometry) {
              console.log("Returned place contains no geometry");
              return;
            }
            var icon = {
              url: place.icon,
              size: new google.maps.Size(71, 71),
              origin: new google.maps.Point(0, 0),
              anchor: new google.maps.Point(17, 34),
              scaledSize: new google.maps.Size(25, 25)
            };

            // Create a marker for each place.
            markers.push(new google.maps.Marker({
              map: map,
              icon: icon,
              title: place.name,
              position: place.geometry.location
            }));

            markers.forEach((marker)=>{
              marker.addListener('click', () => {
                // recenter the map to the marker and zoom
                    map.panTo(marker.getPosition());
                    map.setZoom(18);
              })
            })

            if (place.geometry.viewport) {
              // Only geocodes have viewport.
              bounds.union(place.geometry.viewport);
            } else {
              bounds.extend(place.geometry.location);
            }
          });
          map.fitBounds(searchBounds);
}


</script>
</html>