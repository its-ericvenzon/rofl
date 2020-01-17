<?php		
	session_start();
	include('h-dbconnection.php');
	
		$tb = trim($_SESSION['table']);
	
		$genre = $_POST['genre'];
		
		$sql = "INSERT into $tb (genre) VALUES('$genre')";
					
		if (mysqli_query($conn, $sql)) {
		echo "Record successfully Inserted";
		header("refresh:2; url=a-mod-data.html");
		} else {
		echo "Error Inserted record: " . mysqli_error($conn);
		}
?>