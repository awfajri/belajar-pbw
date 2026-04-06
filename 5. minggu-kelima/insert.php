<?php
include 'koneksi.php';

$nama = $_POST['nama'];
$email = $_POST['email'];

mysqli_query($conn, "INSERT into mahasiswa(nama, email) values('$nama', '$email')");

header("location: index.php");
?>