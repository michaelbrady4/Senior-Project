<?php
require("db.php");

// Gets data from URL parameters.
if(isset($_GET['add_location'])) {
    add_location();
}

function add_location(){
    $con=mysqli_connect ("localhost", 'root', '','monumental_anxiety');
    if (!$con) {
        die('Not connected : ' . mysqli_connect_error());
    }
    $monument_name = $_GET['monument_name'];
    $latitude = $_GET['latitude'];
    $longitude = $_GET['longitude'];
    $monument_description = $_GET['monument_description'];
    $monument_picture = $_GET['monument_picture'];

    // Inserts new row with place data.
    $query = sprintf("INSERT INTO monuments " .
        " (monument_id, monument_name, latitude, longitude, monument_description, monument_picture) " .
        " VALUES (NULL, '%s', '%s', '%s', '%s', '%s');",
        mysqli_real_escape_string($con,$monument_name),
        mysqli_real_escape_string($con,$latitude),
        mysqli_real_escape_string($con,$longitude),
        mysqli_real_escape_string($con,$monument_description),
        mysqli_real_escape_string($con,$monument_picture));

    $result = mysqli_query($con,$query);
    echo json_encode("Inserted Successfully");
    if (!$result) {
        die('Invalid query: ' . mysqli_error($con));
    }
}

function get_monument_attributes(){
    $con=mysqli_connect ("localhost", 'root', '','monumental_anxiety');
    if (!$con) {
        die('Not connected : ' . mysqli_connect_error());
    }
    // update location with location_status if admin location_status.
    $sqldata = mysqli_query($con,"select monument_name,latitude,longitude,monument_description,monument_picture from monuments ");

    $rows = array();
    while($r = mysqli_fetch_assoc($sqldata)) {
        $rows[] = $r;

    }
    $indexed = array_map('array_values', $rows);

    $array = array_filter($indexed);

    //$string=json_encode($indexed);
    $string=json_encode($rows);

    //echo gettype($string); // string
    echo $string; //[{"name":"Albert Pike Statue","de":"This is a test"},{"name":"Washington Monument","de":"*Washington Monument description goes here"}]
    //print_r($rows); //Array ( [0] => Array ( [name] => Albert Pike Statue [de] => This is a test ) [1] => Array ( [name] => Washington Monument [de] => *Washington Monument description goes here ))

    if (!$rows) {
        return null;
    }
}

?>