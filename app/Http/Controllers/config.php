<?php

    date_default_timezone_set('America/Sao_Paulo');

    define('INCLUDE_PATH', 'http://127.0.0.1:8000/');

    $host = "localhost";
    $user = "root";
    $password = "usbw";
    $database = "db_schedule";

    $connect = new mysqli($host, $user, $password, $database);

    if (mysqli_connect_errno()) trigger_error(mysqli_connect_error());

?>