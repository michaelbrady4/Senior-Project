<?php
require_once("db.php");
if(count($_POST)>0) {
	$sql = "UPDATE monuments set monument_name='" . $_POST["monument_name"] . "', monument_description='" . $_POST["monument_description"] . "', latitude='" . $_POST["latitude"] . "', longitude='" . $_POST["longitude"] . "', monument_picture='" . $_POST["monument_picture"] . "' WHERE monument_id='" . $_POST["monument_id"] . "'";
	mysqli_query($con,$sql);
	$message = "Record Modified Successfully";
}
$select_query = "SELECT * FROM monuments WHERE monument_id='" . $_GET["monument_id"] . "'";
$result = mysqli_query($con,$select_query);
$row = mysqli_fetch_array($result);
?>
<html>
<head>
<title>Add New Monument</title>
<link rel="stylesheet" type="text/css" href="styles.css" />
</head>
<body>
<form name="frmUser" method="post" action="">
<div style="width:500px;">
<div class="message"><?php if(isset($message)) { echo $message; } ?></div>
<div align="right" style="padding-bottom:5px;"><a href="admin.php" class="link"><img alt='List' title='List' src='images/list.png' width='15px' height='15px'/> List Monument</a></div>
<table border="0" cellpadding="10" cellspacing="0" width="500" align="center" class="tblSaveForm">
<tr class="tableheader">
<td colspan="2">Edit Monument</td>
</tr>
<tr>
<td><label>Name</label></td>
<td><input type="hidden" name="monument_id" class="txtField" value="<?php echo $row['monument_id']; ?>"><input type="text" name="monument_name" class="txtField" value="<?php echo $row['monument_name']; ?>"></td>
</tr>
<tr>
<td><label>Description</label></td>
<td><input type="text" name="monument_description" class="txtField" value="<?php echo $row['monument_description']; ?>"></td>
</tr>
<td><label>Latitude</label></td>
<td><input type="text" name="latitude" class="txtField" value="<?php echo $row['latitude']; ?>"></td>
</tr>
<td><label>Longitude</label></td>
<td><input type="text" name="longitude" class="txtField" value="<?php echo $row['longitude']; ?>"></td>
</tr>
</tr>
<td><label>Image (image1.png)</label></td>
<td><input type="text" name="monument_picture" class="txtField" value="<?php echo $row['monument_picture']; ?>"></td>
</tr>
<tr>
<td colspan="2"><input type="submit" name="submit" value="Submit" class="btnSubmit"></td>
</tr>
</table>
</div>
</form>
</body></html>