<?php
$errors = array();

// Cek apakah form sudah disubmit
if (isset($_POST['nim'])) {
    // Include file validasi
    require_once 'validate.inc';
    
    // Lakukan validasi semua field
    validateNIM($errors, $_POST, 'nim');
    validateName($errors, $_POST, 'nama', 'Nama');
    validateEmail($errors, $_POST, 'email');
    validatePassword($errors, $_POST, 'password');
    
    // Validasi konfirmasi password hanya jika password sudah valid
    if (!isset($errors['password'])) {
        validatePasswordConfirm($errors, $_POST, 'password', 'confirm_password');
    }
    
    validateGender($errors, $_POST, 'jenis_kelamin');
    validateDate($errors, $_POST, 'tanggal_lahir');
    validatePhone($errors, $_POST, 'telepon');
    validateJurusan($errors, $_POST, 'jurusan');
    validateAddress($errors, $_POST, 'alamat');
}
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Form Input Data Mahasiswa</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 50px;
            background-color: #f5f5f5;
        }
        .container {
            background-color: white;
            padding: 30px;
            border-radius: 8px;
            box-shadow: 0 2px 4px rgba(0,0,0,0.1);
            max-width: 700px;
            margin: 0 auto;
        }
        h2 {
            color: #333;
            border-bottom: 3px solid #4CAF50;
            padding-bottom: 10px;
        }
        table {
            margin: 20px 0;
            width: 100%;
        }
        td {
            padding: 10px 5px;
        }
        input[type="text"], input[type="password"], input[type="date"], select, textarea {
            padding: 8px;
            border: 1px solid #ddd;
            border-radius: 4px;
        }
        input[type="submit"], input[type="reset"] {
            padding: 10px 30px;
            margin: 5px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            font-size: 14px;
        }
        input[type="submit"] {
            background-color: #4CAF50;
            color: white;
        }
        input[type="submit"]:hover {
            background-color: #45a049;
        }
        input[type="reset"] {
            background-color: #f44336;
            color: white;
        }
        input[type="reset"]:hover {
            background-color: #da190b;
        }
        .success {
            color: #155724;
            background-color: #d4edda;
            border: 1px solid #c3e6cb;
            padding: 15px;
            border-radius: 4px;
            margin: 20px 0;
        }
        .success h3 {
            margin-top: 0;
            color: #155724;
        }
        .error-header {
            color: #721c24;
            background-color: #f8d7da;
            border: 1px solid #f5c6cb;
            padding: 15px;
            border-radius: 4px;
            margin: 20px 0;
        }
        .error-header h3 {
            margin-top: 0;
            color: #721c24;
        }
        .error-header ul {
            margin: 10px 0;
            padding-left: 20px;
        }
        small {
            font-size: 11px;
        }
    </style>
</head>
<body>
    <div class="container">
        <h2>Form Input Data Mahasiswa</h2>
        <p style="color: #666;">Silakan isi semua field dengan data yang valid</p>
        
        <?php
        // Cek apakah ada error atau sukses
        if (isset($_POST['nim'])) {
            if (empty($errors)) {
                // Data valid
                echo '<div class="success">';
                echo '<h3>✓ Data Berhasil Disubmit!</h3>';
                echo '<table border="0">';
                echo '<tr><td width="150"><strong>NIM</strong></td><td>: ' . htmlspecialchars($_POST['nim']) . '</td></tr>';
                echo '<tr><td><strong>Nama</strong></td><td>: ' . htmlspecialchars($_POST['nama']) . '</td></tr>';
                echo '<tr><td><strong>Email</strong></td><td>: ' . htmlspecialchars($_POST['email']) . '</td></tr>';
                echo '<tr><td><strong>Jenis Kelamin</strong></td><td>: ' . ($_POST['jenis_kelamin'] == 'L' ? 'Laki-laki' : 'Perempuan') . '</td></tr>';
                echo '<tr><td><strong>Tanggal Lahir</strong></td><td>: ' . htmlspecialchars($_POST['tanggal_lahir']) . '</td></tr>';
                echo '<tr><td><strong>Nomor Telepon</strong></td><td>: ' . htmlspecialchars($_POST['telepon']) . '</td></tr>';
                echo '<tr><td><strong>Jurusan</strong></td><td>: ' . htmlspecialchars($_POST['jurusan']) . '</td></tr>';
                echo '<tr><td valign="top"><strong>Alamat</strong></td><td>: ' . nl2br(htmlspecialchars($_POST['alamat'])) . '</td></tr>';
                echo '</table>';
                echo '</div>';
                
                // Reset POST
                $_POST = array();
            } else {
                // Ada error
                echo '<div class="error-header">';
                echo '<h3>✗ Data Tidak Valid!</h3>';
                echo '<p>Perbaiki error berikut:</p>';
                echo '<ul>';
                foreach ($errors as $field => $error) {
                    echo "<li><strong>$error</strong></li>";
                }
                echo '</ul>';
                echo '</div>';
            }
        }
        
        // Include form
        include 'form.inc';
        ?>
        
    </div>
</body>
</html>