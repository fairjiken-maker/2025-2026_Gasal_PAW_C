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
        }
        table {
            margin: 20px 0;
        }
        td {
            padding: 8px;
        }
        .success {
            color: green;
            font-weight: bold;
            padding: 10px;
            background-color: #d4edda;
            border: 1px solid #c3e6cb;
            margin: 10px 0;
        }
        .error-header {
            color: red;
            font-weight: bold;
        }
    </style>
</head>
<body>
    <h2>Form Input Data Mahasiswa</h2>
    
    <?php
    $errors = array();
    
    // Cek apakah form sudah disubmit
    if (isset($_POST['nim'])) {
        // Include file validasi
        require 'validate.inc';
        
        // Lakukan validasi semua field
        validateNIM($errors, $_POST, 'nim');
        validateName($errors, $_POST, 'nama', 'Nama');
        validateGender($errors, $_POST, 'jenis_kelamin');
        validateDate($errors, $_POST, 'tanggal_lahir');
        validateAddress($errors, $_POST, 'alamat');
        
        // Cek apakah ada error
        if (empty($errors)) {
            // Data valid, tampilkan pesan sukses dan data yang diinput
            echo '<div class="success">';
            echo '<h3>Data Berhasil Disubmit!</h3>';
            echo '<p><strong>NIM:</strong> ' . htmlspecialchars($_POST['nim']) . '</p>';
            echo '<p><strong>Nama:</strong> ' . htmlspecialchars($_POST['nama']) . '</p>';
            echo '<p><strong>Jenis Kelamin:</strong> ' . ($_POST['jenis_kelamin'] == 'L' ? 'Laki-laki' : 'Perempuan') . '</p>';
            echo '<p><strong>Tanggal Lahir:</strong> ' . htmlspecialchars($_POST['tanggal_lahir']) . '</p>';
            echo '<p><strong>Alamat:</strong> ' . nl2br(htmlspecialchars($_POST['alamat'])) . '</p>';
            echo '</div>';
            
            // Reset POST untuk form kosong
            $_POST = array();
        } else {
            // Ada error, tampilkan pesan error
            echo '<div class="error-header">';
            echo '<h3>Data Tidak Valid! Perbaiki error berikut:</h3>';
            echo '<ul>';
            foreach ($errors as $field => $error) {
                echo "<li>$error</li>";
            }
            echo '</ul>';
            echo '</div>';
        }
    }
    
    // Tampilkan form
    include 'form.inc';
    ?>
    
</body>
</html>