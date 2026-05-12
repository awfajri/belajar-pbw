<?php
include '../koneksi.php';
if(!isset($_GET['id'])) header("Location: index.php");
$id = $_GET['id'];
$query = mysqli_prepare($koneksi, "SELECT * FROM krs WHERE id=?");
mysqli_stmt_bind_param($query, "i", $id);
mysqli_stmt_execute($query);
$result = mysqli_stmt_get_result($query);
$data = mysqli_fetch_assoc($result);
if(!$data) header("Location: index.php");
?>
<!DOCTYPE html>
<html>
<head>
    <title>Edit KRS</title>
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
        <h2 style="color: #6E1A37;">Edit KRS</h2>
    </div>
    <div class="form-container">
        <form action="proses_edit.php" method="post">
            <input type="hidden" name="id" value="<?= $id ?>">
            <div class="mb-3">
                <label>Mahasiswa</label>
                <select name="mahasiswa_npm" class="form-select" required>
                    <?php
                    $mhs = mysqli_query($koneksi, "SELECT npm, nama FROM mahasiswa ORDER BY nama");
                    while($m = mysqli_fetch_assoc($mhs)){
                        $selected = ($m['npm'] == $data['mahasiswa_npm']) ? 'selected' : '';
                        echo "<option value='{$m['npm']}' $selected>{$m['nama']} ({$m['npm']})</option>";
                    }
                    ?>
                </select>
            </div>
            <div class="mb-3">
                <label>Mata Kuliah</label>
                <select name="matakuliah_kodemk" class="form-select" required>
                    <?php
                    $mk = mysqli_query($koneksi, "SELECT kodemk, nama, jumlah_sks FROM matakuliah ORDER BY nama");
                    while($m = mysqli_fetch_assoc($mk)){
                        $selected = ($m['kodemk'] == $data['matakuliah_kodemk']) ? 'selected' : '';
                        echo "<option value='{$m['kodemk']}' $selected>{$m['nama']} ({$m['jumlah_sks']} SKS)</option>";
                    }
                    ?>
                </select>
            </div>
            <button type="submit" class="btn btn-maroon">Update</button>
            <a href="index.php" class="btn btn-secondary">Kembali</a>
        </form>
    </div>
</div>
</body>
</html>