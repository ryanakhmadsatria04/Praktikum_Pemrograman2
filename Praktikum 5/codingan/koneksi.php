<?php
// Pengaturan koneksi database
$host = "localhost"; // Biasanya localhost
$user = "root";      // Ganti dengan username database Anda
$pass = "";          // Ganti dengan password database Anda
$db   = "praktikum_5"; // Nama database yang digunakan

// Coba koneksi awal tanpa menentukan database, agar bisa membuat DB jika belum ada
$conn = mysqli_connect($host, $user, $pass);
if (!$conn) {
    die("Koneksi ke MySQL gagal: " . mysqli_connect_error());
}

// Buat database jika belum ada
$createDb = mysqli_query($conn, "CREATE DATABASE IF NOT EXISTS `$db`");
if (!$createDb) {
    die("Gagal membuat database `$db`: " . mysqli_error($conn));
}

// Pilih database yang baru dibuat/ada
$koneksi = mysqli_connect($host, $user, $pass, $db);
if (!$koneksi) {
    die("Koneksi ke database `$db` gagal: " . mysqli_connect_error());
}

// Pastikan tabel mahasiswa ada
$createTableSql = "
CREATE TABLE IF NOT EXISTS mahasiswa (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nim VARCHAR(50) NOT NULL,
    nama VARCHAR(100) NOT NULL,
    alamat VARCHAR(255)
)";

if (!mysqli_query($koneksi, $createTableSql)) {
    die("Gagal membuat tabel mahasiswa: " . mysqli_error($koneksi));
}
?>