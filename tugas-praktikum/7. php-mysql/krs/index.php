<?php
include '../koneksi.php';
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Data KRS</title>
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
        }
        .btn-outline-maroon {
            border-color: #6E1A37;
            color: #6E1A37;
        }
        .btn-outline-maroon:hover {
            background-color: #6E1A37;
            color: white;
        }
        th { background-color: #e9ecef; font-weight: 600; }
        .nama-merah { color: #dc3545; font-weight: 500; }
    </style>
</head>
<body>
<div class="container my-5">
    <div class="d-flex align-items-center gap-3 mb-4">
        <a href="../index.php" class="btn btn-outline-maroon">← Back to Home</a>
        <h2 style="color: #6E1A37;">📝 Kartu Rencana Studi (KRS)</h2>
        <div class="ms-auto">
            <a href="tambah.php" class="btn btn-maroon">+ Tambah KRS</a>
        </div>
    </div>

    <?php if(isset($_GET['pesan'])): ?>
        <div class="alert alert-success"><?= htmlspecialchars($_GET['pesan']) ?></div>
    <?php endif; ?>

    <div class="table-wrapper">
        <div class="table-responsive">
            <table class="table table-bordered table-hover align-middle">
                <thead>
                    <tr><th>No</th><th>Nama Lengkap</th><th>Mata Kuliah</th><th>Keterangan</th><th width="120">Aksi</th></tr>
                </thead>
                <tbody>
                    <?php
                    $query = "SELECT krs.id, mahasiswa.nama AS nama_mhs, matakuliah.nama AS nama_mk, matakuliah.jumlah_sks
                              FROM krs
                              JOIN mahasiswa ON krs.mahasiswa_npm = mahasiswa.npm
                              JOIN matakuliah ON krs.matakuliah_kodemk = matakuliah.kodemk
                              ORDER BY krs.id";
                    $result = mysqli_query($koneksi, $query);
                    $no = 1;
                    if(mysqli_num_rows($result) > 0):
                        while ($row = mysqli_fetch_assoc($result)):
                            $keterangan = "{$row['nama_mhs']} Mengambil Mata Kuliah {$row['nama_mk']} ({$row['jumlah_sks']} SKS)";
                    ?>
                    <tr>
                        <td class="text-center"><?= $no++ ?></td>
                        <td class="nama-merah"><?= htmlspecialchars($row['nama_mhs']) ?></td>
                        <td><?= htmlspecialchars($row['nama_mk']) ?></td>
                        <td><?= htmlspecialchars($keterangan) ?></td>
                        <td>
                            <a href="edit.php?id=<?= $row['id'] ?>" class="btn btn-warning btn-sm">Edit</a>
                            <a href="hapus.php?id=<?= $row['id'] ?>" class="btn btn-danger btn-sm" onclick="return confirm('Hapus KRS ini?')">Hapus</a>
                        </td>
                    </tr>
                    <?php endwhile; else: ?>
                    <tr><td colspan="5" class="text-center">Belum ada data KRS</td></tr>
                    <?php endif; ?>
                </tbody>
            </table>
        </div>
    </div>
</div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>