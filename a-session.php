<?php
    @ob_start();
    session_start();
	
    //if session is empty, kick them out
    if(empty($_SESSION)){
        header("Location: a-login.html");
        session_destroy();
    }
?>