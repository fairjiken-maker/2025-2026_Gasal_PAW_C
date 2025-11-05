<?php

$fruits = array("Avocado", "Blueberry", "Cherry");

// Menambahkan 5 data baru menggunakan perulangan FOR
$newFruits = array("Durian", "Elderberry", "Apple", "Grape", "Mango");
for($i = 0; $i < count($newFruits); $i++){
    $fruits[] = $newFruits[$i];  // Menambah data baru ke array $fruits
}

$arrLength = count($fruits);
for($x = 0; $x < $arrLength; $x++){
    echo $fruits[$x];
    echo "<br>";
}

echo "Jumlah data dalam array \$fruits saat ini: " . $arrLength . "<br>";

//Penjelasan:
// Menambahkan data baru: Menggunakan perulangan FOR untuk memasukkan data dari array $newFruits ke dalam array $fruits. Perulangan ini akan berjalan sebanyak 5 kali, menambahkan elemen baru ke dalam array $fruits.
// Memperbarui perulangan: Skrip perulangan FOR di bagian menampilkan data harus diperbarui agar memperhitungkan penambahan panjang array. Dengan menghitung panjang array dengan count($fruits) setelah penambahan elemen, kita memastikan seluruh elemen ditampilkan.
// Panjang array: Setelah penambahan, panjang array $fruits menjadi 8.

echo "<br>";
$veggies = array("Carrot", "Broccoli", "Spinach");

$veggiesLength = count($veggies);
for($x = 0; $x < $veggiesLength; $x++){
    echo $veggies[$x];
    echo "<br>";
}

// Penjelasan:

// Modifikasi skrip: Hanya sedikit modifikasi yang perlu dilakukan, yaitu mengganti nama array dari $fruits menjadi $veggies dan mengganti variabel panjang array sesuai dengan array yang baru.
// Mengapa modifikasi sedikit?: Karena struktur dasar dari perulangan FOR tidak berubah. Yang berubah hanyalah nama array dan jumlah datanya. Kita tetap menggunakan logika yang sama untuk menghitung panjang array dan menampilkan setiap elemennya.
?>
