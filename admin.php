<!DOCTYPE html>
<html>

<?php
include 'data.php';
?>
    <head>
        <title>Admin: Monumental Anxiety</title>
        <meta name="viewport" content="initial-scale=1.0">
        <meta charset="utf-8">
    </head>

    <link rel="stylesheet" href="admin_page_style.css">

<body>
    <div class="container">
        <form action="" id="signupForm">
            <label for="monument_name">Name of the monument</label>
            <input type="text" id="monument_name" name="monument_name" placeholder="Name">

            <label for="latitude">Latitude</label>
            <input type="text" id="latitude" name="latitude" placeholder="Latitude">

            <label for="longitude">Longitude</label>
            <input type="text" id="longitude" name="longitude" placeholder="Longitude">

            <label for="monument_description">Description</label>
            <input type="text" id="monument_description" name="monument_description" placeholder="Description">

            <label for="monument_picture">Picture file name (image1.png)</label>
            <input type="text" id="monument_picture" name="monument_picture" placeholder="image1.png">

            <input type="submit" value="Submit" >
        </form>
    </div>
    <div id="map" class='map'></div>

    <script src='https://api.tiles.mapbox.com/mapbox-gl-js/v0.48.0/mapbox-gl.js'></script>
    <link href='https://api.tiles.mapbox.com/mapbox-gl-js/v0.48.0/mapbox-gl.css' rel='stylesheet' />

    <script src='https://api.mapbox.com/mapbox-gl-js/plugins/mapbox-gl-geocoder/v2.3.0/mapbox-gl-geocoder.min.js'></script>
    <link rel='stylesheet' href='https://api.mapbox.com/mapbox-gl-js/plugins/mapbox-gl-geocoder/v2.3.0/mapbox-gl-geocoder.css' type='text/css' />

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>

    <script>
        var geojson = <?= get_monument_attributes() ?>;
        var user_location = [-77.0369, 38.9072];

        // sets up map
        mapboxgl.accessToken = 'pk.eyJ1IjoiZmFraHJhd3kiLCJhIjoiY2pscWs4OTNrMmd5ZTNra21iZmRvdTFkOCJ9.15TZ2NtGk_AtUvLd27-8xA';
        var map = new mapboxgl.Map({
            container: 'map',
            style: 'mapbox://styles/mapbox/light-v10',
            center: user_location,
            zoom: 11
        });

        var marker ;

        // loads map on the page
        map.on('load', function() {
            add_markers();
        });

        // adds markers to map
        function add_markers(coordinates) {
            geojson.forEach(function (marker) {
                // make a marker for each feature and add to the map
                new mapboxgl.Marker()
                    .setLngLat([marker.longitude,marker.latitude])
                    .addTo(map);
            });

        }

        // passes information typed in to the database
        $('#signupForm').submit(function(event){
            event.preventDefault();
            //var name = $('#name').val(); 
            var monument_name = $('#monument_name').val();
            var latitude = $('#latitude').val();
            var longitude = $('#longitude').val();
            var monument_description = $('#monument_description').val();
            var monument_picture = $('#monument_picture').val();
            var url = 'data.php?add_location&monument_name=' + monument_name + '&latitude=' + latitude + '&longitude=' + longitude + '&monument_description=' + monument_description + '&monument_picture=' + monument_picture;
            $.ajax({
                url: url,
                method: 'GET',
                dataType: 'json',
                success: function(data){
                    alert(data);
                    location.reload();
                }
            });
        });
    </script>
</body>
</html>