<!DOCTYPE html>
<html>
<head>
    <title>Form Input Data Mahasiswa</title>
</head>
<body>

<h2>Form Input Data Mahasiswa</h2>

<form action="simpan.php" method="POST">
    <label>NIM</label><br>
    <input type="text" name="nim" required><br><br>

    <label>Nama</label><br>
    <input type="text" name="nama" required><br><br>

    <label>Program Studi</label><br>
    <input type="text" name="prodi" required><br><br>

    <label>Alamat</label><br>
    <textarea name="alamat"></textarea><br><br>

    <button type="submit">Simpan</button>
</form>

</body>
</html>