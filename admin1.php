<?php
require_once("db.php");
include 'data.php';
$sql = "SELECT * FROM monuments";
$result = mysqli_query($con,$sql);
?>
<html>
<head>
	<title>Monuments List</title>
	<link rel="stylesheet" type="text/css" href="admin_page_styles.css" />
</head>
<body>
	<form name="frmUser" method="post" action="">
		<div style="width:500px;">
		<div class="message"><?php if(isset($message)) { echo $message; } ?></div>
		<div align="right" style="padding-bottom:5px;"><a href="add_monument.php" class="link"><img alt='Add' title='Add' src='images/add.png' width='15px' height='15px'/> Add Monument</a></div>
			
			<table border="0" cellpadding="10" cellspacing="1" width="500" class="tblListForm">
				<tr class="listheader">
					<td>ID</td>
					<td>Name</td>
					<td>Description</td>
					<td>Latitude</td>
					<td>Longitude</td>
					<td>Image</td>
					<td>Actions</td>
				</tr>

<?php
	$i=0;
		while($row = mysqli_fetch_array($result)) {
			if($i%2==0)
				$classname="evenRow";
			else
				$classname="oddRow";
?>
				<tr class="<?php if(isset($classname)) echo $classname;?>">
					<td><?php echo $row["monument_id"]; ?></td>
					<td><?php echo $row["monument_name"]; ?></td>
					<td><?php echo $row["monument_description"]; ?></td>
					<td><?php echo $row["latitude"]; ?></td>
					<td><?php echo $row["longitude"]; ?></td>
					<td><?php echo $row["monument_picture"]; ?></td>
					<td><a href="edit_monument.php?monument_id=<?php echo $row["monument_id"]; ?>" class="link"><img alt='Edit' title='Edit' src='images/edit.png' width='15px' height='15px' hspace='10' /></a>  <a href="delete_monument.php?monument_id=<?php echo $row["monument_id"]; ?>"  class="link"><img alt='Delete' title='Delete' src='images/delete.png' width='15px' height='15px'hspace='10' /></a></td>
				</tr>
<?php
	$i++;
}
?>
</table>
</div>
</form>
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
        $('#frmUser').submit(function(event){
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
</table>
</form>
</div>
</body></html>