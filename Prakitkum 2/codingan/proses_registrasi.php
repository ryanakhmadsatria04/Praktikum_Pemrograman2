
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Hasil Registrasi Mahasiswa</title>
    <style>
        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background: linear-gradient(135deg, #c9d6ff, #e2e2e2);
            margin: 0;
            padding: 0;
        }

        .container {
            width: 500px;
            margin: 80px auto;
            background-color: #fff;
            padding: 25px;
            border-radius: 15px;
            box-shadow: 0px 4px 15px rgba(0,0,0,0.1);
        }

        h1 {
            text-align: center;
            color: #333;
        }

        .data p {
            font-size: 15px;
            color: #444;
            line-height: 1.6;
        }

        .data b {
            color: #0078D7;
        }

        .back-btn {
            display: block;
            width: 100%;
            text-align: center;
            margin-top: 25px;
        }

        .back-btn a {
            text-decoration: none;
            background-color: #0078D7;
            color: white;
            padding: 10px 20px;
            border-radius: 8px;
            transition: 0.3s;
        }

        .back-btn a:hover {
            background-color: #005cbf;
        }

        footer {
            text-align: center;
            margin-top: 25px;
            font-size: 12px;
            color: #777;
        }
    </style>
</head>
<body>

<div class="container">
    <h1>Data Registrasi Mahasiswa</h1>
    <hr>

    <div class="data">
        <?php
        $nama    = $_POST["nama"];
        $nim     = $_POST["nim"];
        $jurusan = $_POST["jurusan"];
        $jk      = $_POST["jk"];
        $alamat  = $_POST["alamat"];
        ?>

        <p><b>Nama Lengkap:</b> <?= htmlspecialchars($nama); ?></p>
        <p><b>NIM:</b> <?= htmlspecialchars($nim); ?></p>
        <p><b>Jurusan:</b> <?= htmlspecialchars($jurusan); ?></p>
        <p><b>Jenis Kelamin:</b> <?= htmlspecialchars($jk); ?></p>
        <p><b>Alamat:</b><br><?= nl2br(htmlspecialchars($alamat)); ?></p>
    </div>

    <div class="back-btn">
        <a href="registrasi.php">← Kembali ke Form</a>
    </div>
</div>

<footer>© 2025 Sistem Registrasi Mahasiswa</footer>

</body>
</html>
