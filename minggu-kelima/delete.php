<?php
include 'koneksi.php';

// Pakai koneksi yang tersedia, baik dari $koneksi maupun $conn.
$conn = $koneksi ?? ($conn ?? null);
if (!$conn) {
	die('Koneksi database tidak ditemukan.');
}

$id = isset($_GET['id']) ? (int) $_GET['id'] : 0;

if ($id > 0) {
	mysqli_query($conn, "DELETE FROM mahasiswa WHERE id = $id");
}

header('Location: index.php');
exit;
