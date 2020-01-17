<?php
    include ('h-dbconnection.php');

    $un = mysqli_real_escape_string($conn, $_POST['un']);
    $pwd = $_POST['pwd'];
    $cpwd = $_POST['cpwd'];

    $options = ['cost' => 10];
    $password = password_hash($pwd, PASSWORD_DEFAULT, $options);
    $password = mysqli_real_escape_string($conn, $password);

    $sql = "UPDATE participant SET token='', passhash='$password' WHERE username = '$un'";
    $conn->query($sql);

    if ($conn->error) {
        echo "Error: " . $sql . "<br>" . $conn->error. "<br / >";
        $conn->close();
        die();
    }

    $conn->close();
    die();
