<?php

include('h-dbconnection.php');

$selectdata = "SELECT * FROM inquiry";

$query = mysqli_query($conn, $selectdata);
echo "<table>";
while($row = mysqli_fetch_array($query))
{
	$id = $row['inqID'];
	echo "<tr><td style='width:5%'>" . $row['inqID'] . "</td><td style='width:20%'>" . $row['inqEmail'] . "</td><td style='width:50%'>" . $row['inqMessage'] . "</td>
				<td> <a role='button' class='btn btn-danger btn-sm' href='a-deleteinquiry.php?id=$id'><i class='fa fa-minus-circle'></i> Delete </button> </td>				
				<td> <a role='button' class='btn btn-info btn-sm' href='a-respondinquiry.html?id=$id' target='_blank'><i class='fa fa-edit'></i> Respond </button> </td></tr>";
}
echo "</table>";
mysqli_close($conn);

?>