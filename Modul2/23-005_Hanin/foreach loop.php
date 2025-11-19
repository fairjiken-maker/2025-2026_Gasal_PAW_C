<?php
echo "Perulangan Foreach:<br>";
echo "==================<br>";

// Array: kumpulan data dalam satu variabel
$colors = array("red", "green", "blue", "yellow");

// Foreach: loop khusus untuk array
foreach ($colors as $value) {
    echo "$value <br>";
}

echo "<br>Contoh 2 - Array dengan index:<br>";
echo "==================<br>";
$fruits = array("Apple", "Banana", "Orange", "Mango");

foreach ($fruits as $index => $fruit) {
    $no = $index + 1;
    echo "$no. $fruit<br>";
}

echo "<br>Contoh 3 - Array Asosiatif (key => value):<br>";
echo "==================<br>";
$student = array(
    "nama" => "Budi",
    "nim" => "123456",
    "jurusan" => "Informatika",
    "semester" => 5
);

foreach ($student as $key => $value) {
    echo ucfirst($key) . ": $value<br>";
}

echo "<br>Contoh 4 - Array Multi Dimensi:<br>";
echo "==================<br>";
$students = array(
    array("nama" => "Budi", "nilai" => 85),
    array("nama" => "Ani", "nilai" => 90),
    array("nama" => "Citra", "nilai" => 78)
);

foreach ($students as $student) {
    echo "Nama: {$student['nama']}, Nilai: {$student['nilai']}<br>";
}
?>