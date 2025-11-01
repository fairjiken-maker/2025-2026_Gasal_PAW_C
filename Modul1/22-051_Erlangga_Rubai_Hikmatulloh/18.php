<!DOCTYPE html>
<html>
<head>
    <title>Biodata</title>
</head>
<body>
    <?php
    $nama   = "Erlangga";
    $nim    = "220411100051";
    $jurusan= "Informatika";
    $alamat = "Jl.Dukuh Setro 10/Surabaya";

    echo "<h2>Biodata Mahasiswa</h2>";
    echo "<table border='1' cellpadding='10' cellspacing='0'>";
    echo "<tr><td><b>Nama</b></td>
                <td>$nama</td></tr>";
    echo "<tr><td><b>NIM</b></td>
                <td>$nim</td></tr>";
    echo "<tr><td><b>Jurusan</b></td>
                <td>$jurusan</td></tr>";
    echo "<tr><td><b>Alamat</b></td>
                <td>$alamat</td></tr>";
    echo "</table>";
    ?>
</body>
</html>
