<!DOCTYPE html>
<html>
<?php
require_once("db.php");
include 'data.php';
$sql = "SELECT * FROM monuments";
$result = mysqli_query($con,$sql);
?>
    <head>
      <title>Monumental Anxiety</title>
      <meta name="viewport" content="initial-scale=1.0">
      <meta charset="utf-8">
    </head>

    <link rel="stylesheet" href="style.css">
    
<body>
    <div class="nav-header">
      <div class="list-of-monuments">
        <h2><a href="listOfMonuments.php">Monument list</a></h2>
      </div>
      <div class="page-title">
        <h1><a href="homepage.php">Monumental Anxiety</a></h1>
      </div>
    </div>

    <div class="monument-list" style="overflow-y:auto;">
            <table>
                <tr>
                    <th>Monuments on Map</th>
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
                        <td><?php echo $row["monument_name"]; ?></td>
                        </tr>
                        <?php
                            $i++;
                    }
                ?>
            </table>
    </div>
</body>
</html>