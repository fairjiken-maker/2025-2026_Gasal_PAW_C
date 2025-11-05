<!-- is_float()
Mengecek apakah variabel merupakan float: -->
<?php

$var = 56.34;
if (is_float($var)) {
    echo "This is a float.";
} else {
    echo "This is not a float.";
}

echo "<br>";
?>

<!-- is_int()
Mengecek apakah variabel merupakan integer: -->
<?php

$var = 123;
if (is_int($var)) {
    echo "This is an integer.";
} else {
    echo "This is not an integer.";
}

echo "<br>";
?>

<!-- is_numeric()
Mengecek apakah variabel merupakan angka (baik float atau integer): -->
<?php

$var = "12.34";
if (is_numeric($var)) {
    echo "This is numeric.";
} else {
    echo "This is not numeric.";
}


echo "<br>";
?>

<!-- is_string()
Mengecek apakah variabel merupakan string: -->
<?php

$var = "fahri";
if (is_string($var)) {
    echo "This is a string.";
} else {
    echo "This is not a string.";
}


echo "<br>";
?>