<?php
session_start();

// Cek apakah pengguna sudah login
if (!isset($_SESSION['loggedin']) || $_SESSION['loggedin'] !== true) {
    header("Location: login.php");
    exit();
}

$username = $_SESSION['username'];
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Dashboard</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="card welcome-card">
        <h2>Selamat Datang, <?php echo htmlspecialchars($username); ?> 🎉</h2>
        <p>Kamu berhasil login ke sistem otentikasi PHP.</p>
        <a href="logout.php" class="btn logout-btn">Logout</a>
    </div>
</body>
</html>