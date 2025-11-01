<?php

$nilai = 90;

if ($nilai >= 85) {
    $grade = "A";
} elseif ($nilai >= 75) {
    $grade = "B";
} elseif ($nilai >= 65) {
    $grade = "C";
} elseif ($nilai >= 50) {
    $grade = "D";
} else {
    $grade = "E";
}

echo "Nilai Anda: $nilai\n";
echo "Grade Anda: $grade\n";
?>
