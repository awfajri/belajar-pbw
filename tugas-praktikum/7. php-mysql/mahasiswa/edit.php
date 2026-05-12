<?php
include '../koneksi.php';
if (!isset($_GET['npm'])) header("Location: index.php");
$npm = $_GET['npm'];
$query = mysqli_prepare($koneksi, "SELECT * FROM mahasiswa WHERE npm = ?");
mysqli_stmt_bind_param($query, "s", $npm);
mysqli_stmt_execute($query);
$result = mysqli_stmt_get_result($query);
$data = mysqli_fetch_assoc($result);
if (!$data) header("Location: index.php");
$error = isset($_GET['error']) ? $_GET['error'] : '';
?>
<!DOCTYPE html>
<html>
<head>
    <title>Edit Mahasiswa</title>
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
    </style>
</head>
<body>
<div class="container my-5">
    <div class="d-flex align-items-center gap-3 mb-4">
        <a href="../index.php" class="btn btn-outline-maroon">← Back to Home</a>
        <h2 style="color: #6E1A37;">Edit Mahasiswa</h2>
    </div>

    <?php if ($error): ?>
        <div class="alert alert-danger"><?= htmlspecialchars($error) ?></div>
    <?php endif; ?>

    <div class="form-container">
        <form action="proses_edit.php" method="post">
            <input type="hidden" name="npm_lama" value="<?= htmlspecialchars($data['npm']) ?>">
            <div class="mb-3">
                <label>NPM (13 karakter)</label>
                <input type="text" name="npm_baru" class="form-control" maxlength="13" value="<?= htmlspecialchars($data['npm']) ?>" required>
            </div>
            <div class="mb-3">
                <label>Nama Lengkap</label>
                <input type="text" name="nama" class="form-control" value="<?= htmlspecialchars($data['nama']) ?>" required>
            </div>
            <div class="mb-3">
                <label>Jurusan</label>
                <select name="jurusan" class="form-select">
                    <option value="Teknik Informatika" <?= $data['jurusan'] == 'Teknik Informatika' ? 'selected' : '' ?>>Teknik Informatika</option>
                    <option value="Sistem Operasi" <?= $data['jurusan'] == 'Sistem Operasi' ? 'selected' : '' ?>>Sistem Operasi</option>
                </select>
            </div>
            <div class="mb-3">
                <label>Alamat</label>
                <textarea name="alamat" class="form-control" rows="3"><?= htmlspecialchars($data['alamat']) ?></textarea>
            </div>
            <button type="submit" name="update" class="btn btn-maroon">Update</button>
            <a href="index.php" class="btn btn-secondary">Kembali</a>
        </form>
    </div>
</div>
</body>
</html>