<?php
require "../koneksi.php";
session_start();
$username = $_SESSION["username"];
$id_user = mysqli_fetch_assoc(mysqli_query($conn, "SELECT * FROM tb_user WHERE username = '$username'"))["id"];
$nama_lengkap = htmlspecialchars($_POST["nama_lengkap"]);
$ttl = htmlspecialchars($_POST["ttl"]);
$no_hp = htmlspecialchars($_POST["no_hp"]);
$agama = htmlspecialchars($_POST["agama"]);
$alamat = htmlspecialchars($_POST["alamat"]);
$jenis_kelamin = htmlspecialchars($_POST["jenis_kelamin"]);
$sekolah_asal = htmlspecialchars($_POST["sekolah_asal"]);
$nama_wali = htmlspecialchars($_POST["nama_wali"]);
$no_hp_wali = htmlspecialchars($_POST["no_hp_wali"]);


function createRandomPassword()
{
    $chars = "abcdefghijkmnopqrstuvwxyz023456789";
    srand((float)microtime() * 1000000);
    $i = 0;
    $pass = '';

    while ($i <= 15) {
        $num = rand() % 33;
        $tmp = substr($chars, $num, 1);
        $pass = $pass . $tmp;
        $i++;
    }

    return $pass;
}

$kode = createRandomPassword();
$sql = "INSERT INTO tb_pendaftaran(id, nama_lengkap, ttl, no_hp, agama, jenis_kelamin, alamat, sekolah_asal, nama_wali, no_hp_wali, status_penerimaan) VALUES ($id_user, '$nama_lengkap','$ttl','$no_hp','$agama','$jenis_kelamin','$alamat','$sekolah_asal','$nama_wali', '$no_hp_wali', 'Menunggu')";
$query = mysqli_query($conn, $sql);
$id = mysqli_insert_id($conn);
$sql = "UPDATE tb_user SET sudah_daftar = 'True' WHERE id = $id";
$query = mysqli_query($conn, $sql);
$sql = "INSERT INTO tb_cekpendaftaran(id, kode_pendaftaran) VALUES($id,'$kode')";
$query = mysqli_query($conn, $sql);

if ($query) {
    echo "Pendaftaran siswa baru berhasil";
    header("Location: http://localhost/serkom/dashboard.php");
} else {
    echo "Pendaftaran gagal, Error :  " . mysqli_error($conn);
    header("Location: http://localhost/serkom/daftarsiswabaru.php");
}
