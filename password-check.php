<?php

    session_unset();

    if (password_verify('$password', $hash)) {
        echo 'Password is valid!';
    } else {
        echo 'Invalid password.';
    }
?>