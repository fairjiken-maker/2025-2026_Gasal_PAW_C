<?php
// Mengambil jam saat ini
$t = date("H");

// Menampilkan jam saat ini untuk referensi
echo "Jam saat ini: $t:00<br><br>";

// Kondisi: Jika jam kurang dari 20, else untuk kondisi lainnya
if ($t > "20") {
    echo "Have a good day!";
} else {
    echo "Have a good night!";
}