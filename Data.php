<?php
    $local = "localhost";
    $user = "root";
    $pass = "";
    $db = "record";

    $con = new mysqli($local,$user,$pass,$db);

    if ($con ->connect_error) {
        die("Connection Failed !!!" . $con->connect_error);
    }
?>