<?php
require '../koneksi.php';
$id = htmlspecialchars($_POST["id"]);
$username = trim(htmlspecialchars($_POST["username"]));
$nama_lengkap = htmlspecialchars($_POST["nama_lengkap"]);
$ttl = htmlspecialchars($_POST["ttl"]);
$no_hp = htmlspecialchars($_POST["no_hp"]);
$agama = htmlspecialchars($_POST["agama"]);
$alamat = htmlspecialchars($_POST["alamat"]);
$jenis_kelamin = htmlspecialchars($_POST["jenis_kelamin"]);

$sql = "UPDATE tb_user SET username = '$username', nama_lengkap = '$nama_lengkap', ttl = '$ttl', no_hp = '$no_hp', agama = '$agama', alamat = '$alamat', jenis_kelamin = '$jenis_kelamin' WHERE id = '$id'";
$query = mysqli_query($conn, $sql);

if($query) {
    header('Location: http://localhost/serkom/datauser.php');
} else {
    header('Location: http://localhost/serkom/datauser.php');
}