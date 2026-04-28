<?php
// Hapus data mahasiswa berdasarkan NPM
include '../koneksi.php';

if (isset($_GET['npm'])) {
    $npm = $_GET['npm'];

    // Gunakan prepared statement untuk keamanan
    $stmt = mysqli_prepare($koneksi, "DELETE FROM mahasiswa WHERE npm = ?");
    mysqli_stmt_bind_param($stmt, "s", $npm);
    
    if (mysqli_stmt_execute($stmt)) {
        // Jika berhasil, redirect ke halaman daftar mahasiswa dengan pesan sukses
        header("Location: index.php?pesan=Data mahasiswa berhasil dihapus");
    } else {
        // Jika gagal, redirect dengan pesan error
        header("Location: index.php?pesan=Gagal menghapus data mahasiswa");
    }
    mysqli_stmt_close($stmt);
} else {
    // Jika tidak ada parameter npm, langsung kembali ke daftar
    header("Location: index.php");
}
mysqli_close($koneksi);
?>