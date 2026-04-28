<?php
include '../koneksi.php';
if(isset($_POST['kodemk'])){
    $kodemk = $_POST['kodemk'];
    $nama = $_POST['nama'];
    $sks = $_POST['jumlah_sks'];
    // cek duplikat
    $cek = mysqli_query($koneksi, "SELECT kodemk FROM matakuliah WHERE kodemk='$kodemk'");
    if(mysqli_num_rows($cek)>0){
        header("Location: tambah.php?error=Kode MK sudah ada");
        exit;
    }
    $stmt = mysqli_prepare($koneksi, "INSERT INTO matakuliah VALUES (?,?,?)");
    mysqli_stmt_bind_param($stmt, "ssi", $kodemk, $nama, $sks);
    mysqli_stmt_execute($stmt);
    header("Location: index.php?pesan=Data matakuliah berhasil ditambahkan");
}
?>