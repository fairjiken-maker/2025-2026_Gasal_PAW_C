<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sistem Grade Nilai Mahasiswa</title>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }
        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            min-height: 100vh;
            display: flex;
            justify-content: center;
            align-items: center;
            padding: 20px;
        }
        .container {
            background: white;
            padding: 40px;
            border-radius: 20px;
            box-shadow: 0 20px 60px rgba(0,0,0,0.3);
            max-width: 500px;
            width: 100%;
        }
        h2 {
            text-align: center;
            color: #333;
            margin-bottom: 30px;
            font-size: 28px;
        }
        .form-group {
            margin-bottom: 20px;
        }
        label {
            display: block;
            margin-bottom: 8px;
            color: #555;
            font-weight: 600;
        }
        input {
            width: 100%;
            padding: 12px;
            border: 2px solid #ddd;
            border-radius: 8px;
            font-size: 16px;
            transition: border 0.3s;
        }
        input:focus {
            outline: none;
            border-color: #667eea;
        }
        button {
            width: 100%;
            padding: 15px;
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            color: white;
            border: none;
            border-radius: 8px;
            font-size: 18px;
            font-weight: bold;
            cursor: pointer;
            transition: transform 0.2s;
        }
        button:hover {
            transform: translateY(-2px);
        }
        .result {
            margin-top: 30px;
            padding: 25px;
            border-radius: 15px;
            text-align: center;
            animation: fadeIn 0.5s;
        }
        @keyframes fadeIn {
            from { opacity: 0; transform: translateY(20px); }
            to { opacity: 1; transform: translateY(0); }
        }
        .result h3 {
            margin-bottom: 20px;
            font-size: 24px;
        }
        .result p {
            margin: 10px 0;
            font-size: 16px;
        }
        .grade-display {
            font-size: 72px;
            font-weight: bold;
            margin: 20px 0;
            text-shadow: 2px 2px 4px rgba(0,0,0,0.2);
        }
        .grade-A { background: linear-gradient(135deg, #11998e 0%, #38ef7d 100%); color: white; }
        .grade-B { background: linear-gradient(135deg, #4facfe 0%, #00f2fe 100%); color: white; }
        .grade-C { background: linear-gradient(135deg, #fa709a 0%, #fee140 100%); color: white; }
        .grade-D { background: linear-gradient(135deg, #fc6c8f 0%, #f68084 100%); color: white; }
        .grade-E { background: linear-gradient(135deg, #f093fb 0%, #f5576c 100%); color: white; }
    </style>
</head>
<body>
    <div class="container">
        <h2>📚 Sistem Grade Nilai Mahasiswa</h2>
        
        <form method="POST" action="">
            <div class="form-group">
                <label>👤 Nama Mahasiswa:</label>
                <input type="text" name="nama" required placeholder="Masukkan nama lengkap">
            </div>
            
            <div class="form-group">
                <label>🎓 NIM:</label>
                <input type="text" name="nim" required placeholder="Masukkan NIM">
            </div>
            
            <div class="form-group">
                <label>📊 Nilai (0-100):</label>
                <input type="number" name="nilai" min="0" max="100" required placeholder="Masukkan nilai">
            </div>
            
            <button type="submit" name="submit">🔍 Cek Grade</button>
        </form>

        <?php
        // TUGAS 9: Modifikasi percabangan untuk grade nilai mahasiswa
        
        if (isset($_POST['submit'])) {
            // Input: Ambil data dari form
            $nama = htmlspecialchars($_POST['nama']);
            $nim = htmlspecialchars($_POST['nim']);
            $nilai = $_POST['nilai'];

            // Proses: Tentukan grade menggunakan if...elseif...else
            if ($nilai >= 85 && $nilai <= 100) {
                $grade = "A";
                $predikat = "Sangat Baik";
                $keterangan = "Luar biasa! Pertahankan prestasi gemilang ini! 🌟";
                $cssClass = "grade-A";
            } elseif ($nilai >= 70 && $nilai < 85) {
                $grade = "B";
                $predikat = "Baik";
                $keterangan = "Bagus sekali! Tingkatkan sedikit lagi! 💪";
                $cssClass = "grade-B";
            } elseif ($nilai >= 60 && $nilai < 70) {
                $grade = "C";
                $predikat = "Cukup";
                $keterangan = "Cukup baik, masih bisa lebih baik lagi! 📈";
                $cssClass = "grade-C";
            } elseif ($nilai >= 50 && $nilai < 60) {
                $grade = "D";
                $predikat = "Kurang";
                $keterangan = "Perlu belajar lebih giat lagi! 📚";
                $cssClass = "grade-D";
            } else {
                $grade = "E";
                $predikat = "Sangat Kurang";
                $keterangan = "Harus mengulang mata kuliah ini! 🔄";
                $cssClass = "grade-E";
            }
            
            // OUTPUT: Tampilkan hasil
            echo "<div class='result $cssClass'>";
            echo "<h3>📋 Hasil Penilaian</h3>";
            echo "<p><strong>Nama:</strong> $nama</p>";
            echo "<p><strong>NIM:</strong> $nim</p>";
            echo "<p><strong>Nilai:</strong> $nilai</p>";
            echo "<div class='grade-display'>$grade</div>";
            echo "<p style='font-size: 20px; font-weight: bold;'>$predikat</p>";
            echo "<p style='margin-top: 15px;'>$keterangan</p>";
            echo "</div>";
        }
        ?>
    </div>
</body>
</html>