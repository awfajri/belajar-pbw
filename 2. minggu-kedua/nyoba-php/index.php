<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Nyoba php</title>
</head>
<body>
    <?php
    //deklarasi variable
        $nama = "Auf fajri";
        $umur = 19;
        $berat = 80.5;
        
        echo "<h1>Hello, World!</h1>";
        echo "<p>Ini adalah halaman PHP pertama saya.</p>" . "<br>";
        echo "<h4>Cara pertama</h4>";
        echo "<p>Nama saya adalah $nama, saya berumur $umur tahun dan berat saya $berat kg.</p>" . "<br>";

        echo "<h4>Cara kedua</h4>";
        echo "nama: " .$nama . "<br>";
        echo "umur: " .$umur . "<br>";
        echo "berat: " .$berat . "<br>";
        echo "<br>";
        echo '<img src="/BELAJAR-PBW/minggu-kedua/belajar-css/img-profile.jpeg" width="100">';
    ?>
</body>
</html>