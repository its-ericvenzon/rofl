<?php
    if(isset($_POST["username"]))
    {
        include ('h-dbconnection.php');

        $username = filter_var($_POST["username"], FILTER_SANITIZE_STRING, FILTER_FLAG_STRIP_LOW|FILTER_FLAG_STRIP_HIGH);

        $statement = $conn->prepare("SELECT adusername FROM admin WHERE adusername=?");
        $statement->bind_param('s', $username);
        $statement->execute();
        $statement->bind_result($username);
		if($statement->fetch()){
            die('Not Available');
        }else{
            die('Available');
        }
    }
?>
