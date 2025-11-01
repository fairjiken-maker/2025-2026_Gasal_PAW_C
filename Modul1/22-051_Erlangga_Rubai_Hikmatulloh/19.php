<!DOCTYPE html>
<html>
<head>
    <title>Biodata Fleksibel</title>
</head>
<body>
    <?php
    // Ambil variabel dari query string
    $nama    = isset($_GET['nama']) ? $_GET['nama'] : "Tidak diisi";
    $nim     = isset($_GET['nim']) ? $_GET['nim'] : "Tidak diisi";
    $jurusan = isset($_GET['jurusan']) ? $_GET['jurusan'] : "Tidak diisi";
    $alamat  = isset($_GET['alamat']) ? $_GET['alamat'] : "Tidak diisi";

    echo "<h2>Biodata Mahasiswa (Fleksibel)</h2>";
    echo "<table border='1' cellpadding='5' cellspacing='0'>";
    echo "<tr><td><b>Nama</b></td><td>$nama</td></tr>";
    echo "<tr><td><b>NIM</b></td><td>$nim</td></tr>";
    echo "<tr><td><b>Jurusan</b></td><td>$jurusan</td></tr>";
    echo "<tr><td><b>Alamat</b></td><td>$alamat</td></tr>";
    echo "</table>";
    ?>
</body>
</html>
