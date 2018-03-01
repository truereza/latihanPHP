<?php
    $host = "localhost";
    $user = "root";
    $pass = "";
    $name = "pelajar";

    $koneksi = mysql_connect($host, $user, $pass) or die ("Koneksi tidak terhubung ke database!");
    mysql_select_db($name, $koneksi) or die ("Tidak ada database!");
?>