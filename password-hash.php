<?php
    $pwd = 'password';

    //hash speed; increase if server has better resources
    $options = ['cost' => 10];
    $password = password_hash($pwd, PASSWORD_DEFAULT, $options);
?>