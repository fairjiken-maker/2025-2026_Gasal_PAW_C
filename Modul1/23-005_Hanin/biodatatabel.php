<?php
// Data biodata
$nama = "Carol Aid";
$nim = "2024001";
$jurusan = "Teknik Informatika";
$alamat = "Jl. Merdeka No. 123, Surabaya";
$email = "carol.aid@email.com";
$telp = "081234567890";
?>

<!DOCTYPE html>
<html>
<head>
    <title>Biodata Mahasiswa</title>
    <style>
        table {
            border-collapse: collapse;
            width: 500px;
            margin: 20px auto;
        }
        th {
            background-color: #4CAF50;
            color: white;
            padding: 12px;
            text-align: left;
        }
        td {
            border: 1px solid #ddd;
            padding: 10px;
        }
        tr:hover {
            background-color: #f5f5f5;
        }
    </style>
</head>
<body>
    <table>
        <tr>
            <th colspan="2">BIODATA MAHASISWA</th>
        </tr>
        <tr>
            <td width="150"><strong>Nama</strong></td>
            <td><?php echo $nama; ?></td>
        </tr>
        <tr>
            <td><strong>NIM</strong></td>
            <td><?php echo $nim; ?></td>
        </tr>
        <tr>
            <td><strong>Jurusan</strong></td>
            <td><?php echo $jurusan; ?></td>
        </tr>
        <tr>
            <td><strong>Alamat</strong></td>
            <td><?php echo $alamat; ?></td>
        </tr>
        <tr>
            <td><strong>Email</strong></td>
            <td><?php echo $email; ?></td>
        </tr>
        <tr>
            <td><strong>Telepon</strong></td>
            <td><?php echo $telp; ?></td>
        </tr>
    </table>
</body>
</html>