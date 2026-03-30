<?php
include 'koneksi.php';

// Pakai koneksi yang tersedia, baik dari $koneksi maupun $conn.
$conn = $koneksi ?? ($conn ?? null);
if (!$conn) {
	die('Koneksi database tidak ditemukan.');
}

$id = isset($_GET['id']) ? (int) $_GET['id'] : 0;
if ($id <= 0) {
	die('ID tidak valid.');
}

$result = mysqli_query($conn, "SELECT * FROM mahasiswa WHERE id = $id");
$data = mysqli_fetch_assoc($result);

if (!$data) {
	die('Data tidak ditemukan.');
}
?>

<h2>Edit Data Mahasiswa</h2>

<form method="POST" action="update.php">
	<input type="hidden" name="id" value="<?= (int) $data['id']; ?>">

	<label for="nama">Nama:</label>
	<input type="text" id="nama" name="nama" value="<?= htmlspecialchars($data['nama']); ?>" required>
	<br><br>

	<label for="email">Email:</label>
	<input type="email" id="email" name="email" value="<?= htmlspecialchars($data['email']); ?>" required>
	<br><br>

	<button type="submit">Update</button>
	<a href="index.php">Batal</a>
</form>
