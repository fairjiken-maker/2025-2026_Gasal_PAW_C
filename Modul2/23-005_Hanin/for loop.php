<?php
echo "Perulangan For:<br>";
echo "==================<br>";

// For: loop dengan counter/penghitung
for ($x = 0; $x <= 10; $x++) {
    echo "The number is: $x <br>";
}

echo "<br>Contoh lain - Hitung mundur:<br>";
echo "==================<br>";
for ($i = 10; $i >= 1; $i--) {
    echo "Countdown: $i <br>";
}
echo "Blast off!<br>";

echo "<br>Contoh lain - Kelipatan 5:<br>";
echo "==================<br>";
for ($j = 5; $j <= 50; $j += 5) {
    echo "$j ";
}

echo "<br><br>Contoh lain - Genap saja:<br>";
echo "==================<br>";
for ($k = 0; $k <= 20; $k++) {
    if ($k % 2 == 0) { // Modulo: cek sisa bagi
        echo "$k ";
    }
}
?>