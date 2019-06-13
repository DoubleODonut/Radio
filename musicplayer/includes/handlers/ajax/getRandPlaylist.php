<?php
include ("../../config.php");
 
$query = mysqli_query($con, "SELECT id FROM songs WHERE album = 1 ORDER BY RAND()");

    $resultArray = array();
 
while ($row = mysqli_fetch_array($query)) { 
    array_push($resultArray, $row['id']);
}
 
echo json_encode($resultArray);
 
?>