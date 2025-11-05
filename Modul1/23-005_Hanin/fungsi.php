<?php
function writeMsg() {
    echo "Hello world!<br>";
}

writeMsg(); // call the function

// Tanpa fungsi (repetitif):
echo "Selamat datang di website kami!<br>";
echo "Selamat datang di website kami!<br>";
echo "Selamat datang di website kami!<br>";

// Dengan fungsi (efisien):
function sambutan() {
    echo "Selamat datang di website kami!<br>";
}

sambutan();
sambutan();
sambutan();

?>