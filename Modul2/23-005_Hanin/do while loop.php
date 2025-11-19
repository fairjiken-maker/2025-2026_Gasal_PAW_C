<?php
$x = 1;

echo "Perulangan Do...While:<br>";
echo "==================<br>";

// Do...While: eksekusi DULU, baru cek kondisi
do {
    echo "The number is: $x <br>";
    $x++;
} while ($x <= 5);

echo "<br>Nilai $x setelah loop: $x";
?>