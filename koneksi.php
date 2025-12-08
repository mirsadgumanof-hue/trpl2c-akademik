<?php
    $host = "localhost";
    $user = "root";
    $pass = "";
    $db   = "db_akademik";

    $koneksi = new mysqli ($host, $user, $pass, $db);

    if($koneksi->connect_errno){
        echo "Koneksi Gagal: " . $koneksi->connect_error;
    }
?>