<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Pengecekan Tipe Data</title>
</head>
<body>

<?php

$angka = 3;
$teks = "Halo Dunia";
$desimal = 3.14;
$obj = new stdClass();
$kosong = null;
$benar = true;

echo "<h3>Hasil Pengecekan Tipe Data:</h3>";

echo "Apakah \$angka bertipe integer? ";
var_dump(is_int($angka)); 

echo "<br>Apakah \$teks bertipe string? ";
var_dump(is_string($teks));

echo "<br>Apakah \$desimal bertipe float? ";
var_dump(is_float($desimal));

echo "<br>Apakah \$obj bertipe object? ";
var_dump(is_object($obj));

echo "<br>Apakah \$kosong bernilai null? ";
var_dump(is_null($kosong));

echo "<br>Apakah \$benar bertipe boolean? ";
var_dump(is_bool($benar));

echo "<h3>Contoh Casting Tipe Data:</h3>";

$angka_str = (string)$angka; 
$float_ke_int = (int)$desimal;
$bool_ke_int = (int)$benar;

echo "Hasil casting \$angka menjadi string: ";
var_dump($angka_str);

echo "<br>Hasil casting \$desimal menjadi integer: ";
var_dump($float_ke_int);

echo "<br>Hasil casting \$benar menjadi integer: ";
var_dump($bool_ke_int);
?>

</body>
</html>