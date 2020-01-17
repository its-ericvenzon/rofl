<?php
	include ('h-dbconnection.php');
    $userID = $_SESSION['userID'];
    $age = $_SESSION['age'];

    //Checks if there are jokes for the current user to rate besides their own jokes.
    $result = mysqli_query($conn,"SELECT count(*) FROM joke WHERE userID != '$userID'");
    $record = mysqli_fetch_array($result);
    $num = $record['count(*)'];

    //If there are no jokes that are available for the user , display, "there are no jokes"
    if ($num == 0){
        echo "There are no Jokes to Rate";
        $conn->close();
        return;

    }elseif ($num >= 1){

        //if there is only one record, check to see if the user's age to see if the joke is appropriate
        if (($age == '12 or under') || ($age == '13-17')){

            //query to find records that are not submitted by themselves, are safe for kids and not yet been rated by them
            $sql = "SELECT * FROM joke j 
                    WHERE userID !='$userID' 
                          AND nsfc = 0  
                          AND NOT EXISTS (SELECT * FROM jokerating jr WHERE jr.userID = '$userID' AND jr.jokeID = j.jokeID) 
                          ORDER BY rateNum ASC LIMIT 1000";
            $result = $conn->query($sql);
            $numOfRecords = mysqli_num_rows($result);
            //if query returns with no results, display, "there are no jokes to rate"
            if($numOfRecords == 0) {
                echo "<h1>There are no more Jokes to Rate! Please come back later!</h1>";
                $conn->close();
                return;
                //if query returns with only one result, print it
            }elseif($numOfRecords >= 1) {
                //goes through each record retrieved and checks if there's a report submitted by the current user
                while ($record = mysqli_fetch_assoc($result)) {

                    //checks if user has submitted a report for that joke
                    $jokeID = $record['jokeID'];
                    $sql2 = "SELECT jokeID FROM jokereport jr INNER JOIN report r on r.reportID = jr.reportID WHERE (r.userID = '$userID')";
                    $result2 = $conn->query($sql2);
                    $check = true;
                    while($row = mysqli_fetch_assoc($result2)){
                        if ($row['jokeID'] == $jokeID){
                            $check = false;
                        }
                    }
                    //if no records of a report is returned, display the joke
                    if ($check == true){
                        $jokeDesc = $record['jokeDesc'];
                        $jokeTypeID = $record['jTypeID'];

                        $sql = "SELECT joketype FROM joketype WHERE (jTypeID = '$jokeTypeID')";
                        $result = $conn->query($sql);
                        $record = mysqli_fetch_assoc($result);
                        $jokeType = $record['joketype'];

                        //insert sql to retrieve genres here
                        $sql2 = "SELECT genre FROM genre g Inner join jokegenre jg on jg.genreID = g.genreID WHERE (jg.jokeID = '$jokeID')";
                        $result2 = $conn->query($sql2);


                        echo "<button class='btn btn-warning btn-sm' type='button' id='btn-report' data-toggle='modal' href='#report-joke'>Report</button>
                        <p><strong>JokeID: </strong><a id='jokeID'>" . $jokeID . "</a></p>
                        <p id='jokeType'><strong>Joke Type: </strong>" . $jokeType . "</p>
                        <p id='jokeGenre'><strong>Joke Genre(s): </strong>";

                        //print out genres
                        while ($record2 = mysqli_fetch_array($result2)) {
                            echo $record2['genre'] . "   &nbsp    ";
                        }

                        echo "</p><p id='joke-content'><strong>Joke Description: </strong><br>" . nl2br($jokeDesc) . "
                        <br><br>
                        </p>								
                        <div class='stars'>
                                      <form>
                                        <input class='star star-5' id='star-5' type='radio' name='star' value='5'/>
                                        <label class='star star-5' for='star-5'></label>
                                        <input class='star star-4' id='star-4' type='radio' name='star' value='4' checked/>
                                        <label class='star star-4' for='star-4'></label>
                                        <input class='star star-3' id='star-3' type='radio' name='star' value='3'/>
                                        <label class='star star-3' for='star-3'></label>
                                        <input class='star star-2' id='star-2' type='radio' name='star' value='2'/>
                                        <label class='star star-2' for='star-2'></label>
                                        <input class='star star-1' id='star-1' type='radio' name='star' value='1'/>
                                        <label class='star star-1' for='star-1'></label>
                                      </form>   
                                    </div>
                                    <button class='btn btn-primary btn-lg' type='submit' id='submit-rate'>Submit Rating</button>";

                        //report modal box
                        echo "<div class='modal fade' role='dialog' tabindex='-1' id='report-joke'>
                            <div class='modal-dialog' role='document'>
                                <div class='modal-content'>
                                    <form action='javascript:void();' method='post' id='reportForm'>
                                        <div class='modal-header'>
                                            <h4 class='modal-title'>Report this Joke</h4>
                                            <button type='button' class='close' data-dismiss='modal' aria-label='Close'><span aria-hidden='true'>×</span></button>
                                        </div>";
                        echo "
                                        <div class='modal-body'>
                                            <p>You are currently reporting this joke. Choose from one of the reasons inside the dropdown list.<br></p>
                                            <p id='jokeIDReport'>Joke ID: " . $jokeID . "</p>
                                            <h6>Reason</h6>
                                            <div class='dropdown'><button class='btn btn-primary dropdown-toggle' data-toggle='dropdown' aria-expanded='false' type='button' id='subject'>Category </button>
                                                <div class='dropdown-menu' role='menu'>";

                        //get subjects from report table and populate the dropdown box
                        $sql = "select repSubject FROM repsubject";
                        $result = $conn->query($sql);
                        while ($row = mysqli_fetch_array($result)) {
                            $subject = $row['repSubject'];
                            echo "<a class='dropdown-item' role='presentation' href='#'>" . $subject . "</a>";
                        }
                        echo "    </div>
                                            </div>
                                            <br>
                                            <form><textarea class='form-control' rows='5' placeholder='Tell us why...' id='report-message' required></textarea></form>
                                        </div>
                                        <div class='modal-footer'><button class='btn btn-primary' type='submit' id='submit-report'>Submit Report</button></div>
                                    </form>
                                </div>
                            </div>
                        </div>";
                        $conn->close();
                        return;
                    }

                    echo "There are no Jokes to Rate";
                    $conn->close();
                    return;
                }
            }
        //if the user is over 18
        }else {
            //query to find records that are not submitted by themselves and not yet been rated by them
            $sql = "SELECT * FROM joke j 
                    WHERE userID !='$userID' 
                          AND NOT EXISTS (SELECT * FROM jokerating jr WHERE jr.userID = '$userID' AND jr.jokeID = j.jokeID)
                          ORDER BY rateNum ASC LIMIT 1000";
            $result = $conn->query($sql);
            $numOfRecords = mysqli_num_rows($result);

            //if query returns with no results, display, "there are no jokes to rate"
            if($numOfRecords == 0) {
                echo "<h1>There are no more Jokes to Rate! Please come back later!</h1>";
                $conn->close();
                return;

            //if query returns with one or more result
            }elseif($numOfRecords >= 1) {

                //goes through each record retrieved and checks if there's a report submitted by the current user
                while($record = mysqli_fetch_assoc($result)) {

                    //checks if user has submitted a report for that joke
                    $jokeID = $record['jokeID'];
                    $sql2 = "SELECT jokeID FROM jokereport jr INNER JOIN report r on r.reportID = jr.reportID WHERE (r.userID = '$userID')";
                    $result2 = $conn->query($sql2);
                    $check = true;
                    while($row = mysqli_fetch_assoc($result2)){
                        if ($row['jokeID'] == $jokeID){
                            $check = false;
                        }
                    }

                    //if no records of a report is returned, display the joke
                    if ($check == true){
                        $jokeDesc = $record['jokeDesc'];
                        $jokeTypeID = $record['jTypeID'];

                        $sql = "SELECT joketype FROM joketype WHERE (jTypeID = '$jokeTypeID')";
                        $result = $conn->query($sql);
                        $record = mysqli_fetch_assoc($result);
                        $jokeType = $record['joketype'];

                        //insert sql to retrieve genres here
                        $sql2 = "SELECT genre FROM genre g Inner join jokegenre jg on jg.genreID = g.genreID WHERE (jg.jokeID = '$jokeID')";
                        $result2 = $conn->query($sql2);


                        echo "<button class='btn btn-warning btn-sm' type='button' id='btn-report' data-toggle='modal' href='#report-joke'>Report</button>
                        <p><strong>JokeID: </strong><a id='jokeID'>" . $jokeID . "</a></p>
                        <p id='jokeType'><strong>Joke Type: </strong>" . $jokeType . "</p>
                        <p id='jokeGenre'><strong>Joke Genre(s): </strong>";

                        //print out genres
                        while ($record2 = mysqli_fetch_array($result2)) {
                            echo $record2['genre'] . "   &nbsp    ";
                        }

                        echo "</p><p id='joke-content'><strong>Joke Description: </strong><br>" . nl2br($jokeDesc) . "
                        <br><br>
                        </p>								
                        <div class='stars'>
                                      <form>
                                        <input class='star star-5' id='star-5' type='radio' name='star' value='5'/>
                                        <label class='star star-5' for='star-5'></label>
                                        <input class='star star-4' id='star-4' type='radio' name='star' value='4'/>
                                        <label class='star star-4' for='star-4'></label>
                                        <input class='star star-3' id='star-3' type='radio' name='star' value='3'/>
                                        <label class='star star-3' for='star-3'></label>
                                        <input class='star star-2' id='star-2' type='radio' name='star' value='2'/>
                                        <label class='star star-2' for='star-2'></label>
                                        <input class='star star-1' id='star-1' type='radio' name='star' value='1'/>
                                        <label class='star star-1' for='star-1'></label>
                                      </form>   
                                    </div>
                                    <button class='btn btn-primary btn-lg' type='submit' id='submit-rate'>Submit Rating</button>";

                        //report modal box
                        echo "<div class='modal fade' role='dialog' tabindex='-1' id='report-joke'>
                            <div class='modal-dialog' role='document'>
                                <div class='modal-content'>
                                    <form action='javascript:void();' method='post' id='reportForm'>
                                        <div class='modal-header'>
                                            <h4 class='modal-title'>Report this Joke</h4>
                                            <button type='button' class='close' data-dismiss='modal' aria-label='Close'><span aria-hidden='true'>×</span></button>
                                        </div>";

                        echo "
                                        <div class='modal-body'>
                                            <p>You are currently reporting this joke. Choose from one of the reasons inside the dropdown list.<br></p>
                                            <p id='jokeIDReport'>Joke ID: " . $jokeID . "</p>
                                            <h6>Reason</h6>
                                            <div class='dropdown'><button class='btn btn-primary dropdown-toggle' data-toggle='dropdown' aria-expanded='false' type='button' id='subject'>Category </button>
                                                <div class='dropdown-menu' role='menu'>";

                        //get subjects from report table and populate the dropdown box
                        $sql = "select repSubject FROM repsubject";
                        $result = $conn->query($sql);
                        while ($row = mysqli_fetch_array($result)) {
                            $subject = $row['repSubject'];
                            echo "<a class='dropdown-item' role='presentation' href='#'>" . $subject . "</a>";
                        }
                        echo "    </div>
                                            </div>
                                            <br>
                                            <form><textarea class='form-control' rows='5' placeholder='Tell us why...' id='report-message' required></textarea></form>
                                        </div>
                                        <div class='modal-footer'><button class='btn btn-primary' type='submit' id='submit-report'>Submit Report</button></div>
                                    </form>
                                </div>
                            </div>
                        </div>";
                        $check = true;
                        $conn->close();
                        return;
                    }
                }
                echo "<h1>There are no more Jokes to Rate! Please come back later!</h1>";
                $conn->close();
                return;
            }
        }
    //if the user has no jokes to rate besides their own
    }else{
        echo "<h1>There are no more Jokes to Rate! Please come back later!</h1>";
        $conn->close();
        return;
    }