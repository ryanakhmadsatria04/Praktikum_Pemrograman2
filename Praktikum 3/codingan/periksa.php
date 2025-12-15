<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Pemeriksaan Variabel PHP</title>
</head>
<body>
    <?php
    // Deklarasi dan inisialisasi variabel
    $bil = 3;
    var_dump($bil); // Output: int(3)
    echo "<br>";

    // Variabel dengan nilai string kosong
    $var = "";
    var_dump($var); // Output: string(0) ""
    echo "<br>";

    // Variabel dengan nilai NULL
    $var = null;
    var_dump($var); // Output: NULL
    echo "<hr>";

    // Pemeriksaan apakah variabel sudah diset menggunakan isset()
    if (isset($bil)) {
        echo "Variabel \$bil sudah di-set dan bernilai: " . $bil . "<br>";
    } else {
        echo "Variabel \$bil belum di-set.<br>";
    }

    if (isset($var)) {
        echo "Variabel \$var sudah di-set.<br>";
    } else {
        echo "Variabel \$var belum di-set.<br>";
    }

    // Contoh beberapa variabel sekaligus
    $a = 10;
    $b = null;
    echo "<hr>";

    echo "Pemeriksaan beberapa variabel sekaligus:<br>";
    var_dump(isset($a, $b)); // hanya TRUE jika semua variabel bernilai dan tidak NULL
    ?>
</body>
</html>