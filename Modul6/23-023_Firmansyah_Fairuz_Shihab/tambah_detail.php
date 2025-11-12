<?php
include 'conn.php';

$barangError = "";
$transaksi = mysqli_query($conn, "SELECT * FROM transaksi");

if (isset($_POST['transaksi_id'])) {
    $transaksi_id = $_POST['transaksi_id'];
    $barang = mysqli_query($conn, "SELECT * FROM barang WHERE id NOT IN (SELECT barang_id FROM transaksi_detail WHERE transaksi_id='$transaksi_id')");
} else {
    $barang = mysqli_query($conn, "SELECT * FROM barang");
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $transaksi_id = $_POST['transaksi_id'];
    $barang_id = $_POST['barang_id'];
    $qty = $_POST['qty'];

    $cek_barang = mysqli_query($conn, "SELECT * FROM transaksi_detail WHERE transaksi_id='$transaksi_id' AND barang_id='$barang_id'");
    if (mysqli_num_rows($cek_barang) > 0) {
        $barangError = "Barang ini sudah ada dalam transaksi.";
    } else {
        $barangData = mysqli_fetch_assoc(mysqli_query($conn, "SELECT harga FROM barang WHERE id='$barang_id'"));
        $harga_total = $barangData['harga'] * $qty;

        $query = "INSERT INTO transaksi_detail (transaksi_id, barang_id, qty, harga) VALUES ('$transaksi_id', '$barang_id', '$qty', '$harga_total')";
        if (mysqli_query($conn, $query)) {
            updateTotalTransaksi($conn, $transaksi_id);
            echo "<script>
                    alert('Detail transaksi berhasil ditambahkan.');
                    document.location.href = 'data_master.php';
                </script>";
        }
    }
}
function updateTotalTransaksi($conn, $transaksi_id)
{
    $result = mysqli_query($conn, "SELECT SUM(harga) AS total FROM transaksi_detail WHERE transaksi_id='$transaksi_id'");
    $row = mysqli_fetch_assoc($result);
    $total = $row['total'] ?? 0;
    mysqli_query($conn, "UPDATE transaksi SET total = '$total' WHERE id='$transaksi_id'");
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Detail Transaksi</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css" rel="stylesheet">

    <style>
        body {
            background-color: #f8f9fa;
        }

        .form-container {
            max-width: 600px;
            margin: 60px auto;
        }

        .error-message {
            color: red;
            font-size: 0.9em;
        }
    </style>
</head>

<body>
    <div class="container form-container">
        <div class="card shadow-lg">
            <div class="card-header bg-success text-white text-center">
                <h4 class="mb-0">Tambah Detail Transaksi</h4>
            </div>
            <div class="card-body">
                <form method="POST" novalidate>
                    <div class="mb-3">
                        <label for="transaksi_id" class="form-label fw-semibold">Pilih ID Transaksi</label>
                        <select name="transaksi_id" class="form-select" required>
                            <option value="" disabled selected>-- Pilih Transaksi --</option>
                            <?php while ($row = mysqli_fetch_assoc($transaksi)) { ?>
                                <option value="<?= $row['id'] ?>">ID Transaksi <?= $row['id'] ?></option>
                            <?php } ?>
                        </select>
                    </div>

                    <div class="mb-3">
                        <label for="barang_id" class="form-label fw-semibold">Pilih Barang</label>
                        <select name="barang_id" class="form-select" required>
                            <option value="" disabled selected>-- Pilih Barang --</option>
                            <?php while ($row = mysqli_fetch_assoc($barang)) { ?>
                                <option value="<?= $row['id'] ?>"><?= htmlspecialchars($row['nama_barang']) ?></option>
                            <?php } ?>
                        </select>
                        <?php if ($barangError): ?>
                            <div class="error-message mt-1"><?= $barangError ?></div>
                        <?php endif; ?>
                    </div>

                    <div class="mb-3">
                        <label for="qty" class="form-label fw-semibold">Quantity</label>
                        <input type="number" name="qty" class="form-control" placeholder="Masukkan jumlah barang" min="1" required>
                    </div>

                    <div class="d-grid mt-4">
                        <button type="submit" class="btn btn-success">Tambah Detail Transaksi</button>
                    </div>
                </form>
            </div>
            <div class="card-footer text-end">
                <a href="data_master.php" class="btn btn-secondary btn-sm"><i class="bi bi-arrow-left"></i> Kembali</a>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js" integrity="sha384-FKyoEForCGlyvwx9Hj09JcYn3nv7wiPVlz7YYwJrWVcXK/BmnVDxM+D2scQbITxI" crossorigin="anonymous"></script>
</body>

</html>