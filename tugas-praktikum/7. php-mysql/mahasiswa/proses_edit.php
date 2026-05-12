<?php
include '../koneksi.php';

if (isset($_POST['update'])) {
    $npm_lama = $_POST['npm_lama'];
    $npm_baru = trim($_POST['npm_baru']);
    $nama = trim($_POST['nama']);
    $jurusan = $_POST['jurusan'];
    $alamat = trim($_POST['alamat']);

    // Jika NPM berubah, cek apakah NPM baru sudah ada
    if ($npm_lama != $npm_baru) {
        $cek = mysqli_prepare($koneksi, "SELECT npm FROM mahasiswa WHERE npm = ?");
        mysqli_stmt_bind_param($cek, "s", $npm_baru);
        mysqli_stmt_execute($cek);
        mysqli_stmt_store_result($cek);
        if (mysqli_stmt_num_rows($cek) > 0) {
            header("Location: edit.php?npm=$npm_lama&error=NPM baru sudah digunakan orang lain");
            exit;
        }
        mysqli_stmt_close($cek);
    }

    $stmt = mysqli_prepare($koneksi, "UPDATE mahasiswa SET npm=?, nama=?, jurusan=?, alamat=? WHERE npm=?");
    mysqli_stmt_bind_param($stmt, "sssss", $npm_baru, $nama, $jurusan, $alamat, $npm_lama);
    
    if (mysqli_stmt_execute($stmt)) {
        header("Location: index.php?pesan=Data mahasiswa berhasil diubah");
    } else {
        header("Location: edit.php?npm=$npm_lama&error=Gagal mengupdate data");
    }
    mysqli_stmt_close($stmt);
    mysqli_close($koneksi);
} else {
    header("Location: index.php");
}
?>