<?php
$a = [4, 6, 9, 13, 18];
$a[] = $a[count($a)-1] + 6;
$a[] = $a[count($a)-1] + 7;

$b = [2, 2, 3, 3, 4];
$b[] = 4;
$b[] = 5;

$c = [1, 9, 2, 10, 3];
$c[] = 11;
$c[] = 4;

echo "<pre>";
echo "Hasil Deret:\n";
echo "a. " . implode(", ", $a) . "\n";
echo "b. " . implode(", ", $b) . "\n";
echo "c. " . implode(", ", $c) . "\n";
echo "</pre>";
?>