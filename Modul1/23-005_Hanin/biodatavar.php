<?php
// Ambil data dari URL (query string)
$nama = isset($_GET['nama']) ? $_GET['nama'] : "Tidak diisi";
$nim = isset($_GET['nim']) ? $_GET['nim'] : "Tidak diisi";
$jurusan = isset($_GET['jurusan']) ? $_GET['jurusan'] : "Tidak diisi";
$semester = isset($_GET['semester']) ? $_GET['semester'] : "Tidak diisi";

// Atau pakai cara PHP 7+ (Null Coalescing Operator)
// $nama = $_GET['nama'] ?? "Tidak diisi";
?>

<!DOCTYPE html>
<html>
<head>
    <title>Biodata Mahasiswa - Fleksibel</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            max-width: 600px;
            margin: 50px auto;
            padding: 20px;
        }
        .biodata {
            background: #f9f9f9;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 2px 5px rgba(0,0,0,0.1);
        }
        .biodata h2 {
            background: #4CAF50;
            color: white;
            padding: 10px;
            margin: -20px -20px 20px -20px;
            border-radius: 8px 8px 0 0;
        }
        .item {
            margin: 10px 0;
            padding: 8px;
            border-bottom: 1px solid #ddd;
        }
        .label {
            font-weight: bold;
            color: #555;
            display: inline-block;
            width: 120px;
        }
        .form-input {
            background: white;
            padding: 20px;
            margin-top: 30px;
            border-radius: 8px;
            box-shadow: 0 2px 5px rgba(0,0,0,0.1);
        }
        input, select {
            width: 100%;
            padding: 8px;
            margin: 5px 0 15px 0;
            box-sizing: border-box;
        }
        button {
            background: #4CAF50;
            color: white;
            padding: 10px 20px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
        }
        button:hover {
            background: #45a049;
        }
    </style>
</head>
<body>

    <div class="biodata">
        <h2>BIODATA MAHASISWA</h2>
        <div class="item">
            <span class="label">Nama:</span>
            <span><?php echo htmlspecialchars($nama); ?></span>
        </div>
        <div class="item">
            <span class="label">NIM:</span>
            <span><?php echo htmlspecialchars($nim); ?></span>
        </div>
        <div class="item">
            <span class="label">Jurusan:</span>
            <span><?php echo htmlspecialchars($jurusan); ?></span>
        </div>
        <div class="item">
            <span class="label">Semester:</span>
            <span><?php echo htmlspecialchars($semester); ?></span>
        </div>
    </div>

    <div class="form-input">
        <h3>Input Biodata Baru</h3>
        <form method="GET" action="">
            <label>Nama:</label>
            <input type="text" name="nama" placeholder="Masukkan nama" required>
            
            <label>NIM:</label>
            <input type="text" name="nim" placeholder="Masukkan NIM" required>
            
            <label>Jurusan:</label>
            <select name="jurusan" required>
                <option value="">-- Pilih Jurusan --</option>
                <option value="Teknik Informatika">Teknik Informatika</option>
                <option value="Sistem Informasi">Sistem Informasi</option>
                <option value="Teknik Komputer">Teknik Komputer</option>
                <option value="Manajemen Informatika">Manajemen Informatika</option>
            </select>
            
            <label>Semester:</label>
            <input type="number" name="semester" min="1" max="14" placeholder="Masukkan semester" required>
            
            <button type="submit">Tampilkan Biodata</button>
        </form>
    </div>

</body>
</html>