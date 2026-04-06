<?php
require_once 'koneksi.php';

$id = isset($_GET['id']) ? (int) $_GET['id'] : 0;

if ($id <= 0) {
    header('Location: index.php?status=error&pesan=' . urlencode('ID data tidak valid.'));
    exit;
}

$stmt = mysqli_prepare($conn, 'DELETE FROM mahasiswa WHERE id = ?');
if (!$stmt) {
    header('Location: index.php?status=error&pesan=' . urlencode('Gagal menyiapkan query hapus.'));
    exit;
}

mysqli_stmt_bind_param($stmt, 'i', $id);

if (mysqli_stmt_execute($stmt)) {
    header('Location: index.php?status=success&pesan=' . urlencode('Data mahasiswa berhasil dihapus.'));
    exit;
}

header('Location: index.php?status=error&pesan=' . urlencode('Data mahasiswa gagal dihapus.'));
exit;
