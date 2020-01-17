<?php
session_unset();
include ('h-dbconnection.php');

$un = trim($_POST['un']);
//prevent sql injections
$un = mysqli_real_escape_string($conn, $un);
$pwd = mysqli_real_escape_string($conn, $_POST['pwd']);

$sql = "SELECT * FROM participant WHERE username='$un'";
$result = $conn->query($sql);
if ($conn->error) {
    echo "Error: " . $sql . "<br>" . $conn->error. "<br / >";
    $conn->close();
    die();
}

$record = mysqli_fetch_assoc($result);
$count = mysqli_num_rows($result);
$passhash = $record['passhash'];

if(password_verify($pwd, $passhash)){
    if ($record['active'] == 0){
        echo "Account Inactive. Please contact an Admin to reactivate your account.";
        $conn->close();
        die();
    }else {
        $age = $record['ageID'];
        $countryID = $record['countryID'];
        $eduID = $record['eduID'];
        $genderID = $record['genderID'];
        //retrieve and assign demographics to variables
        $ageResult = $conn->query("SELECT ageRange FROM age WHERE ageID='$age'");
        $ageRecord = mysqli_fetch_assoc($ageResult);
        $ageRange = $ageRecord['ageRange'];
        $countryResult = $conn->query("SELECT country FROM country WHERE countryID='$countryID'");
        $countryRecord = mysqli_fetch_assoc($countryResult);
        $country = $countryRecord['country'];
        $eduResult = $conn->query("SELECT education FROM education WHERE eduID='$eduID'");
        $eduRecord = mysqli_fetch_assoc($eduResult);
        $edu = $eduRecord['education'];
        $genderResult = $conn->query("SELECT gender FROM gender WHERE genderID='$genderID'");
        $genderRecord = mysqli_fetch_assoc($genderResult);
        $gender = $genderRecord['gender'];
        //start session
        session_start();
        $_SESSION['userID'] = $record['userID'];
        $_SESSION['username'] = $record['username'];
        $_SESSION['age'] = $ageRange;
        $_SESSION['country'] = $country;
        $_SESSION['education'] = $edu;
        $_SESSION['gender'] = $gender;
        echo "Successful Login";
        $conn->close();
        die();
    }
}else {
    echo "Your Login Name or Password is Invalid.";
    $conn->close();
    die();
}

?>