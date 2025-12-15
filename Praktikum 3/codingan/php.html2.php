<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Latihan Kombinasi PHP di Dalam HTML</title>
</head>
<body>

    <p>Belajar menulis kode <?php echo "PHP"; ?> langsung di dalam HTML.</p>

    <p>
        Hari ini tanggal: 
        <?php 
            // Menampilkan tanggal saat ini
            echo date("d F Y");
        ?>
    </p>

    <p>
        Hasil penjumlahan 5 + 7 = 
        <?php 
            $hasil = 5 + 7;
            echo $hasil;
        ?>
    </p>

</body>
</html>