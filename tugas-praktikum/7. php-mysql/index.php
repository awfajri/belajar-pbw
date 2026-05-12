<?php
// Halaman utama dashboard aplikasi kuliah
// Menampilkan menu navigasi ke tiga modul: Mahasiswa, Matakuliah, KRS
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sistem Informasi Akademik</title>
    <!-- Google Fonts: Sora sebagai font utama -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Sora:wght@100..800&display=swap" rel="stylesheet">
    <!-- Bootstrap 5 CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        * {
            font-family: 'Sora', sans-serif;
        }
        .btn-maroon {
            background-color: #6E1A37;
            color: white;
            border: none;
            transition: 0.3s;
        }
        .btn-maroon:hover {
            background-color: #4e1227;
            color: white;
            transform: translateY(-2px);
        }
        .card-hover {
            transition: transform 0.2s ease, box-shadow 0.2s ease;
        }
        .card-hover:hover {
            transform: translateY(-5px);
            box-shadow: 0 1rem 2rem rgba(0,0,0,0.15);
        }
    </style>
</head>
<body class="bg-light">
    <div class="container py-5">
        <div class="text-center mb-5">
            <h1 class="display-4 fw-semibold" style="color: #6E1A37;">Sistem Informasi Akademik</h1>
            <p class="lead text-secondary">Kelola data mahasiswa, mata kuliah, dan kartu rencana studi</p>
        </div>
        <div class="row g-4 justify-content-center">
            <div class="col-md-4">
                <div class="card h-100 border-0 shadow-sm card-hover">
                    <div class="card-body text-center p-4">
                        <div class="mb-3">
                            <svg width="64" height="64" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path d="M12 12C14.21 12 16 10.21 16 8C16 5.79 14.21 4 12 4C9.79 4 8 5.79 8 8C8 10.21 9.79 12 12 12ZM12 14C9.33 14 4 15.34 4 18V20H20V18C20 15.34 14.67 14 12 14Z" fill="#6E1A37"/>
                            </svg>
                        </div>
                        <h4 class="card-title fw-semibold">Mahasiswa</h4>
                        <p class="card-text text-secondary">Tambah, lihat, edit, dan hapus data mahasiswa.</p>
                        <a href="mahasiswa/" class="btn btn-maroon px-4">Kelola →</a>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card h-100 border-0 shadow-sm card-hover">
                    <div class="card-body text-center p-4">
                        <div class="mb-3">
                            <svg width="64" height="64" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path d="M4 6H20V18H4V6ZM4 4C2.9 4 2 4.9 2 6V18C2 19.1 2.9 20 4 20H20C21.1 20 22 19.1 22 18V6C22 4.9 21.1 4 20 4H4ZM12 8L8 12H11V16H13V12H16L12 8Z" fill="#6E1A37"/>
                            </svg>
                        </div>
                        <h4 class="card-title fw-semibold">Mata Kuliah</h4>
                        <p class="card-text text-secondary">Kelola daftar mata kuliah dan jumlah SKS.</p>
                        <a href="matakuliah/" class="btn btn-maroon px-4">Kelola →</a>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card h-100 border-0 shadow-sm card-hover">
                    <div class="card-body text-center p-4">
                        <div class="mb-3">
                            <svg width="64" height="64" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path d="M19 3H5C3.9 3 3 3.9 3 5V19C3 20.1 3.9 21 5 21H19C20.1 21 21 20.1 21 19V5C21 3.9 20.1 3 19 3ZM9 17H7V10H9V17ZM13 17H11V7H13V17ZM17 17H15V13H17V17Z" fill="#6E1A37"/>
                            </svg>
                        </div>
                        <h4 class="card-title fw-semibold">Kartu Rencana Studi</h4>
                        <p class="card-text text-secondary">Relasikan mahasiswa dengan mata kuliah yang diambil.</p>
                        <a href="krs/" class="btn btn-maroon px-4">Kelola →</a>
                    </div>
                </div>
            </div>
        </div>
        <footer class="text-center text-muted mt-5 pt-3 border-top">
            <small>&copy; 2026 - Auf Fajri Ramadhani</small>
        </footer>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>