<?php
require_once 'koneksi.php';

$nim = trim($_POST['nim'] ?? '');
$nama = trim($_POST['nama'] ?? '');
$jurusan = trim($_POST['jurusan'] ?? '');
$alamat = trim($_POST['alamat'] ?? '');

if ($nim === '' || $nama === '' || $jurusan === '' || $alamat === '') {
    header('Location: index.php?status=error&pesan=' . urlencode('Semua field wajib diisi.'));
    exit;
}

$stmt = mysqli_prepare($conn, 'INSERT INTO mahasiswa (nim, nama, jurusan, alamat) VALUES (?, ?, ?, ?)');
if (!$stmt) {
    header('Location: index.php?status=error&pesan=' . urlencode('Gagal menyiapkan query simpan.'));
    exit;
}

mysqli_stmt_bind_param($stmt, 'ssss', $nim, $nama, $jurusan, $alamat);

if (mysqli_stmt_execute($stmt)) {
    header('Location: index.php?status=success&pesan=' . urlencode('Data mahasiswa berhasil disimpan.'));
    exit;
}

header('Location: index.php?status=error&pesan=' . urlencode('Data mahasiswa gagal disimpan.'));
exit;
