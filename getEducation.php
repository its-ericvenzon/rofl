<?php
    include ('h-dbconnection.php');

    $sql = "select * FROM education";
    $result = $conn->query($sql);

    if ($conn->error) {
        echo "Error: " . $sql . "<br>" . $conn->error. "<br / >";
        $conn->close();
        die();
    }

    while( $row = mysqli_fetch_array($result) ){
        $edu = $row['education'];
        $eID = $row['eduID'];
        echo "<a class='dropdown-item' role='presentation' href='#'>" .  $edu . "</a>";

    }
?>