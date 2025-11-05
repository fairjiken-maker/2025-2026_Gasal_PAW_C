<?php

$students = array(
    array("George", "2304111", "081122233"),
    array("Andris", "2304111", "081157233"),
    array("Michael", "2304111", "081146233"),
);

// Menambahkan 5 data baru ke dalam array $students
array_push($students,
    array("Carol", "2304222", "081198766"),
    array("Therese", "2304333", "081199877"),
    array("Harge", "2304444", "081188655"),
    array("Cleopatra", "2304555", "081177544"),
    array("Zara", "2304666", "081166433")
);

// Menampilkan data dalam array setelah penambahan
for($row = 0; $row < count($students); $row++) {
    echo "<p><b>Row number $row</b></p>";
    echo "<ul>";
    for($col=0; $col < 3; $col++) {
        echo "<li>".$students[$row][$col]."</li>";
    }
    echo "</ul>";
}

echo "<br>";


$students = array(
    array("George", "2304111", "081122233"),
    array("Andris", "2304111", "081157233"),
    array("Michael", "2304111", "081146233"),
    array("Carol", "2304222", "081198766"),
    array("Therese", "2304333", "081199877"),
    array("Harge", "2304444", "081188655"),
    array("Cleopatra", "2304555", "081177544"),
    array("Zara", "2304666", "081166433")
);

// Menampilkan data dalam bentuk tabel
echo "<table border='1' cellpadding='5' cellspacing='0'>";
echo "<tr><th>Name</th><th>ID</th><th>Phone</th></tr>";
for($row = 0; $row < count($students); $row++) {
    echo "<tr>";
    for($col = 0; $col < 3; $col++) {
        echo "<td>".$students[$row][$col]."</td>";
    }
    echo "</tr>";
}
echo "</table>";



?>
