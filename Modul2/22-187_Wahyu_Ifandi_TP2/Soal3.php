<?php
$t = date("H");

if ($t < "10") { // Jika jam sebelum 10 pagi
    echo "Have a good morning!";
} elseif ($t < "20") { // Jika jam sebelum 8 malam
    echo "Have a good day!";
} else { // Selain itu
    echo "Have a good night!";
}
?>
