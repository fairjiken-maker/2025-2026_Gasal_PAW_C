<?php
// Nilai mahasiswa (bisa kamu ubah angkanya)
$nilai = 85;

// Tentukan grade berdasarkan nilai
if ($nilai >= 85) {
    $grade = "A";
} elseif ($nilai >= 70) {
    $grade = "B";
} elseif ($nilai >= 55) {
    $grade = "C";
} elseif ($nilai >= 40) {
    $grade = "D";
} else {
    $grade = "E";
}

// Tampilkan hasil
echo "Nilai Anda: $nilai <br>";
echo "Grade Anda: $grade";
?>
