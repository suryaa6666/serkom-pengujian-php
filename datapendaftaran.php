<?php
require "koneksi.php";
$sql = "SELECT * FROM tb_pendaftaran";
$query = mysqli_query($conn, $sql);
session_start();
if (!$_SESSION["username"]) {
    header("Location: http://localhost/serkom/index.php");
}
if ($_SESSION["role_id"] != 1) {
    header("Location: http://localhost/serkom/dashboard.php");
}
?>

<html>

<head>
    <title> SERKOM - Dashboard </title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/dt/dt-1.11.3/r-2.2.9/sb-1.2.2/datatables.min.css" />

</head>

<body>
    <?php
    require 'component/navbar.php';
    ?>
    <div class="card m-5">
        <div class="card-body">
            <div class="d-flex">
                <a href="datauser.php" class="btn btn-primary flex-fill m-2" type="submit">Data User</a>
                <a href="dashboard.php" class="btn btn-primary flex-fill m-2" type="submit">Dashboard</a>
                <a href="datapendaftaran.php" class="btn btn-primary flex-fill m-2" type="submit">Data Pendaftaran</a>
            </div>
        </div>
    </div>

    <div>
        <h3 class="text-center"> Data Pendaftaran </h3>
    </div>

    <div class="card m-5">
        <div class="card-body">
            <table id="datauser">
                <thead>
                    <th>No. </th>
                    <th>Nama Lengkap</th>
                    <th> No. HP</th>
                    <th> Status </th>
                    <th> Aksi </th>
                </thead>
                <tbody>
                    <?php $no; ?>
                    <?php foreach (mysqli_fetch_all($query) as $data) : ?>
                        <?php @$no++; ?>
                        <tr>
                            <td>
                                <?= $no; ?>
                            </td>
                            <td>
                                <?= $data[1] ?>
                            </td>
                            <td>
                                <?= $data[3] ?>
                            </td>
                            <td>
                                <?php
                                if ($data[10] == "Menunggu") {
                                    echo '<div class="alert-warning"> ' . $data[10] . ' </div>
                                    ';
                                } else if ($data[10] == "Diterima") {
                                    echo '<div class="alert-success"> ' . $data[10] . ' </div>
                                    ';
                                } else if ($data[10] == "Cadangan") {
                                    echo '<div class="alert-primary"> ' . $data[10] . ' </div>
                                    ';
                                } else if ($data[10] == "Tidak Diterima") {
                                    echo '<div class="alert-danger"> ' . $data[10] . ' </div>
                                    ';
                                }
                                ?>
                            </td>
                            <td>
                                <a onclick="return confirm('Apakah anda yakin ingin menghapus data ini?')" href="http://localhost/serkom/proses/proses_hapusdatapendaftaran.php/<?= $data[0] ?>" class="btn btn-danger"> Hapus </a>
                                <a href="editpendaftaran.php/<?= $data[0] ?>" class="btn btn-warning"> Edit </a>
                                <a href="detailpendaftaran.php/<?= $data[0] ?>" class="btn btn-primary"> Detail </a>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>

</body>
<script src="https://code.jquery.com/jquery-3.5.1.js"> </script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
<script type="text/javascript" src="https://cdn.datatables.net/v/dt/dt-1.11.3/r-2.2.9/sb-1.2.2/datatables.min.js"></script>

<script>
    $(document).ready(function() {
        $('#datauser').DataTable();
    });
</script>


</html>