<?php		
	session_start();
	include('h-dbconnection.php');
	
		$tb = trim($_SESSION['table']);
	
		$country = $_POST['country'];
		
		$sql = "INSERT into $tb (country) VALUES('$country')";
					
		if (mysqli_query($conn, $sql)) {
		echo "Record successfully inserted";
		header("refresh:2; url=a-mod-data.html");
		} else {
		echo "Error deleting record: " . mysqli_error($conn);
		}
?>