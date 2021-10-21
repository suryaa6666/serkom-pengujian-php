<?php
$username = "root";
$password = "";
$host = "localhost";
$db_name = "serkom";

$conn = mysqli_connect($host, $username, $password, $db_name);
if (!$conn) {
    echo "Koneksi gagal";
    die;
}
