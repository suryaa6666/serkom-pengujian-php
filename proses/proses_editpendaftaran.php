<?php
require '../koneksi.php';
$id = $_POST["id"];
$nama_lengkap = htmlspecialchars($_POST["nama_lengkap"]);
$ttl = htmlspecialchars($_POST["ttl"]);
$no_hp = htmlspecialchars($_POST["no_hp"]);
$agama = htmlspecialchars($_POST["agama"]);
$alamat = htmlspecialchars($_POST["alamat"]);
$jenis_kelamin = htmlspecialchars($_POST["jenis_kelamin"]);
$sekolah_asal = htmlspecialchars($_POST["sekolah_asal"]);
$nama_wali = htmlspecialchars($_POST["nama_wali"]);
$no_hp_wali = htmlspecialchars($_POST["no_hp_wali"]);


$sql = "UPDATE tb_pendaftaran SET nama_lengkap = '$nama_lengkap', ttl = '$ttl', no_hp = '$no_hp', agama = '$agama', alamat = '$alamat', jenis_kelamin = '$jenis_kelamin', sekolah_asal = '$sekolah_asal', nama_wali = '$nama_wali', no_hp_wali = '$no_hp_wali' WHERE id = $id";
$query = mysqli_query($conn, $sql);

if($query) {
    header('Location: http://localhost/serkom/datapendaftaran.php');
} else {
    header('Location: http://localhost/serkom/datapendaftaran.php');
}