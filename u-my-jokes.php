<?php
    include ('h-dbconnection.php');
    $userID = $_SESSION['userID'];
    $userID = mysqli_real_escape_string($conn, $userID);
    $result = mysqli_query($conn,"SELECT * FROM joke WHERE userID = '$userID'");
    $numOfRecords = mysqli_num_rows($result);
    if ($numOfRecords > 0) {
        while ($record = mysqli_fetch_array($result)) {
            $jokeID = $record['jokeID'];
            $jokeID = mysqli_real_escape_string($conn, $jokeID);
            $jokeDesc = $record['jokeDesc'];
            $jokeTypeID = $record['jTypeID'];
            $jokeTypeID = mysqli_real_escape_string($conn, $jokeTypeID);

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

            $date = $record['datePosted'];

            echo "<div class='row content-area'>
            <div class='col'>
                <div><h6 id='datelabel'></h6>
                <h6 id='dateposted'>Posted in: " . $date . "</h6>
                <p>" . nl2br($jokeDesc) . "<br></p>
                <hr>
            </div></div></div>";
        }
    }else{
        echo"<div><h2>The Whole World is Your Stage!</h2></div><br>
            <a href='u-submit.html'>Come on in! Tell us a Joke!</a>";
    }
    $conn->close();
    return;
