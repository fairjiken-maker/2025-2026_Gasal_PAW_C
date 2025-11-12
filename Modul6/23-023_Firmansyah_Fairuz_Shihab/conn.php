<?php 
    $servername = "localhost";
    $hostname = "root";
    $password = "";
    $dbname = "store";

    $conn = mysqli_connect($servername, $hostname, $password, $dbname);
    if(!$conn) {
        die("Connerction Failed!!" . mysqli_connect_error());
    }
?>