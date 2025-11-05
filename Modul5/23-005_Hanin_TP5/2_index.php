<?php
include 'config.php';
$sql = "SELECT * FROM supplier ORDER BY id";
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Data Master Supplier</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 20px;
            background-color: #f9f9f9;
        }
        h2 {
            color: #333;
        }
        .btn-tambah {
            background-color: #2E8B57;
            color: white;
            padding: 8px 16px;
            text-decoration: none;
            border-radius: 4px;
            font-weight: bold;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 10px;
            box-shadow: 0 0 10px rgba(0,0,0,0.1);
        }
        th {
            background-color: #e6f2ff;
            padding: 10px;
            text-align: left;
            border: 1px solid #ccc;
        }
        td {
            padding: 10px;
            border: 1px solid #ccc;
        }
        .btn-edit {
            background-color: #FF8C00;
            color: white;
            padding: 5px 10px;
            text-decoration: none;
            border-radius: 3px;
            font-size: 12px;
            display: inline-block;
            margin-right: 5px;
        }
        .btn-hapus {
            background-color: #DC143C;
            color: white;
            padding: 5px 10px;
            text-decoration: none;
            border-radius: 3px;
            font-size: 12px;
            display: inline-block;
        }
    </style>
</head>
<body>
    <h2>Data Master Supplier</h2>
    <a href="add.php" class="btn-tambah">Tambah Data</a>

    <table>
        <thead>
            <tr>
                <th>No</th>
                <th>Nama</th>
                <th>Telp</th>
                <th>Alamat</th>
                <th>Tindakan</th>
            </tr>
        </thead>
        <tbody>
            <?php if ($result->num_rows > 0): ?>
                <?php $no = 1; while ($row = $result->fetch_assoc()): ?>
                <tr>
                    <td><?= $no++ ?></td>
                    <td><?= htmlspecialchars($row['nama']) ?></td>
                    <td><?= htmlspecialchars($row['telepon']) ?></td>
                    <td><?= htmlspecialchars($row['alamat']) ?></td>
                    <td>
                        <a href="edit.php?id=<?= $row['id'] ?>" class="btn-edit">Edit</a>
                        <a href="remove.php" onclick="if(confirm('Anda yakin akan menghapus supplier ini?')) window.location='proses_hapus.php?id=<?= $row['id'] ?>';" class="btn-hapus">Hapus</a>
                    </td>
                </tr>
                <?php endwhile; ?>
            <?php else: ?>
                <tr><td colspan="5" align="center">Tidak ada data</td></tr>
            <?php endif; ?>
        </tbody>
    </table>
</body>
</html>