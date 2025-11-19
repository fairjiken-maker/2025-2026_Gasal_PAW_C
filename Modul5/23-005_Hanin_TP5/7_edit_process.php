<?php
include 'config.php';

$id = $_POST['id'];
$nama = $_POST['nama'];
$telepon = $_POST['telepon'];
$alamat = $_POST['alamat'];

$sql = "UPDATE supplier SET nama = ?, telepon = ?, alamat = ? WHERE id = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("sssi", $nama, $telepon, $alamat, $id);

if ($stmt->execute()) {
    header("Location: index.php");
} else {
    echo "Gagal mengupdate data.";
}

$stmt->close();
$conn->close();
?>