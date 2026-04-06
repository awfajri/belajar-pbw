<?php
require_once 'koneksi.php';

$id = isset($_GET['id']) ? (int) $_GET['id'] : 0;
if ($id <= 0) {
    header('Location: index.php?status=error&pesan=' . urlencode('ID data tidak valid.'));
    exit;
}

$stmt = mysqli_prepare($conn, 'SELECT * FROM mahasiswa WHERE id = ?');
mysqli_stmt_bind_param($stmt, 'i', $id);
mysqli_stmt_execute($stmt);
$result = mysqli_stmt_get_result($stmt);
$data = mysqli_fetch_assoc($result);

if (!$data) {
    header('Location: index.php?status=error&pesan=' . urlencode('Data mahasiswa tidak ditemukan.'));
    exit;
}
?>
<!doctype html>
<html lang="id">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Edit Data Mahasiswa</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="page">
        <section class="hero">
            <div class="hero-card">
                <h1>Edit Data Mahasiswa</h1>
                <p>Perbarui data yang dipilih, lalu simpan agar perubahan langsung masuk ke database.</p>
            </div>
            <div class="hero-meta">
                <span class="badge">Update Form</span>
                <strong>ID: <?= (int) $data['id']; ?></strong>
                <ul>
                    <li>Form terisi otomatis</li>
                    <li>Kembali ke halaman utama setelah update</li>
                </ul>
            </div>
        </section>

        <section class="panel">
            <h2>Form Edit</h2>
            <form class="form-grid" action="update.php" method="POST">
                <input type="hidden" name="id" value="<?= (int) $data['id']; ?>">
                <div class="field">
                    <label for="nim">NIM</label>
                    <input type="text" id="nim" name="nim" maxlength="15" value="<?= htmlspecialchars($data['nim']); ?>" required>
                </div>
                <div class="field">
                    <label for="nama">Nama</label>
                    <input type="text" id="nama" name="nama" maxlength="100" value="<?= htmlspecialchars($data['nama']); ?>" required>
                </div>
                <div class="field">
                    <label for="jurusan">Jurusan</label>
                    <input type="text" id="jurusan" name="jurusan" maxlength="50" value="<?= htmlspecialchars($data['jurusan']); ?>" required>
                </div>
                <div class="field">
                    <label for="alamat">Alamat</label>
                    <textarea id="alamat" name="alamat" required><?= htmlspecialchars($data['alamat']); ?></textarea>
                </div>
                <div class="actions">
                    <button type="submit" class="btn btn-primary">Update</button>
                    <a class="btn btn-outline" href="index.php">Batal</a>
                </div>
            </form>
        </section>
    </div>
</body>
</html>
