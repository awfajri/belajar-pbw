<!DOCTYPE html>
<html lang="en">
<head>
    <title>Login</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
</head>
<body>
    <?php
    // Wajib ada session_start() di awal untuk ngambil data dari session
    // Halaman login butuh ini buat nampilin pesan dari halaman lain (misal: pesan sukses setelah register atau pesan error karena salah password)
    session_start();
    ?>
    
    <div class="container my-5">
        <div class="row">
            <div class="col-md-6 mx-auto">
                
                <?php
                // Di sini kita cek, apakah ada session 'success' (misalnya user baru aja berhasil buat akun atau berhasil logout)
                if (isset($_SESSION['success'])) {
                ?>
                    <div class="alert alert-success"><?= $_SESSION['success'] ?></div>
                <?php
                    // Hapus sessionnya biar notifikasinya nggak muncul lagi kalau halamannya di-refresh
                    unset($_SESSION['success']);
                    
                // Nah, kalau nggak ada 'success', coba cek ada session 'danger' nggak? (misalnya user salah masukin password atau email)
                } else if (isset($_SESSION['danger'])) {
                ?>
                    <div class="alert alert-danger"><?= $_SESSION['danger'] ?></div>
                <?php
                    // Sama kayak di atas, hapus pesannya setelah ditampilkan
                    unset($_SESSION['danger']);
                }
                ?>

                <div class="card">
                    <div class="card-header">
                        <h2>Login Form</h2>
                        <p>Don't have an account yet? <a class="text-decoration-none" href="form_register.php">Register</a></p>
                    </div>
                    <div class="card-body">
                        <form action="process_login.php" method="post">
                            
                            <div class="mb-4">
                                <label for="email" class="form-label">Email</label>
                                <input type="email" name="email" id="email" class="form-control" required>
                            </div>
                            
                            <div class="mb-4">
                                <label for="password" class="form-label">Password</label>
                                <input type="password" name="password" id="password" class="form-control" required>
                            </div>
                            
                            <button type="submit" class="btn btn-primary" name="login">Login</button>
                        
                        </form>
                    </div>
                </div>

            </div>
        </div>
    </div>
</body>
</html>