<!-- Fungsi regular expression digunakan untuk mencocokkan pola tertentu dalam string. Fungsi yang umum digunakan adalah preg_match. -->
<?php

$pattern = "/^[a-zA-Z]+$/";
$string = "HelloWorld";

if (preg_match($pattern, $string)) {
    echo "Valid string!";
} else {
    echo "Invalid string!";
}
?>