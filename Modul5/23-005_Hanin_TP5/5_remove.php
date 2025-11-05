<?php
include 'config.php';
$id = $_GET['id'];

$stmt = $conn->prepare("SELECT nama FROM supplier WHERE id = ?");
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
    <title>Konfirmasi Hapus</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 20px;
            background-color: #f9f9f9;
        }
        h2 {
            color: #333;
        }
        .popup {
            background: white;
            padding: 20px;
            border: 1px solid #ccc;
            box-shadow: 0 0 10px rgba(0,0,0,0.1);
            max-width: 400px;
            margin: 0 auto;
        }
        .btn-ok {
            background-color: #2E8B57;
            color: white;
            padding: 8px 16px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            font-weight: bold;
        }
        .btn-cancel {
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
    <div class="popup">
        <h2>Konfirmasi Hapus</h2>
        <p>Anda yakin ingin menghapus supplier: <strong><?= htmlspecialchars($row['nama']) ?></strong>?</p>
        
        <form action="remove_process.php" method="POST">
            <input type="hidden" name="id" value="<?= $id ?>">
            <button type="submit" class="btn-ok">OK</button>
            <a href="index.php" class="btn-cancel">Cancel</a>
        </form>
    </div>
</body>
</html>