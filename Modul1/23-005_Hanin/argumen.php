<?php
function familyName($fname) {
    echo "$fname Refsnes.<br>";
}

familyName("Jani");
familyName("Hege");
familyName("Stale");
familyName("Kai Jim");
familyName("Borge");

function hitungLuas($panjang, $lebar) {
    $luas = $panjang * $lebar;
    echo "Luas: $luas cm²<br>";
}

hitungLuas(10, 5);  // Luas: 50 cm²
hitungLuas(7, 3);   // Luas: 21 cm²

?>