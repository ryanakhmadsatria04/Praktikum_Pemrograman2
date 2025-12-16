<?php
$host = "localhost";
$user = "root"; 
$password = ""; 
$database = "db_auth_baru";

// Koneksi awal tanpa DB untuk memastikan DB dibuat jika belum ada
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
    die("Koneksi database gagal : " . mysqli_connect_error());
}

// Buat tabel users jika belum ada
$createUsersTable = "
CREATE TABLE IF NOT EXISTS users (
    id INT AUTO_INCREMENT PRIMARY KEY,
    username VARCHAR(50) NOT NULL UNIQUE,
    password VARCHAR(255) NOT NULL,
    gender VARCHAR(20) NOT NULL
)";

if (!mysqli_query($koneksi, $createUsersTable)) {
    die("Gagal membuat tabel users: " . mysqli_error($koneksi));
}
?>