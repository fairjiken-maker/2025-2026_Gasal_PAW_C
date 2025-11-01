<?php
include 'koneksi.php';

// Ambil semua data supplier
$result = mysqli_query($conn, "SELECT * FROM supplier");
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Data Master Supplier</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
</head>
<body class="p-4">

<div class="container">
    <h3>Data Master Supplier</h3>
    <a href="tambah.php" class="btn btn-success mb-3">Tambah Data</a>

    <table class="table table-bordered table-striped">
        <thead class="table-dark">
            <tr>
                <th>No</th>
                <th>Nama</th>
                <th>Telp</th>
                <th>Alamat</th>
                <th>Tindakan</th>
            </tr>
        </thead>
        <tbody>
        <?php
        $no = 1;
        while ($row = mysqli_fetch_assoc($result)) {
            echo "<tr>
                <td>$no</td>
                <td>{$row['nama']}</td>
                <td>{$row['telp']}</td>
                <td>{$row['alamat']}</td>
                <td>
                    <a href='edit.php?id={$row['id']}' class='btn btn-warning btn-sm'>Edit</a>
                    <a href='hapus.php?id={$row['id']}' class='btn btn-danger btn-sm'
                       onclick='return confirm(\"Anda yakin akan menghapus supplier ini?\")'>Hapus</a>
                </td>
            </tr>";
            $no++;
        }
        ?>
        </tbody>
    </table>
</div>

</body>
</html>
