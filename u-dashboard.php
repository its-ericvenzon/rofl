<?php

    include ('h-dbconnection.php');
    $userID = $_SESSION['userID'];

    //$result = mysqli_query($conn,"SELECT count(*) FROM joke WHERE userID != '$userID'");
    //$record = mysqli_fetch_array($result);
    //$num = $record['count(*)'];

    $result = mysqli_query($conn,"SELECT jokeDesc, datePosted FROM joke WHERE userID = '$userID' ORDER BY jokeID desc LIMIT 3 ");
    if(mysqli_num_rows($result)==0){
        echo"<div><h2>The Whole World is Your Stage!</h2></div><br>
            <a href='u-submit.html'>Come on in! Tell us a Joke!</a>";
    } else {
        while ($record = mysqli_fetch_array($result)) {
            $date = $record['datePosted'];
            $jokeDesc = $record['jokeDesc'];

            echo "<div>
            <h6 id='dateposted'>Posted on: " . $date . "</h6>
            <p>" . nl2br($jokeDesc) . "<br></p>
            <hr>
            </div>";
        }
    }


	echo "</div>
			<div class='col'>
			<h5>My Rated Jokes</h5>
			<hr>";

    $result = mysqli_query($conn,"SELECT jokeID, jokeDesc, datePosted FROM joke j WHERE jokeID = (SELECT jokeID FROM jokeRating jr WHERE userID = $userID AND jr.jokeID = j.jokeID) ORDER BY jokeID desc LIMIT 3");
    $rows = mysqli_num_rows($result);
    if ($rows > 0){
        while($record = mysqli_fetch_array($result)) {
            $jokeID = $record['jokeID'];
            $datePosted = $record['datePosted'];
            $jokeDesc = $record['jokeDesc'];
            $result2 = mysqli_query($conn,"SELECT rating FROM jokerating WHERE jokeID = '$jokeID' AND userID = '$userID'");
            $rating = mysqli_fetch_array($result2);
            $stars = $rating['rating'];
			
            echo "<div><p>" . nl2br($jokeDesc) . "<br></p>";

            for ($x = 1; $x <= 5; $x++) {
                if($x <= $stars) {
                    echo "<span class='fa fa-star checked'></span>";
                }else{
                    echo "<span class='fa fa-star'></span>";
                }
            }

			echo "<hr></div>";
        }
    }else {
        echo"<div><h2>Looks like you need a laugh!</h2></div><br>
            <a href='u-rate.html'>Click here to go and rate some jokes</a>";
    }
	
    $conn->close();
