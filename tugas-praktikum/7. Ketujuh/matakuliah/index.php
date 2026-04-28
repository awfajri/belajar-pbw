<?php
// Halaman daftar mata kuliah, tombol back di kiri atas
include '../koneksi.php';
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Data Mata Kuliah</title>
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
    </style>
</head>
<body>
<div class="container my-5">
    <div class="d-flex align-items-center gap-3 mb-4">
        <a href="../index.php" class="btn btn-outline-maroon">← Back to Home</a>
        <h2 style="color: #6E1A37;">📚 Daftar Mata Kuliah</h2>
        <div class="ms-auto">
            <a href="tambah.php" class="btn btn-maroon">+ Tambah Matakuliah</a>
        </div>
    </div>

    <?php if(isset($_GET['pesan'])): ?>
        <div class="alert alert-success"><?= htmlspecialchars($_GET['pesan']) ?></div>
    <?php endif; ?>

    <div class="table-wrapper">
        <div class="table-responsive">
            <table class="table table-bordered table-hover align-middle">
                <thead><tr><th>Kode MK</th><th>Nama Matakuliah</th><th>SKS</th><th width="120">Aksi</th></tr></thead>
                <tbody>
                    <?php
                    $res = mysqli_query($koneksi, "SELECT * FROM matakuliah ORDER BY kodemk");
                    if(mysqli_num_rows($res) > 0):
                        while($row = mysqli_fetch_assoc($res)):
                    ?>
                    <tr>
                        <td><?= htmlspecialchars($row['kodemk']) ?></td>
                        <td><?= htmlspecialchars($row['nama']) ?></td>
                        <td><?= $row['jumlah_sks'] ?> SKS</td>
                        <td>
                            <a href="edit.php?kodemk=<?= $row['kodemk'] ?>" class="btn btn-warning btn-sm">Edit</a>
                            <a href="hapus.php?kodemk=<?= $row['kodemk'] ?>" class="btn btn-danger btn-sm" onclick="return confirm('Yakin hapus?')">Hapus</a>
                        </td>
                    </tr>
                    <?php endwhile; else: ?>
                    <tr><td colspan="4" class="text-center">Belum ada data mata kuliah</td></tr>
                    <?php endif; ?>
                </tbody>
            </table>
        </div>
    </div>
</div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>