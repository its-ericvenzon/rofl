<?php
    include ('h-dbconnection.php');
    $userID = $_SESSION['userID'];

//$result = mysqli_query($conn,"SELECT count(*) FROM joke WHERE userID != '$userID'");
//$record = mysqli_fetch_array($result);
//$num = $record['count(*)'];

    $result = mysqli_query($conn,"SELECT * FROM joke j WHERE jokeID = (SELECT jokeID FROM jokeRating jr WHERE userID = $userID AND jr.jokeID = j.jokeID)");
    $rows = mysqli_num_rows($result);
    if ($rows > 0){
        while($record = mysqli_fetch_array($result)) {
            $jokeID = $record['jokeID'];
            $datePosted = $record['datePosted'];
            $jokeDesc = $record['jokeDesc'];
            $jokeTypeID = $record['jTypeID'];

            $sql = "SELECT joketype FROM joketype WHERE (jTypeID = '$jokeTypeID')";
            $result2 = $conn->query($sql);
            $record2 = mysqli_fetch_assoc($result2);
            $jokeType = $record2['joketype'];

            echo "<p id='jokeType'><strong>Joke Type: </strong>" . $jokeType . "</p>
              <p id='jokeGenre'><strong>Joke Genre(s): </strong>";

            //Select sql to retrieve genres here
            $sql2 = "SELECT genre FROM genre g Inner join jokegenre jg on jg.genreID = g.genreID WHERE (jg.jokeID = '$jokeID')";
            $result2 = $conn->query($sql2);

            //print out genres
            while ($record2 = mysqli_fetch_array($result2)) {
                echo $record2['genre'] . "   &nbsp    ";
            }

            $result2 = mysqli_query($conn,"SELECT rating FROM jokerating WHERE jokeID = '$jokeID' AND userID = '$userID'");
            $rating = mysqli_fetch_array($result2);
            $stars = $rating['rating'];

            echo "<div class='row content-area'>
                <div class='col'>
                    <div>
                    <h6 id='dateposted'>Posted on: " . $datePosted . "</h6>
                        <p>" . nl2br($jokeDesc) . "<br></p>";

            for ($x = 1; $x <= 5; $x++) {
                if($x <= $stars) {
                    echo "<span class='fa fa-star checked'></span>";
                }else{
                    echo "<span class='fa fa-star'></span>";
                }
            }

                        echo "<hr>
                    </div>
                </div>
            </div>";
        }
    }else {
        echo"<h1>OOPS! Looks like you need to rate some jokes!</h1><br>
            <a href='u-rate.html'>Click here to go and rate some jokes</a>";
    }
    $conn->close();
