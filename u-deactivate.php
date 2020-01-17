<?php
    include('h-dbconnection.php');
    include('session.php');
    $option = trim($_POST['doption']);
    $userID = $_SESSION['userID'];
    $userID = mysqli_real_escape_string($conn, $userID);

    if ($option == 'Save Nothing') {
        $result = mysqli_query($conn, "DELETE FROM joke WHERE userID = '$userID'");
        if ($conn->error) {
            echo "Error: " . $sql . "<br>" . $conn->error . "<br / >";
            $conn->close();
            die();
        }
        $result = mysqli_query($conn, "DELETE FROM jokeRating WHERE userID = '$userID'");
        if ($conn->error) {
            echo "Error: " . $sql . "<br>" . $conn->error . "<br / >";
            $conn->close();
            die();
        }
        $result = mysqli_query($conn, "UPDATE participant SET active = 0, countryID = 0, ageID = 0, eduID = 0, genderID = 0 WHERE userID = '$userID'");
        if ($conn->error) {
            echo "Error: " . $sql . "<br>" . $conn->error . "<br / >";
            $conn->close();
            die();
        }
    }elseif ($option == 'Save Everything'){
        $result = mysqli_query($conn, "UPDATE participant SET active = 0 WHERE userID = '$userID'");
        if ($conn->error) {
            echo "Error: " . $sql . "<br>" . $conn->error . "<br / >";
            $conn->close();
            die();
        }
    }
    // Unset all of the session variables
    unset($_SESSION['adusername']);
    unset($_SESSION['userID']);
    unset($_SESSION['username']);
    unset($_SESSION['age']);
    unset($_SESSION['country']);
    unset($_SESSION['education']);
    unset($_SESSION['gender']);

    // Destroy the session.
    session_destroy();
    echo "Thank you for participating in our survey!";

?>