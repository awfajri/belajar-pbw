<?php
$db_host = "localhost";
$db_user = "root";
$db_pass = "";
$db_name = "my_blog";

// Menyambungkan PHP ke MySQL
$koneksi = mysqli_connect($db_host, $db_user, $db_pass, $db_name);

// Mengecek apakah koneksi berhasil
if (!$koneksi) {
    die("Koneksi database gagal: " . mysqli_connect_error());
}
?>