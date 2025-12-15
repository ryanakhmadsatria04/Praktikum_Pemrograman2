<?php
$host = 'localhost';
$user = 'root';
$pass = '';
$db   = 'kampus';

// Connect to MySQL server (without selecting DB yet)
$conn = mysqli_connect($host, $user, $pass);
if (!$conn) {
    die('Koneksi ke server gagal: ' . mysqli_connect_error());
}

// Pastikan database tersedia (membuat jika belum ada)
if (!mysqli_query($conn, "CREATE DATABASE IF NOT EXISTS `$db`")) {
    die('Gagal membuat database: ' . mysqli_error($conn));
}

// Gunakan database yang sudah dipastikan ada
if (!mysqli_select_db($conn, $db)) {
    die('Gagal memilih database: ' . mysqli_error($conn));
}

// Pastikan tabel mahasiswa ada (membuat jika belum ada)
$createTable = "
CREATE TABLE IF NOT EXISTS mahasiswa (
    nim VARCHAR(20) PRIMARY KEY,
    nama VARCHAR(100) NOT NULL,
    prodi VARCHAR(100) NOT NULL,
    alamat TEXT
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4";

if (!mysqli_query($conn, $createTable)) {
    die('Gagal memastikan tabel mahasiswa: ' . mysqli_error($conn));
}

// Set charset to avoid encoding issues
mysqli_set_charset($conn, 'utf8mb4');
?>