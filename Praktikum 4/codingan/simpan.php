<?php
include "koneksi.php";

$nim    = $_POST['nim'];
$nama   = $_POST['nama'];
$prodi  = $_POST['prodi'];
$alamat = $_POST['alamat'];

$query = "INSERT INTO mahasiswa (nim, nama, prodi, alamat) 
          VALUES ('$nim', '$nama', '$prodi', '$alamat')";

if (mysqli_query($conn, $query)) {
    echo "Data berhasil disimpan!<br>";
    echo "<a href='form_mahasiswa.php'>Input lagi</a>";
} else {
    echo "Gagal menyimpan data: " . mysqli_error($conn);
}
?>