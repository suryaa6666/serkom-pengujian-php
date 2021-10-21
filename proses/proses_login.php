<?php
require "../koneksi.php";
error_reporting(E_ERROR | E_PARSE);

$username = trim(htmlspecialchars($_POST["username"]));
$password = $_POST["password"];

$sql = "SELECT * FROM tb_user WHERE username = '$username' && password = '$password'";
$query = mysqli_query($conn, $sql);

if (mysqli_num_rows($query) > 0) {
    session_start();
    $_SESSION["username"] = $username;
    $_SESSION["role_id"] = mysqli_fetch_assoc($query)["role_id"];
    header("Location: http://localhost/serkom/dashboard.php");
} else {
    session_start();
    $_SESSION["flash_login"] = "Username / Password salah!";
    header("Location: http://localhost/serkom/index.php");
}
