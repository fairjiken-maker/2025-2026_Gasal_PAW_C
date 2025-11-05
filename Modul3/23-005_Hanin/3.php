<?php
$height = array(
    "Andy" => "176",
    "Barry" => "165",
    "Charlie" => "170"
);

// Menambahkan 5 data baru
$height["Carol"] = "180";
$height["Therese"] = "169";
$height["Harge"] = "160";
$height["Cleopatra"] = "175";
$height["Zara"] = "172";

foreach($height as $x => $x_value) {
    echo  $x . ", value=" . $x_value;
    echo "<br>";
}
// Menampilkan nilai dengan indeks terakhir
$lastKey = array_key_last($height);
echo "$lastKey is " . $height[$lastKey] . "cm tall<br>";

echo "<br>";
$height = array(
    "Andy" => "176",
    "Barry" => "165",
    "Charlie" => "170",
    "Carol" => "180",
    "Therese" => "169",
    "Harge" => "160",
    "Cleopatra" => "175",
    "Zara" => "172"
);


unset($height["David"]);
foreach($height as $x => $x_value) {
    echo  $x . ", value=" . $x_value;
    echo "<br>";
}
$lastKey = array_key_last($height);
echo "$lastKey is " . $height[$lastKey] . "cm tall<br>";

echo "<br>";
$weight = array("andy" => "70", "Barry" => "65", "charlie" => "68");

// Menampilkan data ke-2 dari array $weight
$keys = array_keys($weight);  
echo "Data ke-2 dari array \$weight: " . $weight[$keys[1]] . "kg<br>";
?>

