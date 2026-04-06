<?php
include 'koneksi.php';

// Pakai koneksi yang tersedia, baik dari $koneksi maupun $conn.
$conn = $koneksi ?? ($conn ?? null);
if (!$conn) {
	die('Koneksi database tidak ditemukan.');
}

$id = isset($_POST['id']) ? (int) $_POST['id'] : 0;
$nama = isset($_POST['nama']) ? trim($_POST['nama']) : '';
$email = isset($_POST['email']) ? trim($_POST['email']) : '';

if ($id <= 0 || $nama === '' || $email === '') {
	die('Data tidak lengkap.');
}

if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
	die('Format email tidak valid.');
}

$nama = mysqli_real_escape_string($conn, $nama);
$email = mysqli_real_escape_string($conn, $email);

mysqli_query($conn, "UPDATE mahasiswa SET nama = '$nama', email = '$email' WHERE id = $id");

header('Location: index.php');
exit;
