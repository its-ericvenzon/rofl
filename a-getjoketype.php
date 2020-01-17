<?php

    include ('h-dbconnection.php');

	$tb = trim($_SESSION['table']);
	$id = $_GET['id'];
	
    $sql = "SELECT joketype FROM joketype WHERE jTypeID = '$id'";
    $result = $conn->query($sql);

    if ($conn->error) {
        echo "Error: " . $sql . "<br>" . $conn->error. "<br / >";
        $conn->close();
        die();
    }

    while($row = mysqli_fetch_array($result) ){
        $jtype = $row['joketype'];
        echo $jtype;
    }
	mysqli_close($conn);
?>