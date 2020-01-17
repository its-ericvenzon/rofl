<?php		
	session_start();
	include('h-dbconnection.php');
	
		$tb = trim($_SESSION['table']);
		$id = $_POST['jokeID'];
		
		$jokedesc = mysqli_real_escape_string($conn, $_POST['jokedesc']);
		$nsfc = $_POST['nsfc'];
		$joketype = $_POST['joketype'];
		
		$sql = "UPDATE $tb SET jokeDesc= '$jokedesc', nsfc= '$nsfc', jTypeID = (SELECT jTypeID FROM joketype WHERE joketype = '$joketype') WHERE jokeID = '$id'";
			
		if (mysqli_query($conn, $sql)) {
		echo "Record successfully Updated";
		header("refresh:2; url=a-ujoke.html");
		} else {
		echo "Error deleting record: " . mysqli_error($conn);
		}
?>