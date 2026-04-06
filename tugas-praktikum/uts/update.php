<?php
require_once 'koneksi.php';

$id = isset($_POST['id']) ? (int) $_POST['id'] : 0;
$nim = trim($_POST['nim'] ?? '');
$nama = trim($_POST['nama'] ?? '');
$jurusan = trim($_POST['jurusan'] ?? '');
$alamat = trim($_POST['alamat'] ?? '');

if ($id <= 0 || $nim === '' || $nama === '' || $jurusan === '' || $alamat === '') {
    header('Location: index.php?status=error&pesan=' . urlencode('Semua field wajib diisi.'));
    exit;
}

$stmt = mysqli_prepare($conn, 'UPDATE mahasiswa SET nim = ?, nama = ?, jurusan = ?, alamat = ? WHERE id = ?');
if (!$stmt) {
    header('Location: index.php?status=error&pesan=' . urlencode('Gagal menyiapkan query update.'));
    exit;
}

mysqli_stmt_bind_param($stmt, 'ssssi', $nim, $nama, $jurusan, $alamat, $id);

if (mysqli_stmt_execute($stmt)) {
    header('Location: index.php?status=success&pesan=' . urlencode('Data mahasiswa berhasil diperbarui.'));
    exit;
}

header('Location: index.php?status=error&pesan=' . urlencode('Data mahasiswa gagal diperbarui.'));
exit;
