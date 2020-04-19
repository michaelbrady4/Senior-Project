<?php
require_once("db.php");
include 'data.php';
?>
<html>
<head>
<title>Add New Monument</title>
<link rel="stylesheet" type="text/css" href="styles.css" />
</head>
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
</body></html>