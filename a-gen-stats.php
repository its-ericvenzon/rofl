<?php

include('h-dbconnection.php');

$demo = trim($_POST['demo']);
$order = trim($_POST['order']);
$demo = mysqli_real_escape_string($conn, $demo);
$order = mysqli_real_escape_string($conn, $order);

if ($order == 'demographics') {
	$ord = $demo;
}else {
	$ord = $order;
}

$sql = "SELECT jokeID, jokeDesc, ({$demo}), AVG(rating) FROM (SELECT * FROM jokerating LEFT JOIN participant USING (userID)) AS stats LEFT JOIN joke USING (jokeID) GROUP BY ({$demo}) ORDER BY {$ord} ASC";

$result = $conn->query($sql);
echo "<table>
		<tr>
			<th>jokeID</th>
			<th>jokeDesc</th>
			<th>" . $demo . "</th>		
			<th>AVG(rating)</th>
		</tr>"; 
while ($row = mysqli_fetch_assoc($result)) {
	echo "<tr><td>" . $row['jokeID'] . "</td><td>" . $row['jokeDesc'] . "</td><td>" .  $row[$demo] . "</td><td>" .  $row['AVG(rating)'] . "</td></tr>";
}
echo"</table>";

$conn->close();


?>