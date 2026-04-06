<?php
require_once 'koneksi.php';

$pesan = $_GET['pesan'] ?? '';
$status = $_GET['status'] ?? '';

function e($value)
{
    return htmlspecialchars((string) $value, ENT_QUOTES, 'UTF-8');
}

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
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:ital,wght@0,200..800;1,200..800&display=swap" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="style.css">
</head>
<body class="bg-soft">
    <div class="container py-4 py-lg-5">
        <div class="row mb-4">
            <div class="col-12">
                <div class="card border-0 shadow-sm bg-primary text-white overflow-hidden hero-card">
                    <div class="card-body p-4 p-lg-5">
                        <div class="row align-items-center g-4">
                            <div class="col-lg-8">
                                <h1 class="display-6 fw-bold mb-3">Siska Data Mahasiswa UNSIKA</h1>
                                <p class="mb-0 text-white-50">
                                    Midtes - Pemrograman Berbasis Web<br>
                                    Auf Fajri Ramadhani - 2410631170059
                                </p>
                            </div>
                            <div class="col-lg-4">
                                <div class="bg-white bg-opacity-10 rounded-4 p-3">
                                    <p class="fw-semibold mb-2">Fitur Utama</p>
                                    <ul class="mb-0 ps-3 small lh-lg">
                                        <li>Create</li>
                                        <li>Read</li>
                                        <li>Update</li>
                                        <li>Delete</li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <?php if ($pesan !== ''): ?>
            <div class="alert <?= $status === 'error' ? 'alert-danger' : 'alert-success'; ?> shadow-sm border-0">
                <?= e($pesan); ?>
            </div>
        <?php endif; ?>

        <div class="row g-4">
            <div class="col-lg-4">
                <div class="card border-0 shadow-sm h-100">
                    <div class="card-body p-4">
                        <h2 class="h4 mb-3">Tambah Data Mahasiswa</h2>
                        <form class="needs-bootstrap" action="insert.php" method="POST">
                            <div class="mb-3">
                                <label for="nim" class="form-label">NIM</label>
                                <input type="text" class="form-control form-control-lg" id="nim" name="nim" maxlength="15" required>
                            </div>
                            <div class="mb-3">
                                <label for="nama" class="form-label">Nama</label>
                                <input type="text" class="form-control form-control-lg" id="nama" name="nama" maxlength="100" required>
                            </div>
                            <div class="mb-3">
                                <label for="jurusan" class="form-label">Jurusan</label>
                                <input type="text" class="form-control form-control-lg" id="jurusan" name="jurusan" maxlength="50" required>
                            </div>
                            <div class="mb-3">
                                <label for="alamat" class="form-label">Alamat</label>
                                <textarea class="form-control" id="alamat" name="alamat" rows="4" required></textarea>
                            </div>
                            <button type="submit" class="btn btn-primary btn-lg w-100">Simpan</button>
                        </form>
                    </div>
                </div>
            </div>

            <div class="col-lg-8">
                <div class="card border-0 shadow-sm">
                    <div class="card-body p-4">
                        <div class="d-flex flex-column flex-md-row justify-content-between align-items-md-center gap-2 mb-3">
                            <h2 class="h4 mb-0">Data Mahasiswa</h2>
                        </div>
                        <div class="table-responsive">
                            <table class="table table-hover align-middle mb-0">
                                <thead class="table-light">
                                    <tr>
                                        <th scope="col">No</th>
                                        <th scope="col">NIM</th>
                                        <th scope="col">Nama</th>
                                        <th scope="col">Jurusan</th>
                                        <th scope="col">Alamat</th>
                                        <th scope="col">Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php if (mysqli_num_rows($result) > 0): ?>
                                        <?php $no = 1; ?>
                                        <?php while ($row = mysqli_fetch_assoc($result)): ?>
                                            <tr>
                                                <td><?= $no++; ?></td>
                                                    <td><?= e($row['nim']); ?></td>
                                                    <td><?= e($row['nama']); ?></td>
                                                    <td><?= e($row['jurusan']); ?></td>
                                                    <td><?= nl2br(e($row['alamat'])); ?></td>
                                                <td>
                                                    <div class="d-flex flex-wrap gap-2">
                                                        <a class="btn btn-outline-primary btn-sm" href="edit.php?id=<?= (int) $row['id']; ?>">Edit</a>
                                                        <a class="btn btn-outline-danger btn-sm" href="delete.php?id=<?= (int) $row['id']; ?>" onclick="return confirm('Yakin ingin menghapus data mahasiswa ini?');">Hapus</a>
                                                    </div>
                                                </td>
                                            </tr>
                                        <?php endwhile; ?>
                                    <?php else: ?>
                                        <tr>
                                            <td colspan="6">
                                                <div class="text-center text-muted py-4">Belum ada data mahasiswa yang disimpan.</div>
                                            </td>
                                        </tr>
                                    <?php endif; ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>
