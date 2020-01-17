<?php
	session_start();
	include('h-dbconnection.php');

	$tb = trim($_POST['table']);
	$tb = mysqli_real_escape_string($conn,$tb);
	
	$sql = "SELECT * FROM $tb";
	$sql2 = "SHOW COLUMNS FROM $tb";
	$result = $conn->query($sql);
	$result2 = $conn->query($sql2);

	echo "<table>";
	while($row = mysqli_fetch_assoc($result2)){

		echo "<td>";
		foreach($row as $key => $value){
			
			if($key != 'Type' && $key != 'Null' && $key != 'Key' && $key != 'Defaults' && $key != 'Extra' && $value != 'passhash' && $value != 'adpass' && $value != 'token' && $value != 'tokenExpire' && $value != 'CURRENT_TIMESTAMP' && $value != '0000-00-00 00:00:00'){
			echo "$value";					
			}
			
		}
		
		echo "</td>";
	}
			if($tb == 'Admin'){
				$_SESSION['table'] = $tb;
				echo "<a role='button' class='btn btn-success btn-sm' href='a-iadmin.html'><i class='fa fa-plus-circle'></i> Create </button>";
			}
			elseif($tb == 'Genre'){
				$_SESSION['table'] = $tb;
				echo "<a role='button' class='btn btn-success btn-sm' href='a-igenre.html'><i class='fa fa-plus-circle'></i> Create </button>";
			}
			elseif($tb == 'Country'){
				$_SESSION['table'] = $tb;
				echo "<a role='button' class='btn btn-success btn-sm' href='a-icountry.html'><i class='fa fa-plus-circle'></i> Create </button>";
			}
			elseif($tb == 'JokeType'){
				$_SESSION['table'] = $tb;
				echo "<a role='button' class='btn btn-success btn-sm' href='a-ijtype.html'><i class='fa fa-plus-circle'></i> Create </button>";				
			}

		while($row2 = mysqli_fetch_assoc($result)){
			echo"<tr>";
			foreach($row2 as $key => $value){

				if($key != 'passhash' && $key != 'adpass' && $key != 'token' && $key != 'tokenExpire'){
					echo "<td><a id=$value> $value </a></td>";					
				}							
			}	
			if($tb == 'Admin'){
				$_SESSION['table'] = $tb;
				$id = $row2['adminID'];
				if ($id == '1') {
                }
                else {
                    echo "<td> <a role='button' class='btn btn-danger btn-sm' href='a-delete.php?id=$id'><i class='fa fa-minus-circle'></i> Delete </button> </td>";
                    echo "<td> <a role='button' class='btn btn-info btn-sm' href='a-uadmin.html?id=$id'><i class='fa fa-edit'></i> Update </button> </td>";
                }
			}
			elseif($tb == 'Genre'){
				$_SESSION['table'] = $tb;
				$id = $row2['genreID'];
				echo "<td> <a role='button' class='btn btn-info btn-sm' href='a-ugenre.html?id=$id'><i class='fa fa-edit'></i> Update </button> </td>";				
			}
			elseif($tb == 'Country'){
				$_SESSION['table'] = $tb;
				$id = $row2['countryID'];
				echo "<td> <a role='button' class='btn btn-danger btn-sm' href='a-delete.php?id=$id'><i class='fa fa-minus-circle'></i> Delete </button> </td>";				
			}
			elseif($tb == 'Joke'){
				$_SESSION['table'] = $tb;
				$id = $row2['jokeID'];
				echo "<td> <a role='button' class='btn btn-danger btn-sm' href='a-delete.php?id=$id'><i class='fa fa-minus-circle'></i> Delete </button> </td>";		
				echo "<td> <a role='button' class='btn btn-info btn-sm' href='a-ujoke.html?id=$id'><i class='fa fa-edit'></i> Update </button> </td>";				
			}
			elseif($tb == 'Participant'){
				$_SESSION['table'] = $tb;
				$id = $row2['userID'];
				echo "<td> <a role='button' class='btn btn-danger btn-sm' href='a-delete.php?id=$id'><i class='fa fa-minus-circle'></i> Delete </button> </td>";
				echo "<td> <a role='button' class='btn btn-info btn-sm' href='a-updateuser.html?id=$id'><i class='fa fa-edit'></i> Update </button> </td>";					
			}
			elseif($tb == 'Inquiry'){
				$_SESSION['table'] = $tb;
				$id = $row2['inqID'];
				echo "<td> <a role='button' class='btn btn-danger btn-sm' href='a-delete.php?id=$id'><i class='fa fa-minus-circle'></i> Delete </button> </td>";				
				echo "<td> <a role='button' class='btn btn-info btn-sm' href='a-respond.html?id=$id' target='_blank'><i class='fa fa-edit'></i> Respond </button> </td>";
			}
			elseif($tb == 'Report'){
				$_SESSION['table'] = $tb;
				$id = $row2['reportID'];
				echo "<td> <a role='button' class='btn btn-danger btn-sm' href='a-delete.php?id=$id'><i class='fa fa-minus-circle'></i> Delete </button> </td>";				
			}
			elseif($tb == 'JokeType'){
				$_SESSION['table'] = $tb;
				$id = $row2['jTypeID'];
				echo "<td> <a role='button' class='btn btn-info btn-sm' href='a-ujtype.html?id=$id'><i class='fa fa-edit'></i> Update </button> </td>";					
			}
			echo "</tr>";
		}
		
	
	echo "</table>";
	$conn->close();
?>