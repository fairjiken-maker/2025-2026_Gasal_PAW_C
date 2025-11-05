<!-- filter_var()
Memvalidasi apakah string merupakan email: -->
<?php
$email = "example@example.com";
if (filter_var($email, FILTER_VALIDATE_EMAIL)) {
    echo "Valid email!";
} else {
    echo "Invalid email!";
}
echo "<br>";


?>

<!-- filter_input()
Digunakan untuk memfilter dan mengambil input dari berbagai sumber (misalnya, GET, POST). -->
<?php
$email = filter_input(INPUT_POST, 'email', FILTER_VALIDATE_EMAIL);
if ($email) {
    echo "Valid email!";
} else {
    echo "Invalid email!";
}
echo "<br>";
?>

<!-- FILTER_VALIDATE_URL
Memvalidasi URL: -->
<?php
$url = "https://www.example.com";
if (filter_var($url, FILTER_VALIDATE_URL)) {
    echo "Valid URL!";
} else {
    echo "Invalid URL!";
}
echo "<br>";

?>

<!-- FILTER_VALIDATE_FLOAT
Memvalidasi apakah nilai merupakan float: -->
<?php
$price = "12.34";
if (filter_var($price, FILTER_VALIDATE_FLOAT)) {
    echo "Valid float!";
} else {
    echo "Invalid float!";
}
echo "<br>";

?>

<!-- FILTER_VALIDATE_IP
Memvalidasi apakah string merupakan IP: -->
<?php
$ip = "127.0.0.1";
if (filter_var($ip, FILTER_VALIDATE_IP)) {
    echo "Valid IP!";
} else {
    echo "Invalid IP!";
}

echo "<br>";

?>

<!--FILTER_VALIDATE_EMAIL  Fungsi ini memastikan bahwa format email yang diberikan sesuai dengan standar yang diterima secara umum.  -->
<?php
$email = "example@example.com"; 

if (filter_var($email, FILTER_VALIDATE_EMAIL)) {
    echo "Email '$email' adalah alamat email yang valid.";
} else {
    echo "Email '$email' tidak valid.";
}


echo "<br>";

?>