<?php 
session_start();

$bandaraAsal = ["Soekarno Hatta", "Husein Sastranegara", "Abdul Rachman Saleh", "Juanda"];
$bandaraTujuan = ["Ngurah Rai", "Hasanuddin", "Inanwatan", "Sultan Iskandar Muda"];

if (!isset($_SESSION["noKeberangkatan"])) {
    $_SESSION["noKeberangkatan"] = 1;
}

if (isset($_POST["kirim"])) {
    $noKeberangkatan = $_SESSION["noKeberangkatan"];
    $tanggalInput = $_POST["tanggalInput"];
    $NamaMaskapai = $_POST["inputNamaMaskapai"];
    $asalPenerbangan = $_POST["inputAsalPenerbangan"];
    $tujuanPenerbangan = $_POST["inputTujuanPenerbangan"];
    $hargaTiket = $_POST["inputHarga"];

    switch (strtolower($asalPenerbangan)) {
        case strtolower($bandaraAsal[0]):
            $pajakAsal = 65000;
            break;
        case strtolower($bandaraAsal[1]):
            $pajakAsal = 50000;
            break;
        case strtolower($bandaraAsal[2]):
            $pajakAsal = 40000;
            break;
        case strtolower($bandaraAsal[3]):
            $pajakAsal = 30000;
            break;
        default:
            $pajakAsal = 0;
            break;
    }

    switch (strtolower($tujuanPenerbangan)) {
        case strtolower($bandaraTujuan[0]):
            $pajakTujuan = 85000;
            break;
        case strtolower($bandaraTujuan[1]):
            $pajakTujuan = 70000;
            break;
        case strtolower($bandaraTujuan[2]):
            $pajakTujuan = 90000;
            break;
        case strtolower($bandaraTujuan[3]):
            $pajakTujuan = 60000;
            break;
        default:
            $pajakTujuan = 0;
            break;
    }

    $totalPajak = $pajakAsal+$pajakTujuan;
    $totalHargaTiket = $totalPajak+$hargaTiket;

    $_SESSION["noKeberangkatan"]++;

}
?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,400;0,700;0,900;1,100&display=swap" rel="stylesheet">
    <title>Penghitung Harga Tiket</title>
</head>

<body>
    <div class="container">
        <!-- Input Form -->
        <section class="inputForm">
            <h3 class="title">INPUT FORM</h3>
            <div class="content">
                <form action="" method="post">
                    <input type="hidden" name="tanggalInput" value="<?=date("l jS \of F Y h:i:s A")?>">
                    <label for="inputNamaMaskapai">Nama Maskapai</label>
                    <br>
                    <input type="text" name="inputNamaMaskapai" id="inputNamaMaskapai">
                    <br>
                    <label for="inputAsalPenerbangan">Pilih Bandara Asal:</label>
                    <br>
                    <select name="inputAsalPenerbangan" id="inputAsalPenerbangan">
                        <?php foreach ($bandaraAsal as $bA) {?>
                            <option value="<?php echo $bA?>"><?php echo $bA?></option>
                            <?php } ?>
                        </select>
                    <br>
                    <label for="inputTujuanPenerbangan">Pilih Bandara Tujuan:</label>
                    <br>
                    <select name="inputTujuanPenerbangan" id="inputTujuanPenerbangan">
                        <?php foreach ($bandaraTujuan as $bT) {?>
                            <option value="<?php echo $bT?>"><?php echo $bT?></option>
                        <?php } ?>
                    </select>
                    <br>
                    <label for="inputHarga">Harga Tiket</label>
                    <br>
                    <input type="number" name="inputHarga" id="inputHarga">
                    <br>
                    <button type="submit" name="kirim">Hitung</button>  
                </form>
            </div>

            <footer>
                <p>&copy;2025 Auf Fajri Ramadhani
            </footer>

        </section>
        <!-- endof Input Form -->

        <!-- Output -->
        <?php if (isset($_POST["kirim"])) {?>
            <section class="information">
                <h3 class="title">INFORMASI</h3>
                <div class="content">
                    <label for="nomor">Nomor</label>
                    <br>
                    <input type="text" name="nomor" id="nomor" value="<?=$noKeberangkatan?>" disabled>
                    <br>
                    <label for="tanggal">Tanggal</label>
                    <br>
                    <input type="text" name="tanggal" id="tanggal" value="<?=$tanggalInput?>" disabled>
                    <br>
                    <label for="maskapai">Maskapai</label>
                    <br>
                    <input type="text" name="maskapai" id="maskapai" value="<?=$NamaMaskapai?>" disabled>
                    <br>
                    <label for="asal">Asal Penerbangan</label>
                    <br>
                    <input type="text" name="asal" id="asal" value="<?=$asalPenerbangan?>" disabled>
                    <br>
                    <label for="tujuan">Tujuan Penerbangan</label>
                    <br>
                    <input type="text" name="tujuan" id="tujuan" value="<?=$tujuanPenerbangan?>" disabled>
                    <br>
                    <label for="hargaTiketAwal">Harga Tiket</label>
                    <br>
                    <input type="text" name="hargaTiketAwal" id="hargaTiketAwal" value="Rp<?=$hargaTiket?>" disabled>
                    <br>
                    <label for="pajak">Total Pajak</label>
                    <br>
                    <input type="text" name="pajak" id="pajak" value="Rp<?=$totalPajak?>" disabled>
                    <br>
                    <label for="totalHargaTiket">Total Harga Tiket</label>
                    <br>
                    <input type="text" name="totalHargaTiket" id="totalHargaTiket" value="Rp<?=$totalHargaTiket?>" disabled>
                <br></di
                v>
            </section>
        <?php } ?>
        <!-- endof Output -->
    </div>
</body>
</html>