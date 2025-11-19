<?php
$favcolor = "red";

// Menampilkan warna favorit
echo "Warna favorit saya: $favcolor<br><br>";

// Switch: alternatif if...elseif untuk pengecekan nilai yang sama
switch ($favcolor) {
    case "red":
        echo "Your favorite color is red!";
        break; // Hentikan eksekusi
    case "blue":
        echo "Your favorite color is blue!";
        break;
    case "green":
        echo "Your favorite color is green!";
        break;
    default:
        echo "Your favorite color is neither red, blue, nor green!";
}