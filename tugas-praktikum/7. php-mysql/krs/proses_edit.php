<?php
include '../koneksi.php';
if(isset($_POST['id'])){
    $id = $_POST['id'];
    $npm = $_POST['mahasiswa_npm'];
    $kodemk = $_POST['matakuliah_kodemk'];
    // Cek duplikasi selain id sendiri
    $cek = mysqli_prepare($koneksi, "SELECT id FROM krs WHERE mahasiswa_npm=? AND matakuliah_kodemk=? AND id != ?");
    mysqli_stmt_bind_param($cek, "ssi", $npm, $kodemk, $id);
    mysqli_stmt_execute($cek);
    mysqli_stmt_store_result($cek);
    if(mysqli_stmt_num_rows($cek) > 0){
        header("Location: edit.php?id=$id&error=Mahasiswa sudah mengambil mata kuliah ini");
        exit;
    }
    mysqli_stmt_close($cek);
    
    $stmt = mysqli_prepare($koneksi, "UPDATE krs SET mahasiswa_npm=?, matakuliah_kodemk=? WHERE id=?");
    mysqli_stmt_bind_param($stmt, "ssi", $npm, $kodemk, $id);
    if(mysqli_stmt_execute($stmt)){
        header("Location: index.php?pesan=KRS berhasil diubah");
    } else {
        header("Location: edit.php?id=$id&error=Gagal mengupdate KRS");
    }
    mysqli_stmt_close($stmt);
} else {
    header("Location: index.php");
}
?>