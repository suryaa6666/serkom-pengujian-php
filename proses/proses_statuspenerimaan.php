<?php
require '../koneksi.php';
session_start();
$id = $_POST["id"];
$data = mysqli_fetch_assoc(mysqli_query($conn, "SELECT * FROM tb_user WHERE id = $id"));
$id_status_penerimaan = $data["id"];
$status_penerimaan = trim(htmlspecialchars($_POST["status_penerimaan"]));
$sql = "UPDATE tb_pendaftaran SET status_penerimaan = '$status_penerimaan' WHERE id = $id_status_penerimaan";
$query = mysqli_query($conn, $sql);

if ($query) {
    header('Location: http://localhost/serkom/datapendaftaran.php');
} else {
    header('Location: http://localhost/serkom/datapendaftaran.php');
}
