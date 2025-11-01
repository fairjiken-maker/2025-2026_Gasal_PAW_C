<?php
$fruits = array("Avocado", "Blueberry", "Cherry");
echo "I like " . $fruits[0] . ", " . $fruits[1]. " and " . $fruits[2] . ".";
echo"<br><br>";

// 3.1.1 
array_push($fruits, "Rambutan", "Blewah", "Timun Mas", "Klengkeng", "Keres");
echo "Isi array \$fruits setelah penambahan: ";
var_dump($fruits);
$indeksTertinggi = array_key_last($fruits);
echo "Indeks tertinggi dari array \$fruits adalah: $indeksTertinggi<br><br><br>";


// 3.1.2 
unset($fruits[2]);
echo "Isi array \$fruits setelah penghapusan: ";
var_dump($fruits);
$indeksTertinggi = array_key_last($fruits);
echo "Indeks tertinggi dari array \$fruits setelah penghapusan adalah: $indeksTertinggi<br><br><br>";


//3.1.3 
$veggies = ["Wortel", "Brokoli", "Sawi"];
echo "Isi array \$veggies: ";
var_dump($veggies);
?>
