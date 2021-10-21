<?php
require 'koneksi.php';
session_start();
$username_session = $_SESSION["username"];
if (!$_SESSION["username"]) {
    header("Location: http://localhost/serkom/index.php");
}
$data = mysqli_fetch_assoc(mysqli_query($conn, "SELECT * FROM tb_user WHERE username = '$username_session'"));
if ($data["sudah_daftar"] == 'True') {
    header("Location: http://localhost/serkom/dashboard.php");
}
?>

<html>

<head>
    <title> SERKOM - Daftar </title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
</head>

<body>
    <?php
    require 'component/navbar.php';
    ?>
    <div class="card m-5">
        <div class="card-body">
            <h1 class="text-center"> Form Pendaftaran Siswa Baru </h1>
            <hr>
            <form method="POST" action="proses/proses_daftarsiswabaru.php">
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
                        <input disabled <?= $data["jenis_kelamin"] == "Laki-laki" ? "checked" : "" ?> class="form-check-input" type="radio" id="laki" value="Laki-laki">
                        <label class="form-check-label" for="laki">
                            Laki-laki
                        </label>
                    </div>
                    <div class="form-check">
                        <input disabled <?= $data["jenis_kelamin"] == "Perempuan" ? "checked" : "" ?> class="form-check-input" type="radio" id="perempuan" value="Perempuan">
                        <label class="form-check-label" for="perempuan">
                            Perempuan
                        </label>
                    </div>
                </div>
                <input type="hidden" name="jenis_kelamin" value="<?= $data["jenis_kelamin"] == "Laki-laki" ? "Laki-laki" : "Perempuan" ?>">
                <div class="mb-3">
                    <label for="alamat" class="form-label"> Alamat </label>
                    <textarea readonly placeholder="Masukkan alamat anda..." class="form-control" id="alamat" name="alamat"> <?= $data["alamat"] ?> </textarea>
                </div>
                <div class="mb-3">
                    <label for="sekolah_asal" class="form-label"> Sekolah Asal </label>
                    <input type="text" class="form-control" id="sekolah_asal" name="sekolah_asal" placeholder="Masukkan sekolah asal anda...">
                </div>
                <div class="mb-3">
                    <label for="nama_wali" class="form-label"> Nama Orang Tua Wali </label>
                    <input type="text" class="form-control" id="nama_wali" name="nama_wali" placeholder="Masukkan nama orang tua wali anda...">
                </div>
                <div class="mb-3">
                    <label for="no_hp_wali" class="form-label"> No. HP Orang Tua Wali </label>
                    <input type="text" class="form-control" id="no_hp_wali" name="no_hp_wali" placeholder="Masukkan nomor hp wali anda...">
                </div>
                <div class="d-flex">
                    <input type="submit" class="btn btn-primary flex-fill" value="Submit">
                </div>
            </form>

        </div>
    </div>
</body>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>

</html>