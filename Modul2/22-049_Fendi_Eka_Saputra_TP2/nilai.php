<!DOCTYPE html>
<html lang="id">
<body>
<h2>Masukkan Nilai Mahasiswa</h2>
<form method="POST">
    <label for="nilai">Nilai: </label>
    <input type="number" name="nilai" id="nilai" required>
    <button type="submit">Kirim</button>
</form>

<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    
    $nilai = $_POST['nilai'];

    if ($nilai >= 90) {
        $grade = "A";
    } elseif ($nilai >= 80) {
        $grade = "B";
    } elseif ($nilai >= 70) {
        $grade = "C";
    } elseif ($nilai >= 60) {
        $grade = "D";
    } else {
        $grade = "E";
    }

    
    echo "<h3>Grade yang diperoleh: $grade</h3>";
}
?>

</body>
</html>
