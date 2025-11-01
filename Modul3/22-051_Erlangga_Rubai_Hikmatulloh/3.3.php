<?php
$height = array("Andy" => "176", "Barry" => "165", "Charlie" => "170");
echo "Andy is " . $height['Andy'] . " cm tall. <br><br>";

// 3.3.1
$height["David"] = "180";
$height["Edward"] = "175";
$height["Fiona"] = "160";
$height["George"] = "168";
$height["Hannah"] = "162";
var_dump($height);
$lastIndex = array_key_last($height);
echo "Indeks terakhir dari array \$height adalah: $lastIndex<br><br>";

// 3.3.2
unset($height["Barry"]);
var_dump($height);
echo "<br>";
$lastIndex = array_key_last($height);
echo "Indeks terakhir dari array \$height adalah: $lastIndex <br><br>";

// 3.3.3
$weight = array("Andy" => "70", "Barry" => "68", "Charlie" => "72");
$keys = array_keys($weight);
echo "Data ke-2 dari array \$weight adalah: " . $weight[$keys[1]] . "kg<br>";
?>