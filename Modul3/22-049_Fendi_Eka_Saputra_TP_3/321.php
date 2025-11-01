<?php
$fruits = array("Avocado", "Blueberry", "Cherry");

for ($i = 0; $i < 5; $i++) {
    $fruits[] = "Fruit" . ($i + 1);
}

$arrlength = count($fruits);

for ($x = 0; $x < $arrlength; $x++) {
    echo $fruits[$x];
    echo "<br>";
}
?>
