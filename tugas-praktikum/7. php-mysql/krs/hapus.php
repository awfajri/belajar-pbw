<?php
include '../koneksi.php';
if(isset($_GET['id'])){
    $id = $_GET['id'];
    $stmt = mysqli_prepare($koneksi, "DELETE FROM krs WHERE id=?");
    mysqli_stmt_bind_param($stmt, "i", $id);
    mysqli_stmt_execute($stmt);
    header("Location: index.php?pesan=KRS berhasil dihapus");
} else {
    header("Location: index.php");
}
?>