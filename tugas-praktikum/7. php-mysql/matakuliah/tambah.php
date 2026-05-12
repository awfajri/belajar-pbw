<?php
include '../koneksi.php';
?>
<!DOCTYPE html>
<html>
<head>
    <title>Tambah Matakuliah</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Sora:wght@100..800&display=swap" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        * { font-family: 'Sora', sans-serif; }
        body { background-color: #f8f9fa; }
        .form-container {
            background: white;
            border-radius: 12px;
            padding: 2rem;
            box-shadow: 0 2px 8px rgba(0,0,0,0.05);
        }
        .btn-maroon {
            background-color: #6E1A37;
            color: white;
        }
        .btn-maroon:hover { background-color: #4e1227; }
        .btn-outline-maroon {
            border-color: #6E1A37;
            color: #6E1A37;
        }
        .btn-outline-maroon:hover {
            background-color: #6E1A37;
            color: white;
        }
    </style>
</head>
<body>
<div class="container my-5">
    <div class="d-flex align-items-center gap-3 mb-4">
        <a href="../index.php" class="btn btn-outline-maroon">← Back to Home</a>
        <h2 style="color: #6E1A37;">Tambah Mata Kuliah</h2>
    </div>
    <?php if(isset($_GET['error'])) echo "<div class='alert alert-danger'>{$_GET['error']}</div>"; ?>
    <div class="form-container">
        <form action="proses_tambah.php" method="post">
            <div class="mb-3"><label>Kode MK (6 karakter)</label><input type="text" name="kodemk" class="form-control" maxlength="6" required></div>
            <div class="mb-3"><label>Nama Matakuliah</label><input type="text" name="nama" class="form-control" required></div>
            <div class="mb-3"><label>Jumlah SKS</label><input type="number" name="jumlah_sks" class="form-control" required></div>
            <button type="submit" class="btn btn-maroon">Simpan</button>
            <a href="index.php" class="btn btn-secondary">Batal</a>
        </form>
    </div>
</div>
</body>
</html>