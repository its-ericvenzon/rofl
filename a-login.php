<?php
    session_unset();
	include('h-dbconnection.php');

    $un = $_POST['adminID'];
    $un = mysqli_real_escape_string($conn, $un);
    $pw = mysqli_real_escape_string($conn, $_POST['pwd']);

    $sql = "SELECT * FROM admin WHERE adusername = '$un'";
    $result = $conn->query($sql);
    if ($conn->error) {
        echo "Error: " . $sql . "<br>" . $conn->error. "<br / >";
        $conn->close();
        die();
    }
    $record = mysqli_fetch_assoc($result);
    $passhash = $record['adpass'];

    if(password_verify($pw, $passhash)){
        session_start();
        $_SESSION['adminID'] = $record['adminID'];
        $_SESSION['adusername'] = $un;
		
        $_SESSION['table'] = '';
        $_SESSION['entryID'] = '';
		
        echo "Successful Login";
    } else {
        echo "Your Login Name or Password is invalid";
    }
?>