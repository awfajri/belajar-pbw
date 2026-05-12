<?php
include '../koneksi.php';

if (isset($_POST['simpan'])) {
    $npm = trim($_POST['npm']);
    $nama = trim($_POST['nama']);
    $jurusan = $_POST['jurusan'];
    $alamat = trim($_POST['alamat']);

    // Validasi NPM unik
    $cek = mysqli_prepare($koneksi, "SELECT npm FROM mahasiswa WHERE npm = ?");
    mysqli_stmt_bind_param($cek, "s", $npm);
    mysqli_stmt_execute($cek);
    mysqli_stmt_store_result($cek);
    if (mysqli_stmt_num_rows($cek) > 0) {
        header("Location: tambah.php?error=NPM sudah terdaftar!");
        exit;
    }
    mysqli_stmt_close($cek);

    $stmt = mysqli_prepare($koneksi, "INSERT INTO mahasiswa (npm, nama, jurusan, alamat) VALUES (?, ?, ?, ?)");
    mysqli_stmt_bind_param($stmt, "ssss", $npm, $nama, $jurusan, $alamat);
    
    if (mysqli_stmt_execute($stmt)) {
        header("Location: index.php?pesan=Data mahasiswa berhasil ditambahkan");
    } else {
        header("Location: tambah.php?error=Gagal menambahkan data");
    }
    mysqli_stmt_close($stmt);
    mysqli_close($koneksi);
} else {
    header("Location: tambah.php");
}
?>