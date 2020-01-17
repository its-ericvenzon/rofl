<?php

session_start();
unset($_SESSION['adusername']);
session_destroy();

header("refresh:1;url=a-login.html");
readfile("loader.html");

?>