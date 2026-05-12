<?php

class Book {
    // 1. Tiga property diset private
    private $code_book;
    private $name;
    private $qty;

    // Constructor untuk inisialisasi awal saat object dibuat
    public function __construct($code_book, $name, $qty) {
        // Property name langsung di-assign karena tidak ada syarat khusus di soal
        $this->name = $name; 
        
        // Menjalankan setter dari dalam constructor (sesuai instruksi soal)
        $this->setCodeBook($code_book);
        $this->setQty($qty);
    }

    // 2. Setter $code_book diset private
    private function setCodeBook($code_book) {
        // Validasi format: 2 huruf besar diikuti 2 angka
        // ^ = awalan, [A-Z]{2} = 2 huruf besar, [0-9]{2} = 2 angka, $ = akhiran
        if (preg_match('/^[A-Z]{2}[0-9]{2}$/', $code_book)) {
            $this->code_book = $code_book;
        } else {
            echo "<span style='color:red;'>Error Code Book: Format '{$code_book}' tidak sesuai! Harus 2 huruf besar diikuti 2 angka (contoh: BB00).</span><br>";
        }
    }

    // 3. Setter $qty diset private
    private function setQty($qty) {
        // Validasi: harus tipe integer dan bernilai positif (lebih dari 0)
        if (is_int($qty) && $qty > 0) {
            $this->qty = $qty;
        } else {
            echo "<span style='color:red;'>Error Qty: Quantity '{$qty}' tidak valid! Harus berupa angka integer positif (tidak boleh nol atau minus).</span><br>";
        }
    }

    // 4. Getter (cukup mengembalikan nilai saja)
    public function getCodeBook() {
        return $this->code_book;
    }

    public function getName() {
        return $this->name;
    }

    public function getQty() {
        return $this->qty;
    }
}


echo "<h3>Nama: Auf Fajri Ramadhani</h3>";
echo "<h3>NPM: 2410631170059</h3>";

// UJI COBA KODE (TESTING)

echo "<h2>Hasil Uji Coba Class Book</h2>";

echo "<h3>Testing 1: Input Valid (Buku Pemrograman Web)</h3>";
$buku1 = new Book("NX26", "Mastering Next.js for Web Store", 10);
echo "Kode Buku: " . $buku1->getCodeBook() . "<br>";
echo "Nama Buku: " . $buku1->getName() . "<br>";
echo "Quantity: " . $buku1->getQty() . "<br>";
echo "<hr>";

echo "<h3>Testing 2: Input Valid (Buku UI/UX)</h3>";
$buku2 = new Book("UX99", "UI/UX Design with Figma", 5);
echo "Kode Buku: " . $buku2->getCodeBook() . "<br>";
echo "Nama Buku: " . $buku2->getName() . "<br>";
echo "Quantity: " . $buku2->getQty() . "<br>";
echo "<hr>";

echo "<h3>Testing 3: Input Valid (Buku Sistem Operasi)</h3>";
$buku3 = new Book("LX01", "Panduan Kustomisasi Linux Arch", 15);
echo "Kode Buku: " . $buku3->getCodeBook() . "<br>";
echo "Nama Buku: " . $buku3->getName() . "<br>";
echo "Quantity: " . $buku3->getQty() . "<br>";
echo "<hr>";

echo "<h3>Testing 4: Input Error (Sebagai Bukti Validasi Berjalan)</h3>";
// Sengaja dibuat error: huruf kecil (ml) dan quantity nol (0)
$buku4 = new Book("ml01", "Trik Push Rank Mobile Legends", 0);
echo "<hr>";

?>