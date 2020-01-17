<?php
    $email = trim($_POST['em']);
    $mess = trim($_POST['message']);
    include ('h-dbconnection.php');

    $email = mysqli_real_escape_string($conn, $email);
    $message = mysqli_real_escape_string($conn, $mess);

    $sql = "INSERT into inquiry(inqEmail, inqMessage) 
                    VALUES ('$email', '$message')";
    $conn->query($sql);

    if ($conn->error) {
        echo "Error: " . $sql . "<br>" . $conn->error. "<br / >";
        $conn->close();
        die();
    }else{
        echo "Message Sent. Thank you for Contacting Us.";
        $conn->close();
        die();
    }
?>