<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Menampilkan Informasi Variabel</title>
</head>
<body>
    <?php
    // Deklarasi dan inisialisasi
    $angka = 3;

    // Menampilkan informasi detail dari variabel
    echo "<b>Output menggunakan var_dump()</b><br>";
    var_dump($angka);

    echo "<br><br><b>Output menggunakan print_r()</b><br>";
    print_r($angka);

    echo "<br><br><b>Output menggunakan echo</b><br>";
    echo $angka;
    ?>
</body>
</html>