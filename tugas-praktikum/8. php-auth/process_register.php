<?php
// Wajib ditaruh paling atas kalau kita mau pakai fitur session.
// Kita butuh ini buat bawa pesan sukses/error (alert) ke halaman login atau form register.
session_start();

// Mengecek apakah file ini diakses lewat klik tombol "Register" di form.
// Kalau ada orang iseng yang langsung buka URL process_register.php tanpa ngisi form, kode di dalam ini nggak akan jalan.
if (isset($_POST['register'])) {
    
    // Panggil file koneksi biar sistem kita nyambung ke database MySQL
    include "koneksi.php";
    
    // Komentar khusus ini buat ngasih tau Intelephense (VS Code) kalau variabel $koneksi itu beneran ada dari file di atasnya, biar nggak digarismerahin lagi.
    /** @var mysqli $koneksi */
    
    // Nangkep data-data yang diketik sama user dari form HTML tadi
    $name = $_POST['name'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $confirm_password = $_POST['confirm_password'];
    
    // Hashing password (Enkripsi)
    // Password itu rahasia, jadi nggak boleh disimpan mentah-mentah (plain text) ke database.
    // Di sini kita ubah teks passwordnya jadi acakan huruf dan angka pakai algoritma sha1.
    $password = sha1($password);
    $confirm_password = sha1($confirm_password);
    
    // Sebelum nyimpen data, kita nanya dulu ke database: "Eh, ada nggak sih yang udah pakai email ini?"
    $query = mysqli_query($koneksi, "SELECT email FROM user WHERE email='$email'");
    $data = mysqli_fetch_array($query);
    
    // Validasi 1: Cek apakah email sudah terdaftar
    if ($data && $email == $data['email']) {
        // Kalau ternyata emailnya udah ada di database, bikin pesan error
        $_SESSION['danger'] = "E-mail already used";
        // Terus lempar (redirect) usernya balik ke halaman form register
        header("Location: form_register.php");
        // exit() dipakai biar kode di bawahnya berhenti dieksekusi, karena kita udah pindah halaman
        exit();
        
    } else {
        // Validasi 2: Kalau email aman (belum dipakai), sekarang cek passwordnya
        // Apakah ketikan 'Password' dan 'Confirm Password' udah sama persis?
        if ($password === $confirm_password) {
            
            // Kalau sama, baru deh kita simpan data usernya ke tabel 'user' di database.
            // Nilai pertama 'null' itu buat kolom id, karena di database udah kita set AUTO_INCREMENT (nambah otomatis).
            $create = mysqli_query($koneksi, "INSERT INTO user VALUES(null,'$name','$email','$password')");
            
            // Nyimpen nama user di session, tujuannya biar bisa kita panggil namanya di pesan sukses
            $_SESSION['name'] = $name;
            
            // Bikin pesan sukses registrasi
            $_SESSION['success'] = "Congratulations " . $_SESSION['name'] . ", your registration was successful. Please login to enter";
            
            // Arahin usernya ke halaman login buat masuk pakai akun yang baru dibuat
            header("Location: login.php");
            exit();
            
        } else {
            // Kalau password dan konfirmasinya beda (mungkin usernya typo pas ngetik)
            $_SESSION['danger'] = "Password doesn't match";
            // Balikin lagi ke halaman register dan suruh ngisi ulang
            header("Location: form_register.php");
            exit();
        }
    }
}
?>