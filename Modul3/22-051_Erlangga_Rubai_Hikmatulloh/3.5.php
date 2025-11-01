<?php
$students = array(
    array("Alex", "220401", "0812345678"),
    array("Bianca", "220402", "0812345687"),
    array("Candice", "220403", "0812345665"),
);
for ($row =0; $row < 3; $row++){
    echo "<p><b>Row number $row</b></p>";
    echo "<ul>";
    for ($col= 0; $col<3; $col++){
    echo "<li>".$students[$row][$col]."</i>";
    }
    echo "</ul>";
}
echo "<br><br>";

//3.5.1
$students = array(
    array("Alex","220401","0812345678"),
    array("Bianca","220402","0812345687"),
    array("Candice","220403","0812345665"),
);

$students[] = array("David", "220404", "0812345699");
$students[] = array("Eve", "220405", "0812345644");
$students[] = array("Frank", "220406", "0812345622");
$students[] = array("Grace", "220407", "0812345611");
$students[] = array("Hannah", "220408", "0812345600");

for ($row=0; $row < count($students); $row++) { 
    echo "<p><b>Row number $row</b></p>";
    echo "<ul>";
    for ($col=0; $col < 3; $col++) { 
        echo "<li>". $students[$row][$col] . "</li>";
    }
    echo "</ul>";
}
echo "<br>";

// 3.5.2
echo "<table border='1'>";
echo "<tr><th>Name</th><th>NIM</th><th>Mobile</th></tr>"; // Header tabel

for ($row = 0; $row < count($students); $row++) {
    echo "<tr>";
    for ($col = 0; $col < 3; $col++) {
        echo "<td>" . $students[$row][$col] . "</td>"; 
    }
    echo "</tr>"; 
}
echo "</table>";
?>