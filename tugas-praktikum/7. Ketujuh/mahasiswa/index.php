<?php
// Halaman daftar mahasiswa - tabel bersih tanpa card, tombol back di kiri atas
include '../koneksi.php';
$pesan = isset($_GET['pesan']) ? $_GET['pesan'] : '';
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Data Mahasiswa</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Sora:wght@100..800&display=swap" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        * { font-family: 'Sora', sans-serif; }
        body { background-color: #f8f9fa; }
        .table-wrapper {
            background: white;
            border-radius: 12px;
            padding: 1.5rem;
            box-shadow: 0 2px 8px rgba(0,0,0,0.05);
        }
        .btn-maroon {
            background-color: #6E1A37;
            color: white;
        }
        .btn-maroon:hover {
            background-color: #4e1227;
            color: white;
        }
        .btn-outline-maroon {
            border-color: #6E1A37;
            color: #6E1A37;
        }
        .btn-outline-maroon:hover {
            background-color: #6E1A37;
            color: white;
        }
        th {
            background-color: #e9ecef;
            font-weight: 600;
        }
    </style>
</head>
<body>
<div class="container my-5">
    <!-- Tombol Back di kiri atas, sejajar dengan judul -->
    <div class="d-flex align-items-center gap-3 mb-4">
        <a href="../index.php" class="btn btn-outline-maroon">← Back to Home</a>
        <h2 class="m-0" style="color: #6E1A37;">📋 Daftar Mahasiswa</h2>
        <div class="ms-auto">
            <a href="tambah.php" class="btn btn-maroon">+ Tambah Mahasiswa</a>
        </div>
    </div>

    <?php if ($pesan): ?>
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            <?= htmlspecialchars($pesan) ?>
            <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
        </div>
    <?php endif; ?>

    <div class="table-wrapper">
        <div class="table-responsive">
            <table class="table table-bordered table-hover align-middle">
                <thead>
                    <tr><th>NPM</th><th>Nama Lengkap</th><th>Jurusan</th><th>Alamat</th><th width="120">Aksi</th></tr>
                </thead>
                <tbody>
                    <?php
                    $result = mysqli_query($koneksi, "SELECT * FROM mahasiswa ORDER BY npm");
                    if (mysqli_num_rows($result) > 0):
                        while ($row = mysqli_fetch_assoc($result)):
                    ?>
                    <tr>
                        <td><?= htmlspecialchars($row['npm']) ?></td>
                        <td><?= htmlspecialchars($row['nama']) ?></td>
                        <td><?= htmlspecialchars($row['jurusan']) ?></td>
                        <td><?= htmlspecialchars($row['alamat']) ?></td>
                        <td>
                            <a href="edit.php?npm=<?= $row['npm'] ?>" class="btn btn-warning btn-sm">Edit</a>
                            <a href="hapus.php?npm=<?= $row['npm'] ?>" class="btn btn-danger btn-sm" onclick="return confirm('Yakin hapus?')">Hapus</a>
                        </td>
                    </tr>
                    <?php 
                        endwhile;
                    else:
                    ?>
                        <tr><td colspan="5" class="text-center">Belum ada data mahasiswa</td></tr>
                    <?php endif; ?>
                </tbody>
            </table>
        </div>
    </div>
</div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>