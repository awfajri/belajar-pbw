<?php
$host = "localhost";
$user = "root";
$pass = "";
$db   = "belajar_php";

// Membuat koneksi
$koneksi = mysqli_connect($host, $user, $pass, $db);

// Alias agar file lain bisa memakai $conn atau $koneksi.
$conn = $koneksi;

// Memeriksa koneksi
if (!$koneksi) {
    die("Koneksi gagal: " . mysqli_connect_error());
}
?>
