<?php
include 'config.php';

$id = $_POST['id'];

$stmt = $conn->prepare("DELETE FROM supplier WHERE id = ?");
$stmt->bind_param("i", $id);

if ($stmt->execute()) {
    header("Location: index.php");
} else {
    echo "Gagal menghapus data.";
}

$stmt->close();
$conn->close();
?>