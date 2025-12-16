<?php
session_start();
include 'koneksi.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST['username'];
    $password = $_POST['password'];
    $gender = $_POST['gender']; 

    // Ambil data pengguna
    $query = "SELECT username, password, gender FROM users WHERE username = ?";
    $stmt = mysqli_prepare($koneksi, $query);
    mysqli_stmt_bind_param($stmt, "s", $username);
    mysqli_stmt_execute($stmt);
    $result = mysqli_stmt_get_result($stmt);

    if ($row = mysqli_fetch_assoc($result)) {
        
        // 1. Verifikasi Password
        if (password_verify($password, $row['password'])) {
            
            // 2. Verifikasi Gender
            if ($gender === $row['gender']) {
                // Login Berhasil
                $_SESSION['loggedin'] = true;
                $_SESSION['username'] = $row['username'];
                header("Location: dasboard.php"); // sesuai nama file dashboard
                exit();
            } else {
                // Gender salah
                $_SESSION['login_error'] = "Gender yang Anda pilih tidak cocok dengan data Anda!";
                header("Location: login.php");
                exit();
            }
        } else {
            // Password salah
            $_SESSION['login_error'] = "Username atau Password salah!";
            header("Location: login.php");
            exit();
        }
    } else {
        // Username tidak ditemukan
        $_SESSION['login_error'] = "Username atau Password salah!";
        header("Location: login.php");
        exit();
    }

    mysqli_stmt_close($stmt);
    mysqli_close($koneksi);
} else {
    header("Location: login.php");
}
?>