<?php
$db_host = "localhost";
$db_user = "root";
$db_pass = "";
$db_name = "db_krs";

$koneksi = mysqli_connect($db_host, $db_user, $db_pass, $db_name);

if (!$koneksi) {
    die("Koneksi database gagal: " . mysqli_connect_error());
}

// Set charset agar aman dengan UTF-8
mysqli_set_charset($koneksi, "utf8");
?>