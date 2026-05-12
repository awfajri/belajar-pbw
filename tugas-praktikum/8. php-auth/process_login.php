<?php
// Seperti biasa, mulai session dulu. 
// Halaman proses kayak gini butuh session buat nyimpen data user yang berhasil login atau ngirim pesan error.
session_start();

// Cek apakah kode ini dieksekusi karena user ngeklik tombol "Login" di form.
// Biar aman dari orang iseng yang cuma ngetik URL file ini di browser.
if (isset($_POST['login'])) {
    
    // Panggil file koneksi biar PHP kita bisa ngobrol sama database MySQL
    include "koneksi.php";
    
    // Ini cuma komentar bantuan (DocBlock) biar VS Code (Intelephense) nggak rewel ngasih garis merah ke variabel $koneksi
    /** @var mysqli $koneksi */
    
    // Nangkep email dan password yang diketik user di form login tadi
    $email = $_POST['email'];
    $password = $_POST['password'];
    
    // Hashing (Enkripsi)
    // Karena password di database disimpen dalam bentuk acakan (sha1), 
    // maka password yang diketik di form juga harus diacak dulu pakai sha1 biar bentuknya sama dan bisa dicocokin.
    $password = sha1($password);
    
    // Proses Authentication dimulai:
    // Kita nanya ke database: "Ada nggak sih user yang emailnya '$email' DAN passwordnya '$password' ?"
    $query = mysqli_query($koneksi, "SELECT * FROM user WHERE email='$email' AND password='$password'");
    
    // Cek jumlah baris data yang ketemu dari pertanyaan di atas
    if (mysqli_num_rows($query) > 0) {
        
        // Kalau jumlah barisnya lebih dari 0 (berarti datanya ketemu/cocok)
        // Ambil data user tersebut (seperti nama, id, dll) dari database
        $data = mysqli_fetch_array($query);
        
        // Simpen nama usernya ke dalam kotak 'session'. 
        // Ini fungsinya sebagai KTP / tanda pengenal kalau dia udah login.
        $_SESSION['name'] = $data['name'];
        
        // Bikin pesan sukses buat ditampilin di halaman berikutnya
        $_SESSION['success'] = "Welcome " . $_SESSION['name'] . " to the Dashboard Page";
        
        // Buka pintu dan suruh user masuk ke halaman dashboard!
        header("Location: dashboard.php");
        
        // Kasih tau PHP buat stop eksekusi kode di bawahnya karena kita udah pindah halaman
        exit();
        
    } else {
        
        // Kalau jumlah barisnya 0 (nggak ada user yang cocok)
        // Artinya email belum terdaftar atau passwordnya salah ngetik
        $_SESSION['danger'] = "Login failed, wrong password or email";
        
        // Tolak aksesnya, tendang balik ke halaman login biar dia coba lagi
        header("Location: login.php");
        exit();
    }
}
?>