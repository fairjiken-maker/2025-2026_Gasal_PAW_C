<?php
// Mengambil jam saat ini
$t = date("H");

// Menampilkan jam saat ini untuk referensi
echo "Jam saat ini: $t:00<br><br>";

// Kondisi bertingkat: cek beberapa kondisi
if ($t > "10") {
    echo "Have a good morning!";
} elseif ($t < "20") {
    echo "Have a good day!";
} else {
    echo "Have a good night!";
}