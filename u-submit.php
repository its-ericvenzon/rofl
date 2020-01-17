<?php
	include('session.php');
    include ('h-dbconnection.php');
    $jtype = trim($_POST['jtype']);
	$jtype = mysqli_real_escape_string($conn, $jtype);
    $jgenre1 = trim($_POST['jgenre1']);
    $jgenre2 = trim($_POST['jgenre2']);
    $jgenre3 = trim($_POST['jgenre3']);
	$desc = trim($_POST['description']);
	$desc = mysqli_real_escape_string($conn, $desc);
    $nsfc = $_POST['nsfc'];

	$username = $_SESSION['username'];
    $sql = "INSERT into joke(userID, jTypeID, nsfc, jokeDesc, datePosted) 
                VALUES ((SELECT userID FROM participant WHERE username = '$username'),
				(SELECT jTypeID FROM joketype WHERE joketype = '$jtype'), 
				$nsfc,'$desc', CURDATE())";
    $conn->query($sql);
    if ($conn->error) {
        echo "Error: " . $sql . "<br>" . $conn->error. "<br / >";
        $conn->close();
        //echo "Error: Please contact an Admin via the 'Contact Us' form."
        die();
    }

    //retrieve id of last inserted query
    $jokeID = $conn->insert_id;

    //if genre 1 and 2 are 'Joke Genre', store genre3
    if (($jgenre1 == $jgenre2) && ($jgenre1 == 'Joke Genre')){
        $jgenre3 = mysqli_real_escape_string($conn, $jgenre3);
        $sql = "INSERT into jokegenre(jokeID, genreID)
                    VALUES ($jokeID,
                    (SELECT genreID FROM genre WHERE genre = '$jgenre3'))";
        $conn->query($sql);
    }//if genre 2 and 3 are 'Joke Genre', store genre 1
    elseif (($jgenre2 == $jgenre3) && ($jgenre2 == 'Joke Genre')){
        $jgenre1 = mysqli_real_escape_string($conn, $jgenre1);
        $sql = "INSERT into jokegenre(jokeID, genreID)
                        VALUES ($jokeID,
                        (SELECT genreID FROM genre WHERE genre = '$jgenre1'))";
        $conn->query($sql);
    }//if genre 1 and 3 are 'Joke Genre', store genre 2
    elseif (($jgenre1 == $jgenre3) && ($jgenre1 == 'Joke Genre')){
        $jgenre2 = mysqli_real_escape_string($conn, $jgenre2);
        $sql = "INSERT into jokegenre(jokeID, genreID)
                    VALUES ($jokeID,
                    (SELECT genreID FROM genre WHERE genre = '$jgenre2'))";
        $conn->query($sql);
    }//if they are all the same genres
    elseif (($jgenre1 == $jgenre2) && ($jgenre2 == $jgenre3) && ($jgenre1 != 'Joke Genre')){
        $jgenre1 = mysqli_real_escape_string($conn, $jgenre1);
        $sql = "INSERT into jokegenre(jokeID, genreID)
                    VALUES ($jokeID,
                    (SELECT genreID FROM genre WHERE genre = '$jgenre1'))";
        $conn->query($sql);
    }//if genre 1 and 2 are the same and genre 3 is different, store 2 genres
    elseif (($jgenre1 == $jgenre2) && ($jgenre3 != 'Joke Genre')){
        $jgenre1 = mysqli_real_escape_string($conn, $jgenre1);
        $jgenre3 = mysqli_real_escape_string($conn, $jgenre3);
        $sql = "INSERT into jokegenre(jokeID, genreID)
                    VALUES ($jokeID,
                    (SELECT genreID FROM genre WHERE genre = '$jgenre2'))";
        $conn->query($sql);
        $sql = "INSERT into jokegenre(jokeID, genreID)
                    VALUES ($jokeID,
                    (SELECT genreID FROM genre WHERE genre = '$jgenre3'))";
        $conn->query($sql);
    }//if genre 2 and 3 are the same and genre 1 is different, store 2 genres
    elseif (($jgenre2 == $jgenre3) && $jgenre1 != 'Joke Genre'){
        $jgenre2 = mysqli_real_escape_string($conn, $jgenre2);
        $jgenre1 = mysqli_real_escape_string($conn, $jgenre1);
        $sql = "INSERT into jokegenre(jokeID, genreID)
                    VALUES ($jokeID,
                    (SELECT genreID FROM genre WHERE genre = '$jgenre2'))";
        $conn->query($sql);
        $sql = "INSERT into jokegenre(jokeID, genreID)
                    VALUES ($jokeID,
                    (SELECT genreID FROM genre WHERE genre = '$jgenre1'))";
        $conn->query($sql);
    }//if genre 1 and 3 are the same and genre 2 is different, store 2 genres
    elseif (($jgenre1 == $jgenre3) && $jgenre2 != 'Joke Genre'){
        $jgenre1 = mysqli_real_escape_string($conn, $jgenre1);
        $jgenre2 = mysqli_real_escape_string($conn, $jgenre2);
        $sql = "INSERT into jokegenre(jokeID, genreID)
                    VALUES ($jokeID,
                    (SELECT genreID FROM genre WHERE genre = '$jgenre1'))";
        $conn->query($sql);
        $sql = "INSERT into jokegenre(jokeID, genreID)
                    VALUES ($jokeID,
                    (SELECT genreID FROM genre WHERE genre = '$jgenre2'))";
        $conn->query($sql);
    }//if all three are different and genre 3 is 'Joke Genre', store genre 1 and 2
    elseif (($jgenre1 != $jgenre2) && ($jgenre2 != $jgenre3) && ($jgenre1 != $jgenre3) && ($jgenre3 == 'Joke Genre')){
        $jgenre1 = mysqli_real_escape_string($conn, $jgenre1);
        $jgenre2 = mysqli_real_escape_string($conn, $jgenre2);
        $sql = "INSERT into jokegenre(jokeID, genreID)
                    VALUES ($jokeID,
                    (SELECT genreID FROM genre WHERE genre = '$jgenre1'))";
        $conn->query($sql);
        $sql = "INSERT into jokegenre(jokeID, genreID)
                    VALUES ($jokeID,
                    (SELECT genreID FROM genre WHERE genre = '$jgenre2'))";
        $conn->query($sql);
    }//if all three are different and genre 2 is 'Joke Genre', store genre 1 and 3
    elseif (($jgenre1 != $jgenre2) && ($jgenre2 != $jgenre3) && ($jgenre1 != $jgenre3) && ($jgenre2 == 'Joke Genre')){
        $jgenre1 = mysqli_real_escape_string($conn, $jgenre1);
        $jgenre3 = mysqli_real_escape_string($conn, $jgenre3);
        $sql = "INSERT into jokegenre(jokeID, genreID)
                    VALUES ($jokeID,
                    (SELECT genreID FROM genre WHERE genre = '$jgenre1'))";
        $conn->query($sql);
        $sql = "INSERT into jokegenre(jokeID, genreID)
                    VALUES ($jokeID,
                    (SELECT genreID FROM genre WHERE genre = '$jgenre3'))";
        $conn->query($sql);
    }//if all three are different and genre 1 is 'Joke Genre', store genre 2 and 3
    elseif (($jgenre1 != $jgenre2) && ($jgenre2 != $jgenre3) && ($jgenre1 != $jgenre3) && ($jgenre1 == 'Joke Genre')){
        $jgenre2 = mysqli_real_escape_string($conn, $jgenre2);
        $jgenre3 = mysqli_real_escape_string($conn, $jgenre3);
        $sql = "INSERT into jokegenre(jokeID, genreID)
                    VALUES ($jokeID,
                    (SELECT genreID FROM genre WHERE genre = '$jgenre2'))";
        $conn->query($sql);
        $sql = "INSERT into jokegenre(jokeID, genreID)
                    VALUES ($jokeID,
                    (SELECT genreID FROM genre WHERE genre = '$jgenre3'))";
        $conn->query($sql);
    }//if genre 1 and 2 are the same and genre 3 is 'Joke Genre', store genre 1
    elseif (($jgenre1 == $jgenre2) && ($jgenre3 == 'Joke Genre')){
        $jgenre1 = mysqli_real_escape_string($conn, $jgenre1);
        $sql = "INSERT into jokegenre(jokeID, genreID)
                        VALUES ($jokeID,
                        (SELECT genreID FROM genre WHERE genre = '$jgenre1'))";
        $conn->query($sql);
    }//if genre 2 and 3 are the same and genre 1 is 'Joke Genre', store genre 2
    elseif (($jgenre2 == $jgenre3) && ($jgenre1 == 'Joke Genre')){
        $jgenre2 = mysqli_real_escape_string($conn, $jgenre2);
        $sql = "INSERT into jokegenre(jokeID, genreID)
                        VALUES ($jokeID,
                        (SELECT genreID FROM genre WHERE genre = '$jgenre1'))";
        $conn->query($sql);
    }//if genre 1 and 3 are the same and genre 2 is 'Joke Genre', store genre 1
    elseif (($jgenre1 == $jgenre3) && ($jgenre2 == 'Joke Genre')){
        $jgenre1 = mysqli_real_escape_string($conn, $jgenre1);
        $sql = "INSERT into jokegenre(jokeID, genreID)
                        VALUES ($jokeID,
                        (SELECT genreID FROM genre WHERE genre = '$jgenre1'))";
        $conn->query($sql);
    }//if all three are different and are not 'Joke Genre, store all 3
    elseif (($jgenre1 != $jgenre2) && ($jgenre2 != $jgenre3) && ($jgenre1 != $jgenre3) && ($jgenre1 != 'Joke Genre') && ($jgenre2 != 'Joke Genre') && ($jgenre3 != 'Joke Genre')){
        $jgenre1 = mysqli_real_escape_string($conn, $jgenre1);
        $jgenre2 = mysqli_real_escape_string($conn, $jgenre2);
        $jgenre3 = mysqli_real_escape_string($conn, $jgenre3);
        $sql = "INSERT into jokegenre(jokeID, genreID)
                    VALUES ($jokeID,
                    (SELECT genreID FROM genre WHERE genre = '$jgenre1'))";
        $conn->query($sql);
        $sql = "INSERT into jokegenre(jokeID, genreID)
                    VALUES ($jokeID,
                    (SELECT genreID FROM genre WHERE genre = '$jgenre2'))";
        $conn->query($sql);
        $sql = "INSERT into jokegenre(jokeID, genreID)
                    VALUES ($jokeID,
                    (SELECT genreID FROM genre WHERE genre = '$jgenre3'))";
        $conn->query($sql);
    }

    if ($conn->error) {
        echo "Error: " . $sql . "<br>" . $conn->error. "<br / >";
        $conn->close();
        die();
    }else{
        echo "Joke Submission Successful. Thank-you!";
    }
    $conn->close();
?>