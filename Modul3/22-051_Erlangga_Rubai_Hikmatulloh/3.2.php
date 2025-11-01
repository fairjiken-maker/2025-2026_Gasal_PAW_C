<?php
$fruits = array("Avocado", "Blueberry", "Cherry");
$arrlength = count($fruits);
for ($x = 0; $x < $arrlength; $x++) {
    echo $fruits[$x];
    echo "<br>";
}
echo "<br>";

// 3.2.1
$arrayLength = count($fruits);
$new_fruits= array("jeruk", "durian", "apel", "mangga", "melon");
for ($x = 0; $x < 5; $x++) {
    $fruits[] = "$new_fruits[$x]";
}
for ($x = 0; $x < count($fruits); $x++) {
    echo $fruits[$x]. "<br>";
}
echo "<br>";

// 3.2.2
$veggies = ["Wortel", "Brokoli", "Sawi"];
for ($x = 0; $x < count($veggies); $x++) {
    echo $veggies[$x] . "<br>";
}
?>
