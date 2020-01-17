<?php
include ('h-dbconnection.php');

$sql = "SELECT inquiryEmail FROM inquiry";
$result = $conn->query($sql);

if ($conn->error) {
    echo "Error: " . $sql . "<br>" . $conn->error. "<br / >";
    $conn->close();
    die();
}

while($row = mysqli_fetch_array($result)){
    $email = $row['inquiryEmail'];
    echo "<a class='dropdown-item' role='presentation' href='#'>" .  $email . "</a>";
}
?>