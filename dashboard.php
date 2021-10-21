<?php
require 'koneksi.php';
session_start();
$username_session = $_SESSION["username"];
if (!$_SESSION["username"]) {
    header("Location: http://localhost/serkom/index.php");
}
$data = mysqli_fetch_assoc(mysqli_query($conn, "SELECT * FROM tb_user WHERE username = '$username_session'"));
$id_data_pendaftaran = $data["id"];
$data_pendaftaran = mysqli_fetch_assoc(mysqli_query($conn, "SELECT * FROM tb_pendaftaran WHERE id = '$id_data_pendaftaran'"));
$kode_query = mysqli_query($conn, "SELECT * FROM tb_cekpendaftaran WHERE id = '$id_data_pendaftaran'");
$kode_pendaftaran = "";
if (mysqli_num_rows($kode_query) > 0) {
    $kode_pendaftaran = mysqli_fetch_assoc($kode_query)["kode_pendaftaran"];
}
?>
<html>

<head>
    <title> SERKOM - Dashboard </title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
</head>

<body>
    <?php
    require 'component/navbar.php';
    ?>
    <div class="card m-5">
        <div class="card-body">
            <div class="d-flex">
                <?=
                $_SESSION["role_id"] == 1 ? '<a href="datauser.php" class="btn btn-primary flex-fill m-2" type="submit">Data User</a>
                <a href="dashboard.php" class="btn btn-primary flex-fill m-2" type="submit">Dashboard</a>
                <a href="datapendaftaran.php" class="btn btn-primary flex-fill m-2" type="submit">Data Pendaftaran</a>' :
                    '<a href="dashboard.php" class="btn btn-primary flex-fill m-2" type="submit">Dashboard</a>';
                ?>
            </div>
        </div>
    </div>

    <div>
        <h3 class="text-center"> Dashboard </h3>
    </div>

    <?php if ($_SESSION["role_id"] == 1) : ?>
        <form method="POST" action="http://localhost/serkom/proses/proses_cekkodependaftaran.php">
            <div class="m-5 d-flex">
                <input type="text" class="form-control" id="cekkodependaftaran" name="cekkodependaftaran" placeholder="Masukkan kode pendaftaran disini...">
                <input class="btn btn-primary flex-fill m-2" type="submit" value="Cek Kode Pendaftaran">
            </div>
        </form>
    <?php endif; ?>

    <?php if ($_SESSION["role_id"] != 1) : ?>
        <div class="card m-5">
            <div class="card-body">
                <div class="alert alert-<?= $data["sudah_daftar"] == 'True' ? 'primary' : 'warning' ?>" role="alert">
                    <h5>
                        <?= $data["sudah_daftar"] == 'True' ? 'Anda sudah melakukan pendaftaran, silahakan tunggu status penerimaan terupdate dengan terus memantau halaman ini (me-refresh) : ' : 'Silahkan melakukan pendaftaran siswa baru dengan menekan tombol berikut :' ?>
                        <div class="mt-3">
                            <?php
                            if ($data["sudah_daftar"] == 'True') {
                                if ($data_pendaftaran["status_penerimaan"] == "Menunggu") {
                                    echo '<div class="alert-warning p-3"> Status : ' . $data_pendaftaran["status_penerimaan"] . ' </div>
                                    ';
                                } else if ($data_pendaftaran["status_penerimaan"] == "Diterima") {
                                    echo '<div class="alert-success p-3"> Status : ' . $data_pendaftaran["status_penerimaan"] . ' <div> Kode Pendaftaran : ' . $kode_pendaftaran . ' </div> <div class="mt-3"><button class="btn btn-primary" onclick="print();"> Cetak </button> </div> </div>
                                    ';
                                } else if ($data_pendaftaran["status_penerimaan"] == "Cadangan") {
                                    echo '<div class="alert-primary p-3"> Status : ' . $data_pendaftaran["status_penerimaan"] . ' </div>
                                    ';
                                } else if ($data_pendaftaran["status_penerimaan"] == "Tidak Diterima") {
                                    echo '<div class="alert-danger p-3"> Status : ' . $data_pendaftaran["status_penerimaan"] . ' </div>
                                    ';
                                }
                            }
                            ?>
                        </div>
                    </h5>
                    <?=
                    $data["sudah_daftar"] == 'True' ? '' : '<a class="btn btn-success" href="daftarsiswabaru.php"> Daftar Siswa Baru </a>';
                    ?>
                </div>
            </div>
        </div>
    <?php endif; ?>
</body>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>

</html>