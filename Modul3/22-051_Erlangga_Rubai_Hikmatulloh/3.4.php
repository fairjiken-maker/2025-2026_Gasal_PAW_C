<?php
$height = array("Andy" => "176", "Barry" => "165", "Charlie" => "170");

foreach ($height as $x => $x_value) {
    echo "Key=" . $x . ", Value=" . $x_value;
    echo "<br>"; 
}

echo "<br>"; 
//3.4.1
$height["Diana"] = "165";
$height["Ethan"] = "180";
$height["Fiona"] = "172";
$height["George"] = "160";
$height["Hannah"] = "158";
foreach ($height as $x => $x_value) {
    echo "Key=" . $x . ", Value=" . $x_value;
    echo "<br>"; 
}

//3.4.2
$weight = ["Andy" => "70", "Barry" => "68", "Charlie" => "75"];
$keys = array_keys($weight);
$values = array_values($weight);
echo "<br>";
for ($i = 0; $i < count($weight); $i++) {
    echo "Key=" . $keys[$i] . ", Value=" . $values[$i];
    echo "<br>";
}
?>
