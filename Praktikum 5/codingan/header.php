// ...
if (isset($_POST['simpan'])) {
    $nim = $_POST['nim'];
    // ... ambil data lainnya
    
    // Query INSERT
    $query = "INSERT INTO mahasiswa (nim, nama, alamat) VALUES ('$nim', '$nama', '$alamat')";
    $result = mysqli_query($koneksi, $query);

    if ($result) {
        // Redirect untuk menghilangkan data POST dan menampilkan pesan sukses
        header("Location: index.php?msg=added");
        exit();
    } 
    // ...
}
// ...