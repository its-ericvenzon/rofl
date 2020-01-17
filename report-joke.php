<?php
    session_start();
    include ('h-dbconnection.php');

    $jID = $_POST['jokeID'];
    $uID = $_SESSION['userID'];
    $sub = $_POST['subject'];
    $mess = trim($_POST['message']);
    $message = mysqli_real_escape_string($conn, $mess);
    $userID = mysqli_real_escape_string($conn, $uID);
    $jokeID = mysqli_real_escape_string($conn, $jID);
    $subject = mysqli_real_escape_string($conn, $sub);

    $sql = "INSERT into report (userID, repDesc, dateReported, repSubID) 
                        VALUES ('$userID', '$message', now(), (SELECT repSubID FROM repsubject WHERE repSubject = '$subject'))";
    $conn->query($sql);
    if ($conn->error) {
        echo "Error: " . $sql . "<br>" . $conn->error. "<br / >";
        $conn->close();
    }
    //retrieve id of last inserted query
    $reportID = $conn->insert_id;

    $sql = "INSERT into jokereport (jokeID, reportID) 
            VALUES ('$jokeID', '$reportID')";
    $conn->query($sql);

    $sql = "UPDATE joke SET reportNUM = (SELECT COUNT(*) FROM jokereport WHERE jokeID ='$jokeID')";
    $conn->query($sql);
    if ($conn->error) {
        echo "Error: " . $sql . "<br>" . $conn->error. "<br / >";
        $conn->close();
    }else{
        $conn->close();
        header("Refresh:0");
        echo "Message Sent. Thank you for Contacting Us.";

    }

?>