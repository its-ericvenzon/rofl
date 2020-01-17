<?php		
	session_start();
	include('h-dbconnection.php');
	
		$tb = trim($_SESSION['table']);
		$id = $_POST['adminID'];
		
		$un = $_POST['un'];
		$pwd = $_POST['pwd'];
		$email = $_POST['email'];
		
		$options = ['cost' => 10];
		$password = password_hash($pwd, PASSWORD_DEFAULT, $options);
		
		$sql = "UPDATE $tb SET adusername= '$un', ademail= '$email', adpass= '$password' WHERE adminID = '$id'";
			
		if (mysqli_query($conn, $sql)) {
		echo "Record successfully Updated";
		header("refresh:2; url=a-mod-data.html");
		} else {
		echo "Error deleting record: " . mysqli_error($conn);
		}
?>