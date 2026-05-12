<!DOCTYPE html>
<html lang="en">
<head>
    <title>Register</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
</head>
<body>
    <?php
    // Memulai session PHP. Ini wajib ditaruh di atas sebelum kita pakai $_SESSION
    // Tujuannya buat nangkep pesan error/sukses dari halaman proses (process_register.php)
    session_start();
    ?>
    
    <div class="container my-5">
        <div class="row">
            <div class="col-md-6 mx-auto">
                
                <?php
                // Mengecek apakah ada pesan error (session 'danger') yang dikirim dari proses register
                // Misalnya error karena email udah dipakai atau password nggak sama
                if (isset($_SESSION['danger'])) {
                ?>
                    <div class="alert alert-danger"><?= $_SESSION['danger'] ?></div>
                <?php
                    // Setelah pesannya ditampilin, langsung dihapus (unset) dari memori session
                    // Biar pesannya nggak muncul terus-terusan kalau halamannya di-refresh
                    unset($_SESSION['danger']);
                }
                ?>

                <div class="card">
                    <div class="card-header">
                        <h2>Register Form</h2>
                        <p>Already have an account? <a class="text-decoration-none" href="login.php">Login</a></p>
                    </div>
                    <div class="card-body">
                        <form action="process_register.php" method="post">
                            
                            <div class="mb-4">
                                <label for="name" class="form-label">Name</label>
                                <input type="text" name="name" id="name" class="form-control" required>
                            </div>
                            
                            <div class="mb-4">
                                <label for="email" class="form-label">Email</label>
                                <input type="email" name="email" id="email" class="form-control" required>
                            </div>
                            
                            <div class="mb-4">
                                <label for="password" class="form-label">Password</label>
                                <input type="password" name="password" id="password" class="form-control" required>
                            </div>
                            
                            <div class="mb-4">
                                <label for="confirm_password" class="form-label">Confirm Password</label>
                                <input type="password" name="confirm_password" id="confirm_password" class="form-control" required>
                            </div>
                            
                            <button type="submit" class="btn btn-primary" name="register">Register</button>
                        
                        </form>
                    </div>
                </div>

            </div>
        </div>
    </div>
</body>
</html>