<?php
include '../koneksi.php';
if(isset($_GET['kodemk'])){
    $kodemk = $_GET['kodemk'];
    $stmt = mysqli_prepare($koneksi, "DELETE FROM matakuliah WHERE kodemk=?");
    mysqli_stmt_bind_param($stmt, "s", $kodemk);
    mysqli_stmt_execute($stmt);
    header("Location: index.php?pesan=Data matakuliah dihapus");
}
?>