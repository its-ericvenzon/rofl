<?php		
	session_start();
	include('h-dbconnection.php');
	
		$tb = trim($_SESSION['table']);
		$id = $_GET['jTypeID'];
		$jtype = $_POST['joketype'];
		
		$sql = "UPDATE $tb SET joketype= '$jtype' WHERE jTypeID = '$id'";
			
		if (mysqli_query($conn, $sql)) {
		echo "Record successfully Updated";
		header("refresh:2; url=a-mod-data.html");
		} else {
		echo "Error deleting record: " . mysqli_error($conn);
		}
?>