<?php
$fruits = array("Avocado", "Blueberry", "Cherry");

$fruits[] = "Durian";
$fruits[] = "Elderberry";
$fruits[] = "Fig";
$fruits[] = "Grape";
$fruits[] = "Mangga";

unset($fruits[2]);

$fruits = array_values($fruits);

$indeksTertinggi = count($fruits) - 1;

echo "Indeks tertinggi saat ini: $indeksTertinggi<br><br>";

?>
