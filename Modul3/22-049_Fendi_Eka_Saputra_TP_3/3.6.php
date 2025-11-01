<?php

echo "<h2>Dataset Awal</h2>";
$numbers = [5, 12, 7, 3, 9, 12];
$fruits = ["apple", "banana", "orange"];

print_r($numbers); echo "<br>";
print_r($fruits); echo "<hr>";



echo "<h2>3.6.1 — array_push()</h2>";
array_push($fruits, "grape", "mango");
print_r($fruits);
echo "<hr>";



echo "<h2>3.6.2 — array_merge()</h2>";
$merged = array_merge($numbers, $fruits);
print_r($merged);
echo "<hr>";



echo "<h2>3.6.3 — array_values()</h2>";
$assoc = ["a" => "Red", "b" => "Green", "c" => "Blue"];
$values = array_values($assoc);
print_r($values);
echo "<hr>";



echo "<h2>3.6.4 — array_search()</h2>";
$index = array_search(12, $numbers);
echo "Index pertama dari nilai 12 adalah: " . $index;
echo "<hr>";



echo "<h2>3.6.5 — array_filter()</h2>";
$filtered = array_filter($numbers, function($num) {
    return $num > 6;
});
print_r($filtered);
echo "<hr>";



echo "<h2>3.6.6 — Fungsi Sorting</h2>";

$sort1 = $numbers;
sort($sort1);
echo "sort (menaik): ";
print_r($sort1);
echo "<br>";

$sort2 = $numbers;
rsort($sort2);
echo "rsort (menurun): ";
print_r($sort2);
echo "<br>";

$assocSort = ["John" => 45, "Alice" => 32, "Bob" => 28];
asort($assocSort);
echo "asort (nilai menaik): ";
print_r($assocSort);
echo "<br>";

arsort($assocSort);
echo "arsort (nilai menurun): ";
print_r($assocSort);
echo "<br>";

ksort($assocSort);
echo "ksort (key menaik): ";
print_r($assocSort);
echo "<br>";

krsort($assocSort);
echo "krsort (key menurun): ";
print_r($assocSort);
echo "<hr>";

?>
