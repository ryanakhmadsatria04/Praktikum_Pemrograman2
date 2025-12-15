<!DOCTYPE html>
<html lang="en">
<head>
    <title>Seleksi If-ElseIf</title>
</head>
<body>

<?php
    $a = 10;
    $b = 10;

    if($a > $b){
        echo "Nilai a lebih besar dari b";
    } elseif($a < $b){
        echo "Nilai a lebih kecil dari b";
    } else {
        echo "Nilai a sama dengan b";
    }
?>

</body>
</html>