<?php
    include ('h-dbconnection.php');

    $sql = "select * FROM age";
    $result = $conn->query($sql);

    if ($conn->error) {
        echo "Error: " . $sql . "<br>" . $conn->error. "<br / >";
        $conn->close();
        die();
    }

    while( $row = mysqli_fetch_array($result) ){
        $age = $row['ageRange'];
        $aID = $row['ageID'];
        echo "<a class='dropdown-item' role='presentation' href='#'>" .  $age . "</a>";
    }

?>