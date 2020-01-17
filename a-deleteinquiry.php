<?php

include('h-dbconnection.php');

	$id = $_GET['id'];
	$sql = "DELETE FROM inquiry WHERE inqID = $id";
	if (mysqli_query($conn, $sql)) {
	header("refresh:2; url=a-inquiries.html");
 	readfile("loader.html");
	} else {
    echo "Error deleting record: " . mysqli_error($conn);
		}
		
	?>