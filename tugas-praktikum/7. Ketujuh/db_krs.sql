-- Buat database
CREATE DATABASE db_krs;
USE db_krs;

-- Tabel mahasiswa
CREATE TABLE mahasiswa (
    npm CHAR(13) PRIMARY KEY,
    nama VARCHAR(50) NOT NULL,
    jurusan ENUM('Teknik Informatika', 'Sistem Operasi') NOT NULL,
    alamat TEXT
);

-- Tabel matakuliah
CREATE TABLE matakuliah (
    kodemk CHAR(6) PRIMARY KEY,
    nama VARCHAR(50) NOT NULL,
    jumlah_sks INT(3) NOT NULL
);

-- Tabel krs
CREATE TABLE krs (
    id INT(11) AUTO_INCREMENT PRIMARY KEY,
    mahasiswa_npm CHAR(13),
    matakuliah_kodemk CHAR(6),
    FOREIGN KEY (mahasiswa_npm) REFERENCES mahasiswa(npm) ON DELETE CASCADE,
    FOREIGN KEY (matakuliah_kodemk) REFERENCES matakuliah(kodemk) ON DELETE CASCADE
);

-- Data mahasiswa (10 data sesuai gambar)
INSERT INTO mahasiswa (npm, nama, jurusan, alamat) VALUES
('1234567890123', 'Siska Putri', 'Teknik Informatika', 'Jl. Merdeka No.1'),
('1234567890124', 'Ujang Aziz', 'Sistem Operasi', 'Jl. Diponegoro No.2'),
('1234567890125', 'Veronica Setyano', 'Teknik Informatika', 'Jl. Sudirman No.3'),
('1234567890126', 'Rizka Nurmala Putri', 'Teknik Informatika', 'Jl. Thamrin No.4'),
('1234567890127', 'Eren Putra', 'Sistem Operasi', 'Jl. Gatot Subroto No.5'),
('1234567890128', 'Putra Abdul Rachman', 'Teknik Informatika', 'Jl. Ahmad Yani No.6'),
('1234567890129', 'Rahmat Andriyadi', 'Teknik Informatika', 'Jl. Pahlawan No.7'),
('1234567890130', 'Ayu Puspitasari', 'Teknik Informatika', 'Jl. Veteran No.8'),
('1234567890131', 'Putri Ayuni', 'Sistem Operasi', 'Jl. Sisingamangaraja No.9'),
('1234567890132', 'Andri Muhammad', 'Teknik Informatika', 'Jl. Mangga Dua No.10');

-- Data matakuliah
INSERT INTO matakuliah (kodemk, nama, jumlah_sks) VALUES
('MK001', 'Basis Data', 3),
('MK002', 'Pemrograman Berbasis Web', 3),
('MK003', 'Algoritma dan Struktur Data', 3),
('MK004', 'Kajian Jurnal Informatika', 2);

-- Data KRS (relasi sesuai gambar)
INSERT INTO krs (mahasiswa_npm, matakuliah_kodemk) VALUES
('1234567890123', 'MK001'),
('1234567890124', 'MK002'),
('1234567890125', 'MK001'),
('1234567890126', 'MK003'),
('1234567890127', 'MK004'),
('1234567890128', 'MK001'),
('1234567890129', 'MK001'),
('1234567890130', 'MK002'),
('1234567890131', 'MK002'),
('1234567890132', 'MK003');