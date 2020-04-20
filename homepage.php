<!DOCTYPE html>
<html>
<?php
include 'data.php';
?>
    <head>
      <title>Home: Monumental Anxiety</title>
      <meta name="viewport" content="initial-scale=1.0">
      <meta charset="utf-8">
    </head>

    <link rel="stylesheet" href="style.css">
    
<body>
    <div class="nav-header">
      <div class="list-of-monuments">
        <h2><a href="listOfMonuments.html">Monument list</a></h2>
      </div>
      <div class="page-title">
        <h1><a href="homepage.php">Monumental Anxiety</a></h1>
      </div>
    </div>
    <div class='sidebar'>
      <h1 id="location-title">Welcome</h1>
      <p id="sidebar-text">
        Cultural Capital is a concept associated with the French sociologist Pierre Bourdieu.  Put most succinctly, it refers to the concrete social habits that embody cultural mastery, and that can be picked up or dropped depending on a person’s desire to identify (or not) within a given group.  From holding up a pinkie while drinking one’s tea to knowing how to do the wave at a sports game to one motorcycle rider discreetly waving with the left hand to another coming in the opposite direction, the habits of culture are how we learn to identify ourselves and belong to larger groups.  Who exactly taught us to smile for the camera and stand in front of the monument?  But people acquainted with the social habits of the West do it no almost matter who they are, and how well- (or ill-) represented they may feel about the place in question.
      </p>
      <p id="instruct"><b>Using the map</b></p>
      <p>
        Click once on a monument marker on the map to see a short excerpt of information about that specific monument. Click twice on it to see the full information on it.
      </p>
      <img src="homepage.jpg" alt="homepage image"/>
    </div>
    <div id='sidebar-monument'></div>
    <div id='map' class='map'></div>

    <script src='https://api.tiles.mapbox.com/mapbox-gl-js/v0.48.0/mapbox-gl.js'></script>
    <link href='https://api.tiles.mapbox.com/mapbox-gl-js/v0.48.0/mapbox-gl.css' rel='stylesheet' />

    <script src='https://api.mapbox.com/mapbox-gl-js/plugins/mapbox-gl-geocoder/v2.3.0/mapbox-gl-geocoder.min.js'></script>
    <link rel='stylesheet' href='https://api.mapbox.com/mapbox-gl-js/plugins/mapbox-gl-geocoder/v2.3.0/mapbox-gl-geocoder.css' type='text/css' />

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>

    <script>
        //var marker;
        var user_location = [-77.0369, 38.9072];
        var geojson = <?= get_monument_attributes() ?>;

        // sets up map
        mapboxgl.accessToken = 'pk.eyJ1IjoiZmFraHJhd3kiLCJhIjoiY2pscWs4OTNrMmd5ZTNra21iZmRvdTFkOCJ9.15TZ2NtGk_AtUvLd27-8xA';
        var map = new mapboxgl.Map({
            container: 'map',
            style: 'mapbox://styles/mapbox/light-v10',
            center: user_location,
            zoom: 12,
            scrollZoom: true
        });

        // adds navigation tools in the top-left
        var nav = new mapboxgl.NavigationControl();
        map.addControl(nav, 'top-left');
        
        // loads map on the page
        map.on('load', function() {
            add_markers();
        });

        // add markers to map
        function add_markers() {
            
            geojson.forEach(function (marker) {
                var el = document.createElement('div');

                el.className = 'marker';
                new mapboxgl.Marker(el, { offset: [0, -23] })
                    .setLngLat([marker.longitude,marker.latitude])
                    .addTo(map);

                // changes color of clicked marker
                $('.marker').click(function(){
                    $('.marker.lastclicked').removeClass('lastclicked');
                    $(this).addClass('lastclicked');
                }) 

                el.addEventListener('click', () => {
                    //alert(marker); //this works to show what coordinates you click
                    var location = [marker.longitude,marker.latitude]; // location equals the coordinates you click
                    //alert(location);
                    map.flyTo({
                        center: location,
                        zoom: 12.5
                    }); 

                    var sidebarInfo = document.getElementById("sidebar-monument");
                    sidebarInfo.innerHTML = '<h1 id="location-title">' + marker.monument_name + '</h1>' + 
                        '<img id="sidebar-image" src="./monument_data/' + marker.monument_picture + '"/>' +
                        /*'<h3 id="monument-address">' + currentFeature.properties.address + '</h3>' + */
                        '<p id="monument-sidebar-text">' + marker.monument_description + '</p>';/* +
                        '<br /><br />' +
                        '<a id="b-button" href="">More information</a>'; */
                    sidebarInfo.style.display = "block";
                });
            });
        }
    </script>
</body>
</html>