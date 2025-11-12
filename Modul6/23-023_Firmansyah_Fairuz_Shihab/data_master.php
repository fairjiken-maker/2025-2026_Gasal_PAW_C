<?php
include 'conn.php';

$status = "";
if (isset($_GET['barang_id'])) {
    $barang_id = $_GET['barang_id'];

    $cek = mysqli_query($conn, "SELECT * FROM transaksi_detail WHERE barang_id = '$barang_id'");
    if (mysqli_num_rows($cek) > 0) {
        $status = "used";
    } else {
        $hapus = mysqli_query($conn, "DELETE FROM barang WHERE id = '$barang_id'");
        $status = $hapus ? "success" : "error";
    }
}

$barang = mysqli_query($conn, "SELECT barang.*, supplier.id as id_supplier, supplier.nama as nama_supplier FROM barang CROSS JOIN supplier ON barang.id_supplier = supplier.id");
$transaksi = mysqli_query($conn, "SELECT transaksi.*, pelanggan.nama AS nama_pelanggan FROM transaksi LEFT JOIN pelanggan ON transaksi.pelanggan_id = pelanggan.id");
$transaksi_detail = mysqli_query($conn, "SELECT transaksi_detail.*, barang.nama_barang FROM transaksi_detail LEFT JOIN barang ON transaksi_detail.barang_id = barang.id");
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data Master</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">
    <script>
        function confirmDelete(barang_id) {
            if (confirm("Anda yakin ingin menghapus barang ini?")) {
                window.location.href = 'data_master.php?barang_id=' + barang_id;
            }
        }
    </script>
</head>

<body class="bg-light">
    <div class="container py-4">

        <?php if ($status): ?>
            <div class="alert 
                <?= $status === 'success' ? 'alert-success' : ($status === 'used' ? 'alert-warning' : 'alert-danger') ?>text-center shadow-sm">
                <?php if ($status === 'success'): ?>
                    Barang berhasil dihapus.
                <?php elseif ($status === 'used'): ?>
                    Barang tidak bisa dihapus karena masih digunakan dalam transaksi.
                <?php elseif ($status === 'error'): ?>
                    Terjadi kesalahan saat menghapus barang.
                <?php endif; ?>
            </div>
        <?php endif; ?>

        <div class="text-center mb-4">
            <h2 class="fw-bold text-primary">Pengelolaan Master Detail</h2>
        </div>

        <div class="card mb-4 shadow-sm">
            <div class="card-header bg-primary text-white">
                <h5 class="mb-0">Data Barang</h5>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered table-hover align-middle">
                        <thead class="table-light text-center">
                            <tr>
                                <th>ID Supplier</th>
                                <th>Kode Barang</th>
                                <th>Nama Barang</th>
                                <th>Harga</th>
                                <th>Stok</th>
                                <th>Nama Supplier</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php while ($row = mysqli_fetch_assoc($barang)) { ?>
                                <tr>
                                    <td><?= $row['id_supplier'] ?></td>
                                    <td><?= htmlspecialchars($row['kode_barang']) ?></td>
                                    <td><?= htmlspecialchars($row['nama_barang']) ?></td>
                                    <td>Rp <?= number_format($row['harga'], 0, ',', '.') ?></td>
                                    <td><?= $row['stok'] ?></td>
                                    <td><?= $row['nama_supplier'] ?? '-' ?></td>
                                    <td class="text-center">
                                        <button class="btn btn-sm btn-danger" onclick="return confirmDelete(<?= $row['id'] ?>)">Hapus</button>
                                    </td>
                                </tr>
                            <?php } ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-md-6 mb-4">
                <div class="card shadow-sm">
                    <div class="card-header bg-success text-white">
                        <h5 class="mb-0">Data Transaksi</h5>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-bordered table-hover align-middle">
                                <thead class="table-light text-center">
                                    <tr>
                                        <th>ID</th>
                                        <th>Waktu</th>
                                        <th>Keterangan</th>
                                        <th>Total</th>
                                        <th>Pelanggan</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php while ($row = mysqli_fetch_assoc($transaksi)) { ?>
                                        <tr>
                                            <td><?= $row['id'] ?></td>
                                            <td><?= htmlspecialchars($row['waktu_transaksi']) ?></td>
                                            <td><?= htmlspecialchars($row['keterangan']) ?></td>
                                            <td>Rp <?= number_format($row['total'], 0, ',', '.') ?></td>
                                            <td><?= $row['nama_pelanggan'] ?? '-' ?></td>
                                        </tr>
                                    <?php } ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-md-6 mb-4">
                <div class="card shadow-sm">
                    <div class="card-header bg-warning text-dark">
                        <h5 class="mb-0">Data Transaksi Detail</h5>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-bordered table-hover align-middle">
                                <thead class="table-light text-center">
                                    <tr>
                                        <th>ID Transaksi</th>
                                        <th>Nama Barang</th>
                                        <th>Harga</th>
                                        <th>Qty</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php while ($row = mysqli_fetch_assoc($transaksi_detail)) { ?>
                                        <tr>
                                            <td><?= $row['transaksi_id'] ?></td>
                                            <td><?= $row['nama_barang'] ?? '-' ?></td>
                                            <td>Rp <?= number_format($row['harga'], 0, ',', '.') ?></td>
                                            <td><?= $row['qty'] ?></td>
                                        </tr>
                                    <?php } ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="d-flex justify-content-end gap-2 mt-3">
            <a href="tambah_transaksi.php" class="btn btn-primary">Tambah Transaksi</a>
            <a href="tambah_detail.php" class="btn btn-success">Tambah Detail Transaksi</a>
        </div>
    </div>
</body>

</html>