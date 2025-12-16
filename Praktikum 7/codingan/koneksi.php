<?php
// File: koneksi.php
$host = "localhost";
$user = "root";
$password = "";
$database = "db_galeri_foto";

// Koneksi awal (tanpa DB) untuk membuat DB jika belum ada
$conn = mysqli_connect($host, $user, $password);
if (!$conn) {
    die("Koneksi ke MySQL gagal: " . mysqli_connect_error());
}

// Buat database jika belum ada
if (!mysqli_query($conn, "CREATE DATABASE IF NOT EXISTS `$database`")) {
    die("Gagal membuat database `$database`: " . mysqli_error($conn));
}

// Koneksi ke database target
$koneksi = mysqli_connect($host, $user, $password, $database);
if (!$koneksi) {
    die("Koneksi database gagal: " . mysqli_connect_error());
}

// Buat tabel galeri jika belum ada
$createTable = "
CREATE TABLE IF NOT EXISTS galeri (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nama_file VARCHAR(255) NOT NULL,
    keterangan VARCHAR(255) NOT NULL,
    tanggal_upload TIMESTAMP DEFAULT CURRENT_TIMESTAMP
)";

if (!mysqli_query($koneksi, $createTable)) {
    die("Gagal membuat tabel galeri: " . mysqli_error($koneksi));
}
?>