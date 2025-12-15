<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Contoh Casting Tipe Data</title>
</head>
<body>

<?php

$str = '123abc';
$bil = (int) $str; 
echo "Nilai \$str: $str <br>";
echo "Setelah casting menjadi integer: $bil <br>";
echo "Tipe data \$str: " . gettype($str) . "<br>";  
echo "Tipe data \$bil: " . gettype($bil) . "<br><br>";


$angka_float = 45.67;
$angka_int = (int) $angka_float;
echo "Nilai float: $angka_float <br>";
echo "Setelah casting ke integer: $angka_int <br>";
echo "Tipe data sekarang: " . gettype($angka_int) . "<br><br>";


$angka2 = 500;
$angka_str = (string) $angka2;
echo "Nilai integer: $angka2 <br>";
echo "Setelah casting ke string: $angka_str <br>";
echo "Tipe data sekarang: " . gettype($angka_str) . "<br><br>";


$benar = true;
$salah = false;
echo "True menjadi integer: " . (int)$benar . "<br>";
echo "False menjadi integer: " . (int)$salah . "<br><br>";


$data = array("nama" => "Andi", "umur" => 20);
$objek = (object)$data;
echo "Nama dari object: " . $objek->nama . "<br>";
echo "Umur dari object: " . $objek->umur . "<br>";
echo "Tipe data hasil casting: " . gettype($objek) . "<br>";
?>

</body>
</html>