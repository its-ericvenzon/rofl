<?php		
	session_start();
	include('h-dbconnection.php');
	
		$tb = trim($_SESSION['table']);
		$un = $_POST['un'];
		$pwd = $_POST['pwd'];
		$email = $_POST['email'];
		
		$options = ['cost' => 10];
		$password = password_hash($pwd, PASSWORD_DEFAULT, $options);
		
		$sql = "INSERT into $tb (adusername, ademail, adpass) VALUES('$un', '$email', '$password')";
			
		if (mysqli_query($conn, $sql)) {
		echo "Record successfully inserted";
		header("refresh:2; url=a-mod-data.html");
		} else {
		echo "Error deleting record: " . mysqli_error($conn);
		}
?>