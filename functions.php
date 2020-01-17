<?php
    function generateToken($len = 10) {
        $token = "sdfpoiuztewahrewqaewsdfghyhjklmnbwnvcvcxy16923459455167388232790";
        $token = str_shuffle($token);
        $token = substr($token, 0, $len);

        return $token;
    }
?>