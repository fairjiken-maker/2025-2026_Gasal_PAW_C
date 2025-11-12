<?php
include 'conn.php';

$waktuTransaksiError = $keteranganError = "";
$pelanggan = mysqli_query($conn, "SELECT * FROM pelanggan");

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $waktu_transaksi = $_POST['waktu_transaksi'];
    $keterangan = $_POST['keterangan'];
    $pelanggan_id = $_POST['pelanggan_id'];
    $total = $_POST['total'];

    $valid = true;

    if (strtotime($waktu_transaksi) < strtotime(date("Y-m-d"))) {
        $waktuTransaksiError = "Tanggal transaksi tidak boleh sebelum hari ini.";
        $valid = false;
    }

    if (strlen($keterangan) < 3) {
        $keteranganError = "Keterangan minimal 3 karakter.";
        $valid = false;
    }

    if ($valid) {
        $query = "INSERT INTO transaksi (waktu_transaksi, keterangan, pelanggan_id, total) VALUES ('$waktu_transaksi', '$keterangan', '$pelanggan_id', '$total')";
        if (mysqli_query($conn, $query)) {
            echo "<script>
                    alert('Transaksi berhasil ditambahkan.');
                    document.location.href = 'data_master.php';
                </script>";
        } else {
            echo "Error: " . $query . "<br>" . mysqli_error($conn);
        }
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Transaksi</title>
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
            <div class="card-header bg-primary text-white text-center">
                <h4 class="mb-0">Tambah Data Transaksi</h4>
            </div>
            <div class="card-body">
                <form method="POST" novalidate>
                    <div class="mb-3">
                        <label for="waktu_transaksi" class="form-label fw-semibold">Waktu Transaksi</label>
                        <input type="date" class="form-control <?= !empty($waktuTransaksiError) ? 'is-invalid' : '' ?>"
                            name="waktu_transaksi" required>
                        <?php if ($waktuTransaksiError): ?>
                            <div class="invalid-feedback"><?= $waktuTransaksiError ?></div>
                        <?php endif; ?>
                    </div>

                    <div class="mb-3">
                        <label for="keterangan" class="form-label fw-semibold">Keterangan</label>
                        <textarea class="form-control <?= !empty($keteranganError) ? 'is-invalid' : '' ?>"
                            name="keterangan" rows="3" placeholder="Masukkan keterangan transaksi" required></textarea>
                        <?php if ($keteranganError): ?>
                            <div class="invalid-feedback"><?= $keteranganError ?></div>
                        <?php endif; ?>
                    </div>

                    <div class="mb-3">
                        <label for="total" class="form-label fw-semibold">Total</label>
                        <div class="input-group">
                            <span class="input-group-text">Rp</span>
                            <input type="number" class="form-control" name="total" id="total" value="0" min="0">
                        </div>
                    </div>

                    <div class="mb-3">
                        <label for="pelanggan_id" class="form-label fw-semibold">Pelanggan</label>
                        <select name="pelanggan_id" class="form-select" required>
                            <?php while ($row = mysqli_fetch_assoc($pelanggan)) { ?>
                                <option value="<?= $row['id'] ?>"><?= htmlspecialchars($row['nama']) ?></option>
                            <?php } ?>
                        </select>
                    </div>

                    <div class="d-grid mt-4">
                        <button type="submit" class="btn btn-primary">Tambah Transaksi</button>
                    </div>
                </form>
            </div>
            <div class="card-footer text-end">
                <a href="data_master.php" class="btn btn-secondary btn-sm">
                    <i class="bi bi-arrow-left"></i> Kembali
                </a>
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js" integrity="sha384-FKyoEForCGlyvwx9Hj09JcYn3nv7wiPVlz7YYwJrWVcXK/BmnVDxM+D2scQbITxI" crossorigin="anonymous"></script>
</body>
</html>