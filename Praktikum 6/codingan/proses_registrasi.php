<?php
// Tampilkan semua error untuk debugging
ini_set('display_errors', 1);
error_reporting(E_ALL);

session_start();
include 'koneksi.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST['username'];
    $password = $_POST['password'];
    $gender = $_POST['gender'];
    
    // Enkripsi password (WAJIB untuk keamanan)
    $hashed_password = password_hash($password, PASSWORD_DEFAULT);

    // Cek apakah username sudah ada
    $check_query = "SELECT username FROM users WHERE username = ?";
    $stmt_check = mysqli_prepare($koneksi, $check_query);
    mysqli_stmt_bind_param($stmt_check, "s", $username);
    mysqli_stmt_execute($stmt_check);
    mysqli_stmt_store_result($stmt_check);

    if (mysqli_stmt_num_rows($stmt_check) > 0) {
        $_SESSION['error_message'] = "Username sudah terdaftar. Gunakan yang lain.";
        header("Location: register.php");
        exit();
    }
    mysqli_stmt_close($stmt_check);

    // Query untuk menyimpan data
    $query = "INSERT INTO users (username, password, gender) VALUES (?, ?, ?)";
    $stmt = mysqli_prepare($koneksi, $query);
    mysqli_stmt_bind_param($stmt, "sss", $username, $hashed_password, $gender);

    if (mysqli_stmt_execute($stmt)) {
        // Pendaftaran berhasil
        header("Location: login.php?status=success");
    } else {
        // Pendaftaran gagal (misalnya karena masalah database internal)
        $_SESSION['error_message'] = "Pendaftaran gagal! Silakan coba lagi.";
        header("Location: register.php");
    }

    mysqli_stmt_close($stmt);
    mysqli_close($koneksi);
} else {
    header("Location: register.php");
}
?>