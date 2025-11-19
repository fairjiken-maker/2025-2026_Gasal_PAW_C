<?php
include 'config.php';
$id = $_GET['id'];

$stmt = $conn->prepare("SELECT * FROM supplier WHERE id = ?");
$stmt->bind_param("i", $id);
$stmt->execute();
$result = $stmt->get_result();
$row = $result->fetch_assoc();

if (!$row) {
    die("Data tidak ditemukan.");
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Edit Data Master Supplier</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 20px;
            background-color: #f9f9f9;
        }
        h2 {
            color: #333;
        }
        .form-group {
            margin-bottom: 15px;
        }
        label {
            display: block;
            margin-bottom: 5px;
            font-weight: bold;
        }
        input[type="text"], textarea {
            width: 100%;
            padding: 8px;
            border: 1px solid #ccc;
            border-radius: 4px;
            box-sizing: border-box;
        }
        .btn-update {
            background-color: #2E8B57;
            color: white;
            padding: 8px 16px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            font-weight: bold;
        }
        .btn-batal {
            background-color: #DC143C;
            color: white;
            padding: 8px 16px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            font-weight: bold;
            text-decoration: none;
            display: inline-block;
            margin-left: 10px;
        }
    </style>
</head>
<body>
    <h2>Edit Data Master Supplier</h2>
    <form action="edit_process.php" method="POST">
        <input type="hidden" name="id" value="<?= $row['id'] ?>">
        <div class="form-group">
            <label>Nama:</label>
            <input type="text" name="nama" value="<?= htmlspecialchars($row['nama']) ?>" required>
        </div>
        <div class="form-group">
            <label>Telp:</label>
            <input type="text" name="telepon" value="<?= htmlspecialchars($row['telepon']) ?>">
        </div>
        <div class="form-group">
            <label>Alamat:</label>
            <textarea name="alamat"><?= htmlspecialchars($row['alamat']) ?></textarea>
        </div>
        <button type="submit" class="btn-update">Update</button>
        <a href="index.php" class="btn-batal">Batal</a>
    </form>
</body>
</html>