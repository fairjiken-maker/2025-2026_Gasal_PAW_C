<?php
$t = date("H");

if ($t < "20") { // Jika jam kurang dari 20
    echo "Have a good day!";
} else { // Jika jam lebih dari atau sama dengan 20
    echo "Have a good night!";
}
?>
