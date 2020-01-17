<?php
    include ('h-dbconnection.php');

    $sql = "select * FROM joketype";
    $result = $conn->query($sql);

    if ($conn->error) {
        echo "Error: " . $sql . "<br>" . $conn->error. "<br / >";
        $conn->close();
        die();
    }

    while( $row = mysqli_fetch_array($result) ){
        $type = $row['joketype'];
        echo "<a class='dropdown-item' role='presentation' href='#'>" .  $type . "</a>";
    }
?>