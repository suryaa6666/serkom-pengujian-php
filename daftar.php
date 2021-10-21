<?php
session_start();
if (isset($_SESSION["username"])) {
    if ($_SESSION["username"]) {
        header("Location: http://localhost/serkom/dashboard.php");
    }
}
?>

<html>

<head>
    <title> SERKOM - Daftar </title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
</head>

<body>
    <div class="card m-5">
        <div class="card-body">
            <h1 class="text-center"> Daftar </h1>
            <hr>
            <form method="POST" action="proses/proses_daftar.php">
                <div class="mb-3">
                    <label for="username" class="form-label"> Username </label>
                    <input type="text" class="form-control" id="username" name="username" placeholder="Masukkan username anda...">
                </div>
                <div class="mb-3">
                    <label for="password" class="form-label"> Password </label>
                    <input type="password" class="form-control" id="password" name="password" placeholder="Masukkan password anda...">
                </div>
                <div class="mb-3">
                    <label for="nama_lengkap" class="form-label"> Nama Lengkap </label>
                    <input type="text" class="form-control" id="nama_lengkap" name="nama_lengkap" placeholder="Masukkan nama lengkap anda...">
                </div>
                <div class="mb-3">
                    <label for="ttl" class="form-label"> Tempat, Tanggal Lahir </label>
                    <input type="text" class="form-control" id="ttl" name="ttl" placeholder="Masukkan tempat dan tanggal lahir anda...">
                </div>
                <div class="mb-3">
                    <label for="no_hp" class="form-label"> No. HP </label>
                    <input type="text" class="form-control" id="no_hp" name="no_hp" placeholder="Masukkan nomor hp anda...">
                </div>
                <div class="mb-3">
                    <label for="agama" class="form-label"> Agama </label>
                    <input type="text" class="form-control" id="agama" name="agama" placeholder="Masukkan agama anda...">
                </div>
                <div class="mb-3">
                    <label> Jenis Kelamin : </label>
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="jenis_kelamin" id="laki" value="Laki-laki">
                        <label class="form-check-label" for="laki">
                            Laki-laki
                        </label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="jenis_kelamin" id="perempuan" value="Perempuan">
                        <label class="form-check-label" for="perempuan">
                            Perempuan
                        </label>
                    </div>
                </div>
                <div class="mb-3">
                    <label for="alamat" class="form-label"> Alamat </label>
                    <textarea placeholder="Masukkan alamat anda..." class="form-control" id="alamat" name="alamat"> </textarea>
                </div>
                <div class="d-flex">
                    <input type="submit" class="btn btn-primary flex-fill" value="Daftar">
                </div>
            </form>
            <hr>
            <div>
                <p> Sudah punya akun? <a href="index.php"> Login </a> </p>
            </div>
        </div>
    </div>
</body>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>

</html>