<?php
include '../koneksi.php';
if(!isset($_GET['kodemk'])) header("Location: index.php");
$kodemk = $_GET['kodemk'];
$res = mysqli_query($koneksi, "SELECT * FROM matakuliah WHERE kodemk='$kodemk'");
$data = mysqli_fetch_assoc($res);
if(!$data) header("Location: index.php");
?>
<!DOCTYPE html>
<html>
<head>
    <title>Edit Matakuliah</title>
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
        <h2 style="color: #6E1A37;">Edit Mata Kuliah</h2>
    </div>
    <div class="form-container">
        <form action="proses_edit.php" method="post">
            <input type="hidden" name="kodemk_lama" value="<?= $data['kodemk'] ?>">
            <div class="mb-3"><label>Kode MK</label><input type="text" name="kodemk_baru" class="form-control" value="<?= $data['kodemk'] ?>" required></div>
            <div class="mb-3"><label>Nama Matakuliah</label><input type="text" name="nama" class="form-control" value="<?= $data['nama'] ?>" required></div>
            <div class="mb-3"><label>SKS</label><input type="number" name="jumlah_sks" class="form-control" value="<?= $data['jumlah_sks'] ?>" required></div>
            <button type="submit" class="btn btn-maroon">Update</button>
            <a href="index.php" class="btn btn-secondary">Kembali</a>
        </form>
    </div>
</div>
</body>
</html>