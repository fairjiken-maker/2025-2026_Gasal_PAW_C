<?php
//3.6.1. Implementasi fungsi array_push()
$fruits = array("Apple", "Banana");

array_push($fruits, "Orange", "Mango");

print_r($fruits);
echo "<br>";

//3.6.2. Implementasi fungsi array_merge()
$array1 = array("Apple", "Banana");
$array2 = array("Orange", "Mango");

$result = array_merge($array1, $array2);

print_r($result);
echo "<br>";

//3.6.3. Implementasi fungsi array_values()
$fruits = array("a" => "Apple", "b" => "Banana", "c" => "Orange");
$values = array_values($fruits);

print_r($values);
echo "<br>";

//3.6.4. Implementasi fungsi array_search()
$fruits = array("Apple", "Banana", "Orange");
$key = array_search("Banana", $fruits);

if ($key !== false) {
    echo "Banana ditemukan pada indeks: " . $key;
} else {
    echo "Banana tidak ditemukan.";
}
echo "<br>";

//3.6.5. Implementasi fungsi array_filter()
$numbers = array(1, 2, 3, 4, 5, 6);
$even = array_filter($numbers, function($num) {
    return $num % 2 == 0;
});

print_r($even);

//3.6.6. Implementasi berbagai fungsi sorting pada array
$fruits = array("Banana", "Apple", "Orange");
sort($fruits);
print_r($fruits);

echo "<br>";

$fruits = array("Banana", "Apple", "Orange");
rsort($fruits);
print_r($fruits);

echo "<br>";

$height = array("Andy" => 176, "Barry" => 165, "Charlie" => 170);
asort($height);
print_r($height);
?>