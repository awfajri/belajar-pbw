<?php
include '../koneksi.php';
if(isset($_POST['mahasiswa_npm']) && isset($_POST['matakuliah_kodemk'])){
    $npm = $_POST['mahasiswa_npm'];
    $kodemk = $_POST['matakuliah_kodemk'];
    // cek apakah sudah ada KRS yang sama (optional, bisa dicegah duplikasi)
    $cek = mysqli_prepare($koneksi, "SELECT id FROM krs WHERE mahasiswa_npm=? AND matakuliah_kodemk=?");
    mysqli_stmt_bind_param($cek, "ss", $npm, $kodemk);
    mysqli_stmt_execute($cek);
    mysqli_stmt_store_result($cek);
    if(mysqli_stmt_num_rows($cek) > 0){
        header("Location: tambah.php?error=Mahasiswa sudah mengambil mata kuliah ini");
        exit;
    }
    mysqli_stmt_close($cek);
    
    $stmt = mysqli_prepare($koneksi, "INSERT INTO krs (mahasiswa_npm, matakuliah_kodemk) VALUES (?, ?)");
    mysqli_stmt_bind_param($stmt, "ss", $npm, $kodemk);
    if(mysqli_stmt_execute($stmt)){
        header("Location: index.php?pesan=KRS berhasil ditambahkan");
    } else {
        header("Location: tambah.php?error=Gagal menambahkan KRS");
    }
    mysqli_stmt_close($stmt);
} else {
    header("Location: tambah.php");
}
?>