<?php
$fruits = array("Avocado", "Blueberry", "Cherry");

$fruits[] = "Durian";
$fruits[] = "Elderberry";
$fruits[] = "Fig";
$fruits[] = "Grape";
$fruits[] = "Mangga";


$indeksTertinggi = count($fruits) - 1;

echo "Nilai dengan indeks tertinggi: " . $fruits[$indeksTertinggi] . "<br>";
echo "Indeks tertinggi saat ini: $indeksTertinggi<br><br>";
?>
