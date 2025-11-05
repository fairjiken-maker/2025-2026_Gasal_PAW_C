<?php


$fruits = array("Avocado", "Blueberry", "Cherry");

// Menambahkan 5 data baru ke dalam array $fruits
array_push($fruits, "Durian", "Elderberry", "Apple", "Grape", "Mango");

// Menampilkan seluruh data dari array $fruits menggunakan foreach
echo "I like ";
foreach($fruits as $fruit) {
    echo $fruit . ", ";
}
echo "<br>";

// Menampilkan nilai dengan indeks tertinggi dari array $fruits
echo "Data pada indeks tertinggi: " . $fruits[count($fruits)-1] . "<br>";
echo "Indeks tertinggi dari array \$fruits: " . (count($fruits)-1) . "<br>";

// Menghapus elemen kedua (indeks 1, yaitu "Blueberry")
unset($fruits[1]);

echo "<br>";
echo "Setelah menghapus elemen kedua:<br>";
foreach($fruits as $fruit) {
    echo $fruit . ", ";
}
echo "<br>";

echo "Data pada indeks tertinggi: " . $fruits[count($fruits)-1] . "<br>";
echo "Indeks tertinggi dari array \$fruits setelah penghapusan: " . (count($fruits)-1) . "<br>";

//Menambahkan array baru
echo "<br>";
$veggies = array("Carrot", "Broccoli", "Spinach");

echo "Data dari array \$veggies: <br>";
foreach($veggies as $veggie) {
    echo $veggie. ",";
}

?>