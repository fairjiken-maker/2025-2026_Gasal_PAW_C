<?php
// 3.6.1
$array1 = [1, 2, 3]; 
array_push($array1, 4, 5, 6);
var_dump($array1);
echo "<br><br>";

// 3.6.2 
$array1 = [1, 2, 3]; 
$array2 = [4, 5]; 
$mergedArray = array_merge($array1, $array2); 
var_dump($mergedArray);
echo "<br><br>";

// 3.6.3
$array = ["a" => 1, "b" => 2, "c" => 3];
$valuesArray = array_values($array); 
var_dump($valuesArray); 
echo "<br><br>";

// 3.6.4
$array = ["apple", "banana", "cherry"]; 
$searchValue = "banana";
$searchResult = array_search($searchValue, $array); 
var_dump($searchResult);
echo "<br><br>";

// 3.6.5
$array = [1, 2, 3, 4, 5]; 
$filteredArray = array_filter($array, function($value) {
    return $value % 2 == 0; 
});
var_dump($filteredArray);
echo "<br><br>";

// 3.6.6
$array = [5, 3, 1, 4, 2];
sort($array); 
var_dump($array);
?>