<?php

function validasiEmail($email) {
    return filter_var($email, FILTER_VALIDATE_EMAIL) && preg_match("/^[a-zA-Z0-9._-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,6}$/", $email);
}


function validasiPassword($password) {
    return strlen($password) >= 8; 
}


function validasiHuruf($input) {
    return preg_match("/^[a-zA-Z\s]+$/", $input); 
}


$errorMessages = [
    'nama' => '',
    'email' => '',
    'password' => '',
    'jurusan' => ''
];


if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nama = $_POST['nama'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $jurusan = $_POST['jurusan'];

    
    if (empty($nama)) {
        $errorMessages['nama'] = "Nama harus diisi.";
    } elseif (!validasiHuruf($nama)) {
        $errorMessages['nama'] = "Nama hanya boleh mengandung huruf dan spasi.";
    }

    
    if (empty($email)) {
        $errorMessages['email'] = "Email harus diisi.";
    } elseif (!validasiEmail($email)) {
        $errorMessages['email'] = "Format email tidak valid.";
    }


    if (empty($password)) {
        $errorMessages['password'] = "Password harus diisi.";
    } elseif (!validasiPassword($password)) {
        $errorMessages['password'] = "Password harus memiliki panjang minimal 8 karakter.";
    }

    
    if (empty($jurusan)) {
        $errorMessages['jurusan'] = "Jurusan harus diisi.";
    } elseif (!validasiHuruf($jurusan)) {
        $errorMessages['jurusan'] = "Jurusan hanya boleh mengandung huruf dan spasi.";
    }

    
    if (empty(array_filter($errorMessages))) {
        echo "Data mahasiswa berhasil disimpan!";
        
    }
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Form Input Data Mahasiswa</title>
    <style>
        .error { color: red; font-size: 12px; }
    </style>
</head>
<body>
    <h2>Form Input Data Mahasiswa</h2>
    <form action="" method="POST">
        
        <label for="nama">Nama:</label>
        <input type="text" id="nama" name="nama" value="<?php echo isset($_POST['nama']) ? $_POST['nama'] : ''; ?>" required>
        <?php if (!empty($errorMessages['nama'])): ?>
            <div class="error"><?php echo $errorMessages['nama']; ?></div>
        <?php endif; ?><br><br>

        
        <label for="email">Email:</label>
        <input type="email" id="email" name="email" value="<?php echo isset($_POST['email']) ? $_POST['email'] : ''; ?>" required>
        <?php if (!empty($errorMessages['email'])): ?>
            <div class="error"><?php echo $errorMessages['email']; ?></div>
        <?php endif; ?><br><br>

        
        <label for="password">Password:</label>
        <input type="password" id="password" name="password" value="<?php echo isset($_POST['password']) ? $_POST['password'] : ''; ?>" required>
        <?php if (!empty($errorMessages['password'])): ?>
            <div class="error"><?php echo $errorMessages['password']; ?></div>
        <?php endif; ?><br><br>

        
        <label for="jurusan">Jurusan:</label>
        <input type="text" id="jurusan" name="jurusan" value="<?php echo isset($_POST['jurusan']) ? $_POST['jurusan'] : ''; ?>" required>
        <?php if (!empty($errorMessages['jurusan'])): ?>
            <div class="error"><?php echo $errorMessages['jurusan']; ?></div>
        <?php endif; ?><br><br>

        <button type="submit">Submit</button>
    </form>
</body>
</html>
