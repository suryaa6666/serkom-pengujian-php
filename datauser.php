<?php
require "koneksi.php";
$sql = "SELECT * FROM tb_user WHERE role_id != 1";
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
        <h3 class="text-center"> Data User </h3>
    </div>

    <div class="container">
        <center>
            <table id="datauser" class="table">
                <thead>
                    <th>No. </th>
                    <th> Username </th>
                    <th>Nama Lengkap</th>
                    <th> Jenis Kelamin </th>
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
                                <?= $data[8] ?>
                            </td>
                            <td>
                                <a onclick="return confirm('Apakah anda yakin ingin menghapus data ini?')" href="http://localhost/serkom/proses/proses_hapusdatauser.php/<?= $data[0] ?>" class="btn btn-danger"> Hapus </a>
                                <a href="edituser.php/<?= $data[0] ?>" class="btn btn-warning"> Edit </a>
                                <a href="detailuser.php/<?= $data[0] ?>" class="btn btn-primary"> Detail </a>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </center>
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