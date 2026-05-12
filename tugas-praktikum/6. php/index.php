<?php 
session_start();

# disini saya membuat array bandara asal dan tujuan
$bandaraAsal = ["Soekarno Hatta", "Husein Sastranegara", "Abdul Rachman Saleh", "Juanda"];
$bandaraTujuan = ["Ngurah Rai", "Hasanuddin", "Inanwatan", "Sultan Iskandar Muda"];

# sesuai soal, array harus diurutkan
sort($bandaraAsal);
sort($bandaraTujuan);

# disini saya membuat associative array untuk menyimpan pajak masing-masing bandara
# jadi nanti kita bisa ambil pajak berdasarkan nama bandara langsung (lebih simpel daripada switch)
$pajakAsalArr = [
    "Soekarno Hatta" => 65000,
    "Husein Sastranegara" => 50000,
    "Abdul Rachman Saleh" => 40000,
    "Juanda" => 30000
];

$pajakTujuanArr = [
    "Ngurah Rai" => 85000,
    "Hasanuddin" => 70000,
    "Inanwatan" => 90000,
    "Sultan Iskandar Muda" => 60000
];

# ini untuk nomor keberangkatan, supaya tiap submit bertambah 1
if (!isset($_SESSION["noKeberangkatan"])) {
    $_SESSION["noKeberangkatan"] = 1;
}

$totalPajak = 0;
$totalHargaTiket = 0;

# ketika tombol submit ditekan
if (isset($_POST["kirim"])) {

    # ambil nomor keberangkatan dari session
    $noKeberangkatan = $_SESSION["noKeberangkatan"];

    # ambil semua input dari user
    $tanggalInput = $_POST["tanggalInput"];
    $namaMaskapai = $_POST["inputNamaMaskapai"];
    $asalPenerbangan = $_POST["inputAsalPenerbangan"];
    $tujuanPenerbangan = $_POST["inputTujuanPenerbangan"];
    $hargaTiket = $_POST["inputHarga"];

    # ambil pajak berdasarkan bandara yang dipilih user
    $pajakAsal = $pajakAsalArr[$asalPenerbangan];
    $pajakTujuan = $pajakTujuanArr[$tujuanPenerbangan];

    # sesuai soal: pajak = pajak asal + pajak tujuan
    $totalPajak = $pajakAsal + $pajakTujuan;

    # sesuai soal: total harga tiket = harga tiket + pajak
    $totalHargaTiket = $hargaTiket + $totalPajak;

    # increment nomor keberangkatan untuk input berikutnya
    $_SESSION["noKeberangkatan"]++;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <!-- ini untuk styling -->
    <link rel="stylesheet" href="style.css">

    <!-- ini untuk font Poppins biar tampilannya lebih bagus -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,400;0,700;0,900;1,100&display=swap" rel="stylesheet">

    <title>Penghitung Harga Tiket</title>
</head>

<body>
<div class="container">

    <!-- FORM INPUT -->
    <section class="inputForm">
        <h3 class="title">INPUT FORM</h3>

        <div class="content">
            <form method="post">

                <!-- tanggal otomatis saat submit -->
                <input type="hidden" name="tanggalInput" value="<?=date("l, d F Y H:i:s")?>">

                <label>Nama Maskapai</label>
                <input type="text" name="inputNamaMaskapai" required>

                <label>Bandara Asal</label>
                <select name="inputAsalPenerbangan">
                    <?php foreach ($bandaraAsal as $bA) { ?>
                        <option value="<?= $bA ?>"><?= $bA ?></option>
                    <?php } ?>
                </select>

                <label>Bandara Tujuan</label>
                <select name="inputTujuanPenerbangan">
                    <?php foreach ($bandaraTujuan as $bT) { ?>
                        <option value="<?= $bT ?>"><?= $bT ?></option>
                    <?php } ?>
                </select>

                <label>Harga Tiket</label>
                <input type="number" name="inputHarga" required>

                <button type="submit" name="kirim">Hitung</button>
            </form>
        </div>

        <!-- footer yang tadi kamu punya -->
        <footer>
            <p>&copy;2025 Auf Fajri Ramadhani</p>
        </footer>
    </section>

    <!-- OUTPUT -->
    <?php if (isset($_POST["kirim"])) { ?>
    <section class="information">
        <h3 class="title">INFORMASI</h3>

        <div class="content">

            <label>Nomor</label>
            <input type="text" value="<?= $noKeberangkatan ?>" disabled>

            <label>Tanggal</label>
            <input type="text" value="<?= $tanggalInput ?>" disabled>

            <label>Nama Maskapai</label>
            <input type="text" value="<?= $namaMaskapai ?>" disabled>

            <label>Asal Penerbangan</label>
            <input type="text" value="<?= $asalPenerbangan ?>" disabled>

            <label>Tujuan Penerbangan</label>
            <input type="text" value="<?= $tujuanPenerbangan ?>" disabled>

            <label>Harga Tiket</label>
            <input type="text" value="Rp<?= number_format($hargaTiket,0,',','.') ?>" disabled>

            <label>Pajak</label>
            <input type="text" value="Rp<?= number_format($totalPajak,0,',','.') ?>" disabled>

            <label>Total Harga Tiket</label>
            <input type="text" value="Rp<?= number_format($totalHargaTiket,0,',','.') ?>" disabled>

        </div>
    </section>
    <?php } ?>

</div>
</body>
</html>