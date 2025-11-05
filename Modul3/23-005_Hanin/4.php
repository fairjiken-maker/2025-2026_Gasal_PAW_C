<?php
$height = array(
    "andy" => "176",
    "Barry" => "165",
    "charlie" => "170"
);

// Menambahkan 5 data baru ke array $height
$height["Carol"] = "180";
$height["Therese"] = "169";
$height["Harge"] = "160";
$height["Cleopatra"] = "175";
$height["Zara"] = "172";

// Menampilkan seluruh data dari array $height menggunakan foreach
foreach($height as $x => $x_value) {
    echo "key=" . $x . ", value=" . $x_value;
    echo "<br>";
}

// penjelasan:
// Penambahan data: Menambahkan 5 data baru ke dalam array $height dengan cara menambahkannya satu per satu.
// Tidak perlu perubahan pada perulangan: foreach otomatis menangani semua elemen dalam array tanpa perlu memperhitungkan panjang array secara manual, sehingga tidak perlu ada perubahan pada skrip perulangan.
echo "<br>";
$weight = array(
    "andy" => "70",
    "Barry" => "65",
    "charlie" => "68"
);

// Menampilkan seluruh data dari array $weight menggunakan perulangan FOR
$keys = array_keys($weight);  // Mendapatkan semua kunci dari array $weight
for($i = 0; $i < count($weight); $i++) {
    echo "key=" . $keys[$i] . ", value=" . $weight[$keys[$i]];
    echo "<br>";
}

// Penjelasan:

// Array $weight dibuat dengan 3 data (berat badan).
// Modifikasi perulangan: Karena array asosiatif tidak memiliki indeks numerik, kita harus menggunakan array_keys() untuk mendapatkan kunci-kunci array, kemudian mengakses nilai dengan menggunakan kunci tersebut. Ini sedikit berbeda dengan foreach, yang bisa langsung bekerja dengan array asosiatif.
?>
