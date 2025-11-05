<?php
function familyName($fname, $year) {
    echo "$fname Refsnes. Born in $year <br>";
}

familyName("Hege", "1975");
familyName("Stale", "1978");
familyName("Kai Jim", "1983");

function buatProfile($nama, $umur, $kota, $pekerjaan) {
    echo "Nama: $nama, Umur: $umur, Kota: $kota, Pekerjaan: $pekerjaan<br>";
}

buatProfile("Carol", 25, "Jakarta", "Developer");
?>