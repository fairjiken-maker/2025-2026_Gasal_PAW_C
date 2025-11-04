<?php
include 'koneksi.php';

$id = $_GET['id'];
$sql = "SELECT * FROM supplier WHERE id=$id";
$result = $conn->query($sql);
$row = $result->fetch_assoc();

$errors = []; 
$nama = $row['nama'];
$telp = $row['telp'];
$alamat = $row['alamat'];

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nama = $_POST['nama'];
    $telp = $_POST['telp'];
    $alamat = $_POST['alamat'];

    
    if (empty($nama)) {
        $errors['nama'] = "Nama tidak boleh kosong.";
    } elseif (!preg_match("/^[a-zA-Z\s]+$/", $nama)) {
        $errors['nama'] = "Nama hanya boleh mengandung huruf dan spasi.";
    }

    
    if (empty($telp)) {
        $errors['telp'] = "Telp tidak boleh kosong.";
    } elseif (!preg_match("/^[0-9]+$/", $telp)) {
        $errors['telp'] = "Telp hanya boleh mengandung angka.";
    }

    
    if (empty($alamat)) {
        $errors['alamat'] = "Alamat tidak boleh kosong.";
    } elseif (!preg_match("/^(?=.*[a-zA-Z])(?=.*[0-9])[a-zA-Z0-9\s]+$/", $alamat)) {
        $errors['alamat'] = "Alamat harus mengandung minimal satu huruf dan satu angka, dan hanya boleh alfanumerik.";
    }

    
    if (count($errors) === 0) {
        $sql = "UPDATE supplier SET nama='$nama', telp='$telp', alamat='$alamat' WHERE id=$id";
        if ($conn->query($sql) === TRUE) {
            header('Location: index.php');
            exit();
        } else {
            echo "Error: " . $conn->error;
        }
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Data Supplier</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f0f4f8;
            display: flex;
            justify-content: center;
            align-items: center;
            min-height: 100vh;
            margin: 0;
        }

        .container {
            background-color: #ffffff;
            padding: 20px 30px;
            border-radius: 8px;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
            width: 100%;
            max-width: 500px;
        }

        h2 {
            text-align: center;
            color: #333;
            margin-bottom: 20px;
        }

        .form-group {
            margin-bottom: 15px;
        }

        .form-group label {
            display: block;
            font-weight: bold;
            color: #555;
            margin-bottom: 5px;
        }

        .form-group input[type="text"] {
            width: 100%;
            padding: 10px;
            font-size: 1em;
            border: 1px solid #ccc;
            border-radius: 5px;
            outline: none;
            box-sizing: border-box;
            transition: border-color 0.3s;
        }

        .form-group input[type="text"]:focus {
            border-color: #4CAF50;
        }

        .error {
            color: red;
            font-size: 0.9em;
            margin-top: 5px;
        }

        .btn {
            display: inline-block;
            padding: 10px 20px;
            font-size: 1em;
            color: #fff;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            text-decoration: none;
            margin-right: 10px;
            transition: background-color 0.3s;
        }

        .btn-success {
            background-color: #4CAF50;
        }

        .btn-success:hover {
            background-color: #45a049;
        }

        .btn-secondary {
            background-color: #555;
        }

        .btn-secondary:hover {
            background-color: #444;
        }

        .btn-container {
            text-align: center;
            margin-top: 20px;
        }
    </style>
</head>
<body>
    <div class="container">
        <h2>Edit Data Supplier</h2>
        <form method="POST" action="">
            <div class="form-group">
                <label>Nama:</label>
                <input type="text" name="nama" value="<?php echo htmlspecialchars($nama); ?>" required>
                <?php if (isset($errors['nama'])): ?>
                    <div class="error"><?php echo $errors['nama']; ?></div>
                <?php endif; ?>
            </div>

            <div class="form-group">
                <label>Telp:</label>
                <input type="text" name="telp" value="<?php echo htmlspecialchars($telp); ?>" required>
                <?php if (isset($errors['telp'])): ?>
                    <div class="error"><?php echo $errors['telp']; ?></div>
                <?php endif; ?>
            </div>

            <div class="form-group">
                <label>Alamat:</label>
                <input type="text" name="alamat" value="<?php echo htmlspecialchars($alamat); ?>" required>
                <?php if (isset($errors['alamat'])): ?>
                    <div class="error"><?php echo $errors['alamat']; ?></div>
                <?php endif; ?>
            </div>

            <div class="btn-container">
                <button type="submit" class="btn btn-success">Update</button>
                <a href="index.php" class="btn btn-secondary">Kembali</a>
            </div>
        </form>
    </div>
</body>
</html>

<?php
$conn->close();
?>
