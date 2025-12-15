<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Form Registrasi Mahasiswa Baru</title>
    <style>
        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background: linear-gradient(135deg, #4b84bd, #ffffff);
            margin: 0;
            padding: 0;
        }

        .container {
            width: 450px;
            margin: 60px auto;
            background-color: #ffffff;
            padding: 30px;
            border-radius: 15px;
            box-shadow: 0px 4px 15px rgba(0,0,0,0.1);
        }

        h1 {
            text-align: center;
            color: #333;
            margin-bottom: 20px;
        }

        label {
            display: block;
            margin-bottom: 6px;
            font-weight: 600;
            color: #555;
        }

        input[type="text"], textarea, select {
            width: 100%;
            padding: 10px;
            border: 1px solid #2a2929;
            border-radius: 8px;
            font-size: 14px;
            margin-bottom: 15px;
            box-sizing: border-box;
        }

        input[type="radio"] {
            margin-right: 8px;
        }

        .gender {
            margin-bottom: 15px;
        }

        .button-container {
            text-align: center;
        }

        input[type="submit"], input[type="reset"] {
            background-color: #0078D7;
            color: rgb(245, 242, 242);
            border: none;
            padding: 10px 20px;
            border-radius: 8px;
            cursor: pointer;
            font-size: 14px;
            margin: 5px;
            transition: 0.3s;
        }

        input[type="reset"] {
            background-color: #999;
        }

        input[type="submit"]:hover {
            background-color: #005cbf;
        }

        input[type="reset"]:hover {
            background-color: #777;
        }

        footer {
            text-align: center;
            font-size: 12px;
            color: #777;
            margin-top: 20px;
        }
    </style>
</head>
<body>

    <div class="container">
        <h1>Registrasi Mahasiswa Baru</h1>
        <form action="proses_registrasi.php" method="post">
            <label for="nama">Nama Lengkap</label>
            <input type="text" id="nama" name="nama" required>

            <label for="nim">NIM</label>
            <input type="text" id="nim" name="nim" required>

            <label for="jurusan">Jurusan</label>
            <select id="jurusan" name="jurusan" required>
                <option value="">-- Pilih Jurusan --</option>
                <option value="Teknik Informatika">Teknik Informatika</option>
                <option value="Sistem Informasi">Sistem Informasi</option>
                <option value="Teknik Komputer">Teknik Komputer</option>
                <option value="Manajemen Informatika">Manajemen Informatika</option>
            </select>

            <div class="gender">
                <label>Jenis Kelamin</label>
                <input type="radio" id="laki" name="jk" value="Laki-laki" required>
                <label for="laki">Laki-laki</label>
                <input type="radio" id="perempuan" name="jk" value="Perempuan" required>
                <label for="perempuan">Perempuan</label>
            </div>

            <label for="alamat">Alamat</label>
            <textarea id="alamat" name="alamat" rows="4" required></textarea>

            <div class="button-container">
                <input type="submit" value="Daftar">
                <input type="reset" value="Batal">
            </div>
        </form>
    </div>

    <footer>© 2025 Sistem Registrasi Mahasiswa</footer>

</body>
</html>