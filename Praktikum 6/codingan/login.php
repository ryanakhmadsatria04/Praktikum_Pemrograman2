<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Form Login</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="card">
        <h2>Form Login</h2>
        <?php
        session_start();
        if(isset($_GET['status']) && $_GET['status'] == 'success'): ?>
            <p style="color: green; text-align: center;">Pendaftaran berhasil! Silakan Login.</p>
        <?php elseif(isset($_SESSION['login_error'])): ?>
            <p style="color: red; text-align: center;"><?php echo $_SESSION['login_error']; unset($_SESSION['login_error']); ?></p>
        <?php endif; ?>
        
        <form action="proses_login.php" method="POST">
            <label for="username">Username:</label>
            <input type="text" id="username" name="username" required>

            <label for="password">Password:</label>
            <input type="password" id="password" name="password" required>
            
            <label for="gender">Gender (Wajib Sesuai Saat Daftar):</label>
            <select id="gender" name="gender">
                <option value="Laki-laki">Laki-laki</option>
                <option value="Perempuan">Perempuan</option>
            </select>

            <button type="submit" class="btn">Login</button>
        </form>
        <p class="login-link">Belum punya akun? <a href="register.php">Daftar di sini</a></p>
    </div>
</body>
</html>