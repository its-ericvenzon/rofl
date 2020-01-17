<?php
if(isset($_POST["email"]))
{
    include ('h-dbconnection.php');

    $email = filter_var($_POST["email"], FILTER_SANITIZE_STRING, FILTER_FLAG_STRIP_LOW|FILTER_FLAG_STRIP_HIGH);

    $statement = $conn->prepare("SELECT ademail FROM admin WHERE ademail=?");
    $statement->bind_param('s', $email);
    $statement->execute();
    $statement->bind_result($email);
    if($statement->fetch()){
        die('Email in Use');
    }else{
        die('Email is Available');
    }
}
?>
