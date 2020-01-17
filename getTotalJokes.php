<?php

include('h-dbconnection.php');

	$sql = "SELECT COUNT(jokeID) FROM joke";
	$result = mysqli_query($conn,$sql);
	$rows = mysqli_fetch_row($result);
	echo $rows[0];

?>