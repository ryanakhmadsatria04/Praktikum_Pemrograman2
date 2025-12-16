<?php
// Panggil file koneksi
include 'koneksi.php';

// --- Proses Tambah Data (Create) ---
$msg = '';
if (isset($_POST['simpan'])) {
    $nim = $_POST['nim'];
    $nama = $_POST['nama'];
    $alamat = $_POST['alamat'];

    // Query untuk menyimpan data
    $query = "INSERT INTO mahasiswa (nim, nama, alamat) VALUES ('$nim', '$nama', '$alamat')";
    $result = mysqli_query($koneksi, $query);

    if ($result) {
        // Redirect dengan pesan sukses
        header("Location: index.php?msg=added");
        exit();
    } else {
        $msg = "<div class='alert alert-danger'>Data gagal ditambahkan: " . mysqli_error($koneksi) . "</div>";
    }
}

// Cek jika ada pesan sukses dari redirect
if (isset($_GET['msg']) && $_GET['msg'] == 'added') {
    $msg = "<div class='alert alert-success'><i class='bi bi-check-circle-fill'></i> Data berhasil ditambahkan!</div>";
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Aplikasi Data Mahasiswa</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet">
    <style>
        .navbar {
            background-color: #0d6efd; /* Warna biru Bootstrap primary */
        }
        .navbar-brand {
            color: white !important;
        }
    </style>
</head>
<body>

    <nav class="navbar navbar-expand-lg">
        <div class="container-fluid">
            <a class="navbar-brand" href="#">Aplikasi Data Mahasiswa</a>
        </div>
    </nav>

    <div class="container mt-4">
        <div class="d-flex justify-content-between align-items-center mb-3">
            <h2 class="mb-0">Data Mahasiswa</h2>
            <button type="button" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#tambahDataModal">
                <i class="bi bi-plus"></i> Tambah
            </button>
        </div>

        <?php echo $msg; ?>

        <div class="card shadow-sm">
            <div class="card-body p-0">
                <table class="table table-hover mb-0">
                    <thead class="table-primary">
                        <tr>
                            <th scope="col" style="width: 50px;">#</th>
                            <th scope="col" style="width: 120px;">NIM</th>
                            <th scope="col">Nama</th>
                            <th scope="col">Alamat</th>
                            <th scope="col" style="width: 150px;">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        // Query untuk mengambil semua data mahasiswa
                        $data = mysqli_query($koneksi, "SELECT * FROM mahasiswa ORDER BY id ASC");
                        $no = 1;
                        while ($d = mysqli_fetch_array($data)) {
                        ?>
                            <tr>
                                <td><?php echo $no++; ?></td>
                                <td><?php echo htmlspecialchars($d['nim']); ?></td>
                                <td><?php echo htmlspecialchars($d['nama']); ?></td>
                                <td><?php echo htmlspecialchars($d['alamat']); ?></td>
                                <td>
                                    <a href="#" class="btn btn-sm btn-info text-white">Edit</a>
                                    <a href="#" class="btn btn-sm btn-danger">Hapus</a>
                                </td>
                            </tr>
                        <?php
                        }
                        // Cek jika tabel kosong
                        if (mysqli_num_rows($data) == 0) {
                            echo "<tr><td colspan='5' class='text-center'>Belum ada data mahasiswa.</td></tr>";
                        }
                        ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <div class="modal fade" id="tambahDataModal" tabindex="-1" aria-labelledby="tambahDataModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <form method="POST" action="index.php">
                    <div class="modal-header">
                        <h5 class="modal-title" id="tambahDataModalLabel">Tambah Data</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <div class="mb-3">
                            <label for="nim" class="form-label">NIM*</label>
                            <input type="text" class="form-control" id="nim" name="nim" required placeholder="Contoh: 123456" value="<?php echo isset($_POST['nim']) ? htmlspecialchars($_POST['nim']) : ''; ?>">
                        </div>
                        <div class="mb-3">
                            <label for="nama" class="form-label">Nama*</label>
                            <input type="text" class="form-control" id="nama" name="nama" required placeholder="Contoh: Nama" value="<?php echo isset($_POST['nama']) ? htmlspecialchars($_POST['nama']) : ''; ?>">
                        </div>
                        <div class="mb-3">
                            <label for="alamat" class="form-label">Alamat</label>
                            <input type="text" class="form-control" id="alamat" name="alamat" placeholder="Contoh: Alamat" value="<?php echo isset($_POST['alamat']) ? htmlspecialchars($_POST['alamat']) : ''; ?>">
                        </div>
                    </div>
                    <div class="modal-footer justify-content-end">
                        <button type="submit" name="simpan" class="btn btn-success">Simpan</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>