<?php
include '../koneksi.php';
if(isset($_POST['kodemk_lama'])){
    $lama = $_POST['kodemk_lama'];
    $baru = $_POST['kodemk_baru'];
    $nama = $_POST['nama'];
    $sks = $_POST['jumlah_sks'];
    if($lama != $baru){
        $cek = mysqli_query($koneksi, "SELECT kodemk FROM matakuliah WHERE kodemk='$baru'");
        if(mysqli_num_rows($cek)>0){
            header("Location: edit.php?kodemk=$lama&error=Kode MK sudah ada");
            exit;
        }
    }
    $stmt = mysqli_prepare($koneksi, "UPDATE matakuliah SET kodemk=?, nama=?, jumlah_sks=? WHERE kodemk=?");
    mysqli_stmt_bind_param($stmt, "ssis", $baru, $nama, $sks, $lama);
    mysqli_stmt_execute($stmt);
    header("Location: index.php?pesan=Data matakuliah berhasil diubah");
}
?>