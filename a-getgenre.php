<?php

    include ('h-dbconnection.php');

	$tb = trim($_SESSION['table']);
	$id = $_GET['id'];
	
    $sql = "SELECT genre FROM genre WHERE genreID = '$id'";
    $result = $conn->query($sql);

    if ($conn->error) {
        echo "Error: " . $sql . "<br>" . $conn->error. "<br / >";
        $conn->close();
        die();
    }

    while($row = mysqli_fetch_array($result) ){
        $genre = $row['genre'];
        echo $genre;
    }
	mysqli_close($conn);
?>