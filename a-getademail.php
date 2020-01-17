<?php

    include ('h-dbconnection.php');

	$tb = trim($_SESSION['table']);
	$id = $_GET['id'];
	
    $sql = "SELECT ademail FROM admin WHERE adminID = '$id'";
    $result = $conn->query($sql);

    if ($conn->error) {
        echo "Error: " . $sql . "<br>" . $conn->error. "<br / >";
        $conn->close();
        die();
    }

    while($row = mysqli_fetch_array($result) ){
        $ademail = $row['ademail'];
        echo $ademail;
    }
	mysqli_close($conn);
?>