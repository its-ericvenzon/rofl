<?php
	session_start();
    include ('h-dbconnection.php');

	$userID = mysqli_real_escape_string($conn, $_SESSION['userID']);
	
    $jokeID = trim($_POST['jokeID']);
	$jokeID = mysqli_real_escape_string($conn, $jokeID);

	$rating = $_POST['rating'];

    $sql = "UPDATE joke SET rateNUM = (SELECT COUNT(*) FROM jokerating WHERE jokeID ='$jokeID')";
    $conn->query($sql);

    $sql = "INSERT into jokerating(userID, rating, jokeID) 
                VALUES ($userID, $rating, $jokeID)";
    $conn->query($sql);

    if ($conn->error) {
        echo "Error: " . $sql . "<br>" . $conn->error. "<br / >";
        $conn->close();
    }else{
        $conn->close();
        header("Refresh:0");
        echo "Rate Submission Successful. Thank you!";
    }
?>