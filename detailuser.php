<?php
require 'koneksi.php';
$id = explode('/', $_SERVER["REQUEST_URI"])[3];
$sql = "SELECT * FROM tb_user WHERE id = $id";
$query = mysqli_query($conn, $sql);
$data  = mysqli_fetch_assoc($query);
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
    <title> SERKOM - Detail User </title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
</head>

<body>
    <div class="card m-5">
        <div class="card-body">
            <h1 class="text-center"> Detail User </h1>
            <hr>
            <div class="mb-3">
                <label for="username" class="form-label"> Username </label>
                <input value="<?= $data["username"] ?>" readonly type="text" class="form-control" id="username" name="username" placeholder="Masukkan username anda...">
            </div>
            <div class="mb-3">
                <label for="nama_lengkap" class="form-label"> Nama Lengkap </label>
                <input value="<?= $data["nama_lengkap"] ?>" readonly type="text" class="form-control" id="nama_lengkap" name="nama_lengkap" placeholder="Masukkan nama lengkap anda...">
            </div>
            <div class="mb-3">
                <label for="ttl" class="form-label"> Tempat, Tanggal Lahir </label>
                <input value="<?= $data["ttl"] ?>" readonly type="text" class="form-control" id="ttl" name="ttl" placeholder="Masukkan tempat dan tanggal lahir anda...">
            </div>
            <div class="mb-3">
                <label for="no_hp" class="form-label"> No. HP </label>
                <input value="<?= $data["no_hp"] ?>" readonly type="text" class="form-control" id="no_hp" name="no_hp" placeholder="Masukkan nomor hp anda...">
            </div>
            <div class="mb-3">
                <label for="agama" class="form-label"> Agama </label>
                <input value="<?= $data["agama"] ?>" readonly type="text" class="form-control" id="agama" name="agama" placeholder="Masukkan agama anda...">
            </div>
            <div class="mb-3">
                <label> Jenis Kelamin : </label>
                <div class="form-check">
                    <input <?= $data["jenis_kelamin"] == "Laki-laki" ? "checked" : "" ?> disabled class="form-check-input" type="radio" name="jenis_kelamin" id="laki" value="Laki-laki">
                    <label class="form-check-label" for="laki">
                        Laki-laki
                    </label>
                </div>
                <div class="form-check">
                    <input <?= $data["jenis_kelamin"] == "Perempuan" ? "checked" : "" ?> disabled class="form-check-input" type="radio" name="jenis_kelamin" id="perempuan" value="Perempuan">
                    <label class="form-check-label" for="perempuan">
                        Perempuan
                    </label>
                </div>
            </div>
            <div class="mb-3">
                <label for="alamat" class="form-label"> Alamat </label>
                <textarea readonly placeholder="Masukkan alamat anda..." class="form-control" id="alamat" name="alamat"><?= $data["alamat"] ?></textarea>
            </div>
        </div>
    </div>
</body>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>

</html>