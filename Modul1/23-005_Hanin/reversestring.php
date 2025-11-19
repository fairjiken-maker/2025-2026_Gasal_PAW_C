<?php
echo strrev("Hello world!") . "<br>"; // outputs !dlrow olleH

// Cek palindrome (dengan spasi dihitung juga)
$kata = "kasur rusak";
if($kata == strrev($kata)) {
    echo "Ini palindrome!<br>";
} else {
    echo "Bukan palindrome!<br>";
}
?>