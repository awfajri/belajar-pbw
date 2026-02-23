<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Belajar Switch</title>
</head>
<body>
    <?php
    $pilihan = 3;
    switch ($pilihan) {
        case 1:
            echo "Anda memilih menu: Nasi Goreng";
            break;
        case 2:
            echo "Anda memilih menu: Mie ayam";
            break;
        case 3:
            echo "Anda memilih menu: Sate Ayam";
            break;
        case 4:
            echo "Anda memilih menu: Nasi uduk";
            break;
        default:
            echo "menu yg kamu pilih tidak tersedia";
    }
    ?>
    
</body>
</html>