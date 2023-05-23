<?php

    // Apache (Web Sever)
    // PHP (Scripts)
    // MYSQL (database)
    // PHPMYADMIN (tool, GUI - database)

    $host     = "localhost";
    $username = "w0207";
    $password = "N01c[n[lgyuTgl/M";
    $database   = "w0207";

    $link = mysqli_connect($host, $username, $password, $database) or die(mysqli_error($link));

?>