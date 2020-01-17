<?php
include ('h-dbconnection.php');

$sql = "select * FROM notitime";
$result = $conn->query($sql);

if ($conn->error) {
    echo "Error: " . $sql . "<br>" . $conn->error. "<br / >";
    $conn->close();
    die();
}

while( $row = mysqli_fetch_array($result) ){
    $time = $row['timeName'];
    echo "<a class='dropdown-item' role='presentation' href='#'>" .  $time . "</a>";
}
?>