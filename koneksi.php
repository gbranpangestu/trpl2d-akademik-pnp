<?php
    $server = "localhost";
    $user = "root";
    $pass = "";
    $nama_db = "db_akademik";   

    $db = new mysqli($server, $user, $pass, $nama_db); //open connection

    if (!$db) {
        die("Gagal terhubung dengan database: " .mysqli_connect_error());
    }

?>