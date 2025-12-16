<?php
// File: index.php
ini_set('display_errors', 1); // Tampilkan semua error
error_reporting(E_ALL);

include 'koneksi.php'; // Hubungkan ke database

// --- LOGIKA UPLOAD FOTO (PHP) ---
$upload_message = "";
$tujuan_folder = "uploads/";

// Pastikan folder uploads ada
if (!is_dir($tujuan_folder)) {
    mkdir($tujuan_folder, 0777, true);
}

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['upload'])) {
    $keterangan = mysqli_real_escape_string($koneksi, $_POST['nama']);
    
    if (isset($_FILES['foto']) && $_FILES['foto']['error'] === UPLOAD_ERR_OK) {
        $file_tmp = $_FILES['foto']['tmp_name'];
        $file_name_original = $_FILES['foto']['name'];
        $file_ext = strtolower(pathinfo($file_name_original, PATHINFO_EXTENSION));
        $mime = mime_content_type($file_tmp);
        
        // Buat nama file unik
        $nama_file_unik = uniqid('foto_') . '.' . $file_ext;
        $tujuan_upload = $tujuan_folder . $nama_file_unik; 
        
        $allowed_ext = array('jpg', 'jpeg', 'png', 'gif');
        $allowed_mime = array('image/jpeg','image/png','image/gif');
        if (!in_array($file_ext, $allowed_ext) || !in_array($mime, $allowed_mime)) {
            $upload_message = "<p style='color: red;'>❌ Hanya file gambar (JPG/JPEG/PNG/GIF) yang diizinkan.</p>";
        } elseif ($_FILES['foto']['size'] > 3 * 1024 * 1024) {
            $upload_message = "<p style='color: red;'>❌ Ukuran file max 3MB.</p>";
        } elseif (move_uploaded_file($file_tmp, $tujuan_upload)) {
            $query = "INSERT INTO galeri (nama_file, keterangan) VALUES (?, ?)";
            $stmt = mysqli_prepare($koneksi, $query);
            if ($stmt) {
                mysqli_stmt_bind_param($stmt, "ss", $nama_file_unik, $keterangan);
                if (mysqli_stmt_execute($stmt)) {
                    $upload_message = "<p style='color: green;'>✅ Foto berhasil diunggah dan disimpan!</p>";
                } else {
                    $upload_message = "<p style='color: red;'>❌ Gagal menyimpan data ke database: " . mysqli_error($koneksi) . "</p>";
                }
                mysqli_stmt_close($stmt);
            } else {
                $upload_message = "<p style='color: red;'>❌ Gagal mempersiapkan query.</p>";
            }
        } else {
            $upload_message = "<p style='color: red;'>❌ Gagal memindahkan file ke folder uploads. (Cek izin folder 'uploads').</p>";
        }
    } else {
        $upload_message = "<p style='color: red;'>❌ Silakan pilih file foto yang akan diunggah.</p>";
    }
}

// --- LOGIKA MENAMPILKAN GALERI (PHP) ---
$query_galeri = "SELECT * FROM galeri ORDER BY tanggal_upload DESC";
$result_galeri = mysqli_query($koneksi, $query_galeri);
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Galeri Foto Mahasiswa</title>
    <style>
        /* CSS Dasar untuk Meniru Tampilan */
        body { font-family: Arial, sans-serif; background-color: #f4f4f4; margin: 0; padding: 0; }
        .header { background-color: #007bff; color: white; padding: 15px; text-align: center; }
        .container { max-width: 900px; margin: 20px auto; padding: 20px; background-color: white; border-radius: 8px; box-shadow: 0 0 10px rgba(0,0,0,0.1); }
        .upload-section, .galeri-section { margin-bottom: 30px; border: 1px solid #ddd; padding: 20px; border-radius: 6px; }
        .upload-section h3, .galeri-section h3 { color: #333; margin-top: 0; border-bottom: 1px solid #eee; padding-bottom: 10px; }
        
        /* Form dan Tombol */
        input[type="text"], input[type="file"] { width: 100%; padding: 10px; margin-bottom: 15px; border: 1px solid #ccc; border-radius: 4px; box-sizing: border-box; }
        .btn-upload { background-color: #007bff; color: white; padding: 10px 15px; border: none; border-radius: 4px; cursor: pointer; transition: background-color 0.3s; }
        .btn-upload:hover { background-color: #0056b3; }
        
        /* Galeri Grid */
        .galeri-grid { display: grid; grid-template-columns: repeat(auto-fill, minmax(200px, 1fr)); gap: 20px; }
        .foto-item { border: 1px solid #eee; padding: 10px; border-radius: 4px; box-shadow: 0 2px 5px rgba(0,0,0,0.05); text-align: center; }
        .foto-item img { width: 100%; height: auto; border-radius: 4px; margin-bottom: 10px; }
        .foto-item p { margin: 5px 0; font-size: 0.9em; }
    </style>
</head>
<body>
    <div class="header">
        <h1>GALERI FOTO MAHASISWA</h1>
    </div>

    <div class="container">
        
        <div class="upload-section">
            <h3>⤒ Upload Foto</h3>
            <?php echo $upload_message; // Tampilkan pesan status upload ?>
            
            <form action="index.php" method="POST" enctype="multipart/form-data">
                <label for="nama">Nama:</label>
                <input type="text" id="nama" name="nama" required>

                <label for="foto">Pilih Foto:</label>
                <input type="file" id="foto" name="foto" required>

                <button type="submit" name="upload" class="btn-upload">✈ Upload</button>
            </form>
        </div>
        
        <div class="galeri-section">
            <h3>🖼 Galeri Foto</h3>
            <div class="galeri-grid">
                
                <?php 
                // Loop untuk menampilkan semua foto dari database
                if (mysqli_num_rows($result_galeri) > 0) {
                    while ($data = mysqli_fetch_assoc($result_galeri)) {
                        $file_path = "uploads/" . htmlspecialchars($data['nama_file']);
                        $keterangan_foto = htmlspecialchars($data['keterangan']);
                        $tanggal = date('d M Y H:i', strtotime($data['tanggal_upload']));
                        
                        // Cek keberadaan file sebelum ditampilkan
                        if (file_exists($file_path)) {
                            echo '<div class="foto-item">';
                            // Tampilkan foto
                            echo '<img src="' . $file_path . '" alt="' . $keterangan_foto . '">';
                            echo '<p><strong>' . $keterangan_foto . '</strong></p>';
                            echo '<p style="font-size:0.7em; color:#888;">' . $tanggal . '</p>';
                            echo '</div>';
                        }
                    }
                } else {
                    echo "<p>Belum ada foto yang diunggah. Silakan unggah foto pertama Anda di atas!</p>";
                }
                mysqli_close($koneksi); // Tutup koneksi database
                ?>

            </div>
        </div>
    </div>
</body>
</html>