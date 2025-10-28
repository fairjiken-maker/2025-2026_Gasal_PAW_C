<?php
// Inisialisasi variabel
$nama = $email = $password = "";
$errors = [];

// Saat tombol submit ditekan
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Ambil data input dan hilangkan spasi
    $nama = trim($_POST["nama"]);
    $email = trim($_POST["email"]);
    $password = $_POST["password"];

    // Validasi Nama (tidak boleh kosong)
    if (empty($nama)) {
        $errors['nama'] = "Nama harus diisi.";
    }

    // Validasi Email (regex sederhana)
    if (empty($email)) {
        $errors['email'] = "Email harus diisi.";
    } elseif (!preg_match("/^[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-z]{2,}$/", $email)) {
        $errors['email'] = "Format email tidak valid.";
    }

    // Validasi Password (minimal 8 karakter)
    if (empty($password)) {
        $errors['password'] = "Password harus diisi.";
    } elseif (strlen($password) < 8) {
        $errors['password'] = "Password minimal 8 karakter.";
    }

    // Jika tidak ada error, tampilkan hasil
    if (empty($errors)) {
        echo "<h3>Data Mahasiswa Berhasil Diterima:</h3>";
        echo "Nama: " . htmlspecialchars($nama) . "<br>";
        echo "Email: " . htmlspecialchars($email) . "<br>";
        echo "Password: " . str_repeat("*", strlen($password)) . "<br>"; // jangan tampilkan password asli
        exit;
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Form Input Data Mahasiswa</title>
</head>
<body>
    <h2>Form Input Data Mahasiswa</h2>
    <form method="post" action="">
        <label>Nama:</label><br>
        <input type="text" name="nama" value="<?php echo htmlspecialchars($nama); ?>"><br>
        <span style="color:red;"><?php echo $errors['nama'] ?? ''; ?></span><br>

        <label>Email:</label><br>
        <input type="text" name="email" value="<?php echo htmlspecialchars($email); ?>"><br>
        <span style="color:red;"><?php echo $errors['email'] ?? ''; ?></span><br>

        <label>Password:</label><br>
        <input type="password" name="password"><br>
        <span style="color:red;"><?php echo $errors['password'] ?? ''; ?></span><br><br>

        <input type="submit" value="Kirim">
    </form>
</body>
</html>
