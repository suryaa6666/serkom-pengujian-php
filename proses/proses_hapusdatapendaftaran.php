<?php
session_start();
if (!$_SESSION["username"]) {
    header("Location: http://localhost/serkom/index.php");
}
if ($_SESSION["role_id"] != 1) {
    header("Location: http://localhost/serkom/dashboard.php");
}
require '../koneksi.php';
$id = explode('/', $_SERVER["REQUEST_URI"])[4];
$sql = "DELETE FROM tb_pendaftaran WHERE id = '$id'";
$query = mysqli_query($conn, $sql);

if($query) {
    header('Location: http://localhost/serkom/datapendaftaran.php');
} else {
    header('Location: http://localhost/serkom/datapendaftaran.php');
}