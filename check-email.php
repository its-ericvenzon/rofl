<?php
/**
 * Created by PhpStorm.
 * User: DNam
 * Date: 3/16/2018
 * Time: 2:38 AM
 */


if(isset($_POST["email"]))
{
    include ('h-dbconnection.php');

    $email = filter_var($_POST["email"], FILTER_SANITIZE_STRING, FILTER_FLAG_STRIP_LOW|FILTER_FLAG_STRIP_HIGH);

    $statement = $conn->prepare("SELECT email FROM participant WHERE email=?");
    $statement->bind_param('s', $email);
    $statement->execute();
    $statement->bind_result($email);
    if (strlen($email)<=5){
        die('Email is Too Short');
    }elseif($statement->fetch()){
        die('Email in Use');
    }else{
        die('Email is Available');
    }
}
?>
