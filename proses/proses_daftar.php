<?php
require "../koneksi.php";

$username = trim(htmlspecialchars($_POST["username"]));
$password = $_POST["password"];
$nama_lengkap = htmlspecialchars($_POST["nama_lengkap"]);
$ttl = htmlspecialchars($_POST["ttl"]);
$no_hp = htmlspecialchars($_POST["no_hp"]);
$agama = htmlspecialchars($_POST["agama"]);
$alamat = htmlspecialchars($_POST["alamat"]);
$jenis_kelamin = htmlspecialchars($_POST["jenis_kelamin"]);
$role_id = 0;

$sql = "INSERT INTO tb_user(username, password, nama_lengkap, ttl, no_hp, agama, alamat, jenis_kelamin, role_id, sudah_daftar) VALUES ('$username','$password','$nama_lengkap','$ttl','$no_hp','$agama','$alamat','$jenis_kelamin', $role_id, 'False')";
$query = mysqli_query($conn, $sql);

if ($query) {
    echo "Pendaftaran berhasil, silahkan untuk melakukan login";
    header("Location: http://localhost/serkom/index.php");
} else {
    echo "Pendaftaran gagal, Error :  " . mysqli_error($conn);
    header("Location: http://localhost/serkom/daftar.php");
}
