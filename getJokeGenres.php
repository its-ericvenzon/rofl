<?php
    include ('h-dbconnection.php');

    $sql = "select * FROM genre";
    $result = $conn->query($sql);

    if ($conn->error) {
        echo "Error: " . $sql . "<br>" . $conn->error. "<br / >";
        $conn->close();
        die();
    }

    while( $row = mysqli_fetch_array($result) ){
        $genre = $row['genre'];
        echo "<a role='presentation' href='#' class='dropdown-item'>" . $genre . "</a>";
    }
?>