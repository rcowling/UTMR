<!doctype html>

<html lang="en">
<head>
<meta charset='utf-8' />
    <title>UTMR Map Box</title>
    <meta name='viewport' content='initial-scale=1,maximum-scale=1,user-scalable=no' />

<script src='https://api.mapbox.com/mapbox-gl-js/v0.47.0/mapbox-gl.js'></script>
<link href='https://api.mapbox.com/mapbox-gl-js/v0.47.0/mapbox-gl.css' rel='stylesheet' />

     <style>
        body { margin:0; padding:0; }
        #map { position:absolute; top:0; bottom:0; width:100%; }
		.marker {
		  background-image: url('mapbox-icon.png');
		  background-size: cover;
		  width: 50px;
		  height: 50px;
		  border-radius: 50%;
		  cursor: pointer;
		}
		.mapboxgl-popup {
		  max-width: 200px;
		}

		.mapboxgl-popup-content {
		  text-align: center;
		  font-family: 'Open Sans', sans-serif;
		}
		.ui-button {
		  background:#3887BE;
		  color:#FFF;
		  display:block;
		  position:absolute;
		  top:50%;left:50%;
		  width:160px;
		  margin:-20px 0 0 -80px;
		  z-index:100;
		  text-align:center;
		  padding:10px;
		  border:1px solid rgba(0,0,0,0.4);
		  border-radius:3px;
		  }
		  .ui-button:hover {
		    background:#3074a4;
		    color:#fff;
		    }
			
    </style>

</head>

<body>
<div id='map' ></div>
</body>
<script>

	mapboxgl.accessToken = 'pk.eyJ1IjoidXRtciIsImEiOiJjams1MTFtN3Ewb3MyM3FteGNmd3h0ejh2In0.6QwIGhuiXVJRv_XOl-KhxA';

	var map = new mapboxgl.Map({
			container: 'map',
			style: 'mapbox://styles/mapbox/outdoors-v9',
			zoom: 13,
			center: [7.838355,46.195098]
	});
	
	var geolocate = new mapboxgl.GeolocateControl();
	map.addControl(geolocate);
	map.addControl(new mapboxgl.FullscreenControl());
	// Add zoom and rotation controls to the map.
	map.addControl(new mapboxgl.NavigationControl());
	
	geolocate.on('geolocate', function(e) {
	  console.log(e);
	  map.locate();
	});
	
	var geojson = {
	  type: 'FeatureCollection',
	  features: [{
	    type: 'Feature',
	    geometry: {
	      type: 'Point',
	      coordinates: [17.8381435,46.195479]
	    },
	    properties: {
	      title: 'Start',
	      description: 'Grächen'
	    }
	  },
	  {
	    type: 'Feature',
	    geometry: {
	      type: 'Point',
	      coordinates: [7.82981,46.167054]
	    },
	    properties: {
	      title: 'Mapbox',
	      description: 'San Francisco, California'
	    }
	  }]
	};

// add markers to map
geojson.features.forEach( function(marker) {
	  // create a HTML element for each feature
	  var el = document.createElement('div');
	  el.className = 'marker';

	  // make a marker for each feature and add to the map
	new mapboxgl.Marker(el)
	  .setLngLat(marker.geometry.coordinates)
	  .setPopup(new mapboxgl.Popup({ offset: 25 }) // add popups
	  .setHTML('<h3>' + marker.properties.title + '</h3><p>' + marker.properties.description + '</p>'))
	  .addTo(map);
});




map.on('load', function () {
	

	

		
});


</script>
</html>