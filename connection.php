<?php
    $mysql_hostname = "localhost";
    $mysql_user = "jay";
    $mysql_password = "jay123";
    $mysql_database = "tp";
    $prefix = "";

    $mysqli = new mysqli($mysql_hostname, $mysql_user, $mysql_password, $mysql_database);
    mysqli_query($mysqli,"SET NAMES utf8");

    if(mysqli_connect_errno()) {
        echo "Connection Failed: " . mysqli_connect_errno();
        exit();
    }
?>