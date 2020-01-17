<?php		
	session_start();
	include('h-dbconnection.php');
	
		$tb = trim($_SESSION['table']);
		$tb = mysqli_real_escape_string($conn, $tb);
		$id = $_POST['userID'];	
		$active = $_POST['active'];
		$age = $_POST['age'];
		$country = $_POST['country'];
		$edu = $_POST['education'];
		$gender = $_POST['gender'];
		
		
		$sql = "UPDATE $tb SET active= '$active', countryID = (SELECT countryID FROM country WHERE country = '$country'), 
                ageID = (SELECT ageID FROM age WHERE ageRange = '$age'), eduID = (SELECT eduID FROM education WHERE education = '$edu'), 
                genderID = (SELECT genderID FROM gender WHERE gender = '$gender') WHERE userID = '$id'";
		
		//echo $sql;
		if (mysqli_query($conn, $sql)) {
		echo "Record successfully Updated";
		header("refresh:2; url=a-mod-data.html");
		} else {
		echo "Error deleting record: " . mysqli_error($conn);
		} 
?>