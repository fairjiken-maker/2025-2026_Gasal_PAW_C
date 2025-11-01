<?php
$nama   = isset($_GET['nama']) ? $_GET['nama'] : "Wahyu Ifandi";
$nim    = isset($_GET['nim']) ? $_GET['nim'] : "220411100187";
$kelas  = isset($_GET['kelas']) ? $_GET['kelas'] : "Paw C";
$alamat = isset($_GET['alamat']) ? $_GET['alamat'] : "Kualalumpur Utara";
?>

<!DOCTYPE html>
<html>
<body>
    <h2>Biodata (Fleksibel)</h2>
    <table border="1" cellpadding="8">
        <tr><th>Nama</th><td><?php echo $nama; ?></td></tr>
        <tr><th>NIM</th><td><?php echo $nim; ?></td></tr>
        <tr><th>Kelas</th><td><?php echo $kelas; ?></td></tr>
        <tr><th>Alamat</th><td><?php echo $alamat; ?></td></tr>
    </table>
</body>
</html>
