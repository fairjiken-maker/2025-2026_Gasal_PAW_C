<!-- checkdate()
Memvalidasi apakah tanggal valid -->
<?php
$month = 12;
$day = 29;
$year = 2004;

if (checkdate($month, $day, $year)) {
    echo "Valid date!";
} else {
    echo "Invalid date!";
}