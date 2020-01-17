<?php

session_start();
include('h-dbconnection.php');

	$tb = trim($_SESSION['table']);
	$id = $_GET['id'];

 if($tb == 'Country'){
	$sql = "DELETE FROM $tb WHERE countryID = $id";
	if (mysqli_query($conn, $sql)) {
	header("refresh:2; url=a-mod-data.html");
	readfile("loader.html");
	} else {
    echo "Error deleting record: " . mysqli_error($conn);
		}
 }
 elseif($tb == 'Admin'){
	$sql = "DELETE FROM $tb WHERE adminID = $id";
	if (mysqli_query($conn, $sql)) {
	header("refresh:2; url=a-mod-data.html");
	readfile("loader.html");
	} else {
    echo "Error deleting record: " . mysqli_error($conn);
		}
 }
 elseif($tb == 'Genre'){
	$sql = "DELETE FROM $tb WHERE genreID = $id";
	if (mysqli_query($conn, $sql)) {
    echo "Record deleted successfully";
	header("refresh:2; url=a-mod-data.html");
	readfile("loader.html");
	} else {
    echo "Error deleting record: " . mysqli_error($conn);
		}
 }
 elseif($tb == 'Joke'){
	$sql = "DELETE FROM $tb WHERE jokeID = $id";
	if (mysqli_query($conn, $sql)) {
	header("refresh:2; url=a-mod-data.html");
	readfile("loader.html");
	} else {
    echo "Error deleting record: " . mysqli_error($conn);
		}
 } 
 elseif($tb == 'Participant'){
	$sql = "DELETE FROM $tb WHERE userID = $id";
	if (mysqli_query($conn, $sql)) {
	header("refresh:2; url=a-mod-data.html");
	readfile("loader.html");
	} else {
    echo "Error deleting record: " . mysqli_error($conn);
		}
 }
  elseif($tb == 'Inquiry'){
	$sql = "DELETE FROM $tb WHERE inquiryID = $id";
	if (mysqli_query($conn, $sql)) {
	header("refresh:2; url=a-mod-data.html");
 	readfile("loader.html");
	} else {
    echo "Error deleting record: " . mysqli_error($conn);
		}
 }
  elseif($tb == 'Report'){
	$sql = "DELETE FROM $tb WHERE reportID = $id";
	if (mysqli_query($conn, $sql)) {
	header("refresh:2; url=a-mod-data.html");
	readfile("loader.html");
	} else {
    echo "Error deleting record: " . mysqli_error($conn);
		}
 }
 
  $conn->close();

?>