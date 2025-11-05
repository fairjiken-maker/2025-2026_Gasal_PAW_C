<?php
$x = 1;

echo "Perulangan While:<br>";
echo "==================<br>";

// While: cek kondisi DULU, baru eksekusi
while($x <= 5) {
    echo "The number is: $x <br>";
    $x++; // Increment (tambah 1)
}

echo "<br>Nilai $x setelah loop: $x";
?>