<?php
include 'config.php';

$nama = $_POST['nama'];
$telepon = $_POST['telepon'];
$alamat = $_POST['alamat'];

$sql = "INSERT INTO supplier (nama, telepon, alamat) VALUES (?, ?, ?)";
$stmt = $conn->prepare($sql);
$stmt->bind_param("sss", $nama, $telepon, $alamat);

if ($stmt->execute()) {
    header("Location: index.php");
} else {
    echo "Gagal menyimpan data.";
}

$stmt->close();
$conn->close();
?>