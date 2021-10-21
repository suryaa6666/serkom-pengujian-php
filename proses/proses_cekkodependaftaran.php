<?php

require '../koneksi.php';
$kode = $_POST["cekkodependaftaran"];
$sql = "SELECT * FROM tb_cekpendaftaran WHERE kode_pendaftaran = '$kode'";
$query = mysqli_query($conn, $sql);
// nizh2qr5phcnsgnm

if (@mysqli_num_rows($query) > 0) {
    echo "Kode diterima!";
    header("refresh:1; URL=http://localhost/serkom/dashboard.php");    
} else {
    echo "Kode tidak valid!";
    header("refresh:1; URL=http://localhost/serkom/dashboard.php");       
}

