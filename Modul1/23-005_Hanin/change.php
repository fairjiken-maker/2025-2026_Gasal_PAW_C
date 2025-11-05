<?php
echo str_replace("world", "Dolly", "Hello world!") . "<br>"; // outputs Hello Dolly!

$text = "Hello World!";

// Case sensitive:
echo str_replace("world", "PHP", $text) . "<br>"; // Hello World! (tidak berubah)
echo str_replace("World", "PHP", $text) . "<br>"; // Hello PHP! (berubah)

// Case insensitive:
echo str_ireplace("world", "PHP", $text) . "<br>"; // Hello PHP!
?>
