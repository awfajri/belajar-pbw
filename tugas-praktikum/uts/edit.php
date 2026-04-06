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

function e($value)
{
    return htmlspecialchars((string) $value, ENT_QUOTES, 'UTF-8');
}
?>
<!doctype html>
<html lang="id">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Edit Data Mahasiswa</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:ital,wght@0,200..800;1,200..800&display=swap" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="style.css">
</head>
<body class="bg-soft">
    <div class="container py-4 py-lg-5">
        <div class="row justify-content-center">
            <div class="col-12 col-lg-8">
                <div class="card border-0 shadow-sm mb-4 overflow-hidden">
                    <div class="card-body p-4 p-lg-5 bg-primary text-white">
                        <span class="badge text-bg-light text-primary mb-3">Update Form</span>
                        <h1 class="h2 fw-bold mb-2">Edit Data Mahasiswa</h1>
                        <p class="mb-0 text-white-50">Perbarui data yang dipilih, lalu simpan agar perubahan langsung masuk ke database.</p>
                    </div>
                </div>

                <div class="card border-0 shadow-sm">
                    <div class="card-body p-4 p-lg-5">
                        <div class="d-flex justify-content-between align-items-center gap-3 mb-4">
                            <h2 class="h4 mb-0">Form Edit</h2>
                            <span class="badge text-bg-primary-subtle text-primary-emphasis">ID: <?= (int) $data['id']; ?></span>
                        </div>
                        <form action="update.php" method="POST">
                            <input type="hidden" name="id" value="<?= (int) $data['id']; ?>">
                            <div class="mb-3">
                                <label for="nim" class="form-label">NIM</label>
                                <input type="text" class="form-control form-control-lg" id="nim" name="nim" maxlength="15" value="<?= e($data['nim']); ?>" required>
                            </div>
                            <div class="mb-3">
                                <label for="nama" class="form-label">Nama</label>
                                <input type="text" class="form-control form-control-lg" id="nama" name="nama" maxlength="100" value="<?= e($data['nama']); ?>" required>
                            </div>
                            <div class="mb-3">
                                <label for="jurusan" class="form-label">Jurusan</label>
                                <input type="text" class="form-control form-control-lg" id="jurusan" name="jurusan" maxlength="50" value="<?= e($data['jurusan']); ?>" required>
                            </div>
                            <div class="mb-4">
                                <label for="alamat" class="form-label">Alamat</label>
                                <textarea class="form-control" id="alamat" name="alamat" rows="4" required><?= e($data['alamat']); ?></textarea>
                            </div>
                            <div class="d-flex flex-wrap gap-2">
                                <button type="submit" class="btn btn-primary btn-lg">Update</button>
                                <a class="btn btn-outline-secondary btn-lg" href="index.php">Batal</a>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>
