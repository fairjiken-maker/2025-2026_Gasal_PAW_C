<?php
$t = date("H"); // Ambil jam sekarang (format 24 jam)

if ($t < "20") { // Jika jam kurang dari 20
    echo "Have a good day!";
}
?>
