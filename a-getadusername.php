<?php

    include ('h-dbconnection.php');

	$tb = trim($_SESSION['table']);
	$id = $_GET['id'];
	
    $sql = "SELECT adusername FROM admin WHERE adminID = '$id'";
    $result = $conn->query($sql);

    if ($conn->error) {
        echo "Error: " . $sql . "<br>" . $conn->error. "<br / >";
        $conn->close();
        die();
    }

    while($row = mysqli_fetch_array($result) ){
        $aduser = $row['adusername'];
        echo $aduser;
    }
	mysqli_close($conn);
?>