<?php
session_start();

// Menghapus session name untuk proses logout
unset($_SESSION['name']);

$_SESSION['success'] = "Logout Successful";
header("Location: login.php");
exit();
?>