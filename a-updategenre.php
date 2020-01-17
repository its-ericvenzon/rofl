<?php		
	session_start();
	include('h-dbconnection.php');
	
		$tb = trim($_SESSION['table']);
		
		$id = $_POST['genreID'];
		$genre = $_POST['genre'];
		
		$sql = "UPDATE $tb SET genre = '$genre' WHERE genreID = $id";
	
		if (mysqli_query($conn, $sql)) {
		echo "Record successfully updated";
		header("refresh:2; url=a-mod-data.html");
		} else {
		echo "Error update record: " . mysqli_error($conn);
		}
?>