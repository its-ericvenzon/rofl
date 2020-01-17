<?php

include('h-dbconnection.php');

$sql = "SELECT COUNT(inqID) FROM inquiry";
$result = mysqli_query($conn,$sql);
$rows = mysqli_fetch_row($result);
echo $rows[0];

?>