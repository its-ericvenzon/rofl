<?php		
	include('h-dbconnection.php');
	
		$tb = trim($_SESSION['table']);
		$id = $_GET['id'];
			
	$sql = "SELECT jokeDesc FROM $tb WHERE jokeID ='$id'";
	$result = $conn->query($sql);
	
	if ($conn->error) {
    echo "Error: " . $sql . "<br>" . $conn->error. "<br / >";
    $conn->close();
    die();
}

while($row = mysqli_fetch_array($result)){
    $jokeDesc = $row['jokeDesc'];
	echo $jokeDesc;
    
}

mysqli_close($conn);

?>