<?php
require_once 'koneksi.php';

$pesan = isset($_GET['pesan']) ? $_GET['pesan'] : '';
$status = isset($_GET['status']) ? $_GET['status'] : '';

$result = mysqli_query($conn, 'SELECT * FROM mahasiswa ORDER BY id DESC');
if (!$result) {
    die('Gagal mengambil data: ' . mysqli_error($conn));
}
?>
<!doctype html>
<html lang="id">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Sistem Data Mahasiswa</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="page">
        <section class="hero">
            <div class="hero-card">
                <h1>Sistem Data Mahasiswa</h1>
                <p>
                    Aplikasi CRUD native PHP untuk mengelola data mahasiswa kelas 4F.
                    Data dapat ditambahkan, ditampilkan, diubah, dan dihapus langsung dari database MySQL.
                </p>
            </div>
            <div class="hero-meta">
                <span class="badge">db_kampus</span>
                <strong>Fitur Utama</strong>
                <ul>
                    <li>Create, Read, Update, Delete</li>
                    <li>Validasi input tidak boleh kosong</li>
                    <li>Konfirmasi sebelum hapus</li>
                </ul>
            </div>
        </section>

        <?php if ($pesan !== ''): ?>
            <div class="alert <?= htmlspecialchars($status === 'error' ? 'alert-danger' : 'alert-success'); ?>">
                <?= htmlspecialchars($pesan); ?>
            </div>
        <?php endif; ?>

        <div class="grid">
            <section class="panel">
                <h2>Tambah Data Mahasiswa</h2>
                <form class="form-grid" action="insert.php" method="POST">
                    <div class="field">
                        <label for="nim">NIM</label>
                        <input type="text" id="nim" name="nim" maxlength="15" required>
                    </div>
                    <div class="field">
                        <label for="nama">Nama</label>
                        <input type="text" id="nama" name="nama" maxlength="100" required>
                    </div>
                    <div class="field">
                        <label for="jurusan">Jurusan</label>
                        <input type="text" id="jurusan" name="jurusan" maxlength="50" required>
                    </div>
                    <div class="field">
                        <label for="alamat">Alamat</label>
                        <textarea id="alamat" name="alamat" required></textarea>
                    </div>
                    <div class="actions">
                        <button type="submit" class="btn btn-primary">Simpan</button>
                    </div>
                </form>
            </section>

            <section class="panel">
                <h2>Data Mahasiswa</h2>
                <div class="table-wrap">
                    <table>
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>NIM</th>
                                <th>Nama</th>
                                <th>Jurusan</th>
                                <th>Alamat</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php if (mysqli_num_rows($result) > 0): ?>
                                <?php $no = 1; ?>
                                <?php while ($row = mysqli_fetch_assoc($result)): ?>
                                    <tr>
                                        <td><?= $no++; ?></td>
                                        <td><?= htmlspecialchars($row['nim']); ?></td>
                                        <td><?= htmlspecialchars($row['nama']); ?></td>
                                        <td><?= htmlspecialchars($row['jurusan']); ?></td>
                                        <td><?= nl2br(htmlspecialchars($row['alamat'])); ?></td>
                                        <td>
                                            <div class="row-actions">
                                                <a class="btn btn-outline" href="edit.php?id=<?= (int) $row['id']; ?>">Edit</a>
                                                <a class="btn btn-danger" href="delete.php?id=<?= (int) $row['id']; ?>" onclick="return confirm('Yakin ingin menghapus data mahasiswa ini?');">Hapus</a>
                                            </div>
                                        </td>
                                    </tr>
                                <?php endwhile; ?>
                            <?php else: ?>
                                <tr>
                                    <td colspan="6">
                                        <div class="empty-state">Belum ada data mahasiswa yang disimpan.</div>
                                    </td>
                                </tr>
                            <?php endif; ?>
                        </tbody>
                    </table>
                </div>
            </section>
        </div>
    </div>
</body>
</html>
