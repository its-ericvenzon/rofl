<?php
    // Initialize the session
    session_start();

    // Unset all of the session variables
    unset($_SESSION['adusername']);
    unset($_SESSION['userID']);
    unset($_SESSION['username']);
    unset($_SESSION['age']);
    unset($_SESSION['country']);
    unset($_SESSION['education']);
    unset($_SESSION['gender']);

    // Destroy the session.
    session_destroy();

    header("refresh:1;url=u-login.html");
    readfile("u-loader.html");
?>