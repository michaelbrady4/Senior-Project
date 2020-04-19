<?php
require_once("db.php");
$sql = "DELETE FROM monuments WHERE monument_id='" . $_GET["monument_id"] . "'";
mysqli_query($con,$sql);
header("Location:admin.php");
?>