<?php
$host = "localhost";
$username = "root";
$password = "";
$dbname = "taskpemrograman_2";

$koneksi = mysqli_connect($host, $username, $password, $dbname);
if (!$koneksi){
        die("Koneksi gagal:".mysqli_connect_error());
    }