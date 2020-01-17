<?php
include ('session.php');

$un = $_SESSION['username'];
$age = $_SESSION['age'];
$country = $_SESSION['country'];
$gender = $_SESSION['gender'];
$edu = $_SESSION['education'];

echo "<div class='media'> <a href='#' class='pull-left'></a> <div class='media-body'><p><table class='popovertext'><tr><td>Age:</td><td>" . $age . "</td></tr><td>Country:</td><td>" . $country . "</td></tr><td>Education:</td><td>" . $edu . "</td></tr><td>Gender:</td><td>" . $gender . "</td></tr></table><hr/><a role='button' class='btn btn-warning btn-sm' href='logout.php'>Logout</a> &nbsp <a role='button' class='btn btn-dark btn-sm' href='u-deactivate.html'> Deactivate Account </a></p></div></div>";
?>