<?php
// Mengambil jam saat ini
$t = date("H");

// Menampilkan jam saat ini untuk referensi
echo "Jam saat ini: $t:00<br><br>";

// Kondisi: Jika jam kurang dari 20 (8 malam)
if ($t < "20") {
    echo "Have a good day!";
}