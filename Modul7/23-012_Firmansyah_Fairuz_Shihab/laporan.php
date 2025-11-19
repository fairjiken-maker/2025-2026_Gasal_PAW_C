<?php
// laporan.php - versi diperbaiki

// pastikan file koneksi ada dan mendefinisikan $koneksi
require_once 'koneksi.php';

// Ambil tanggal awal & akhir, gunakan default jika tidak ada
$tgl_awal  = $_GET['tgl_awal'] ?? date('Y-m-01');
$tgl_akhir = $_GET['tgl_akhir'] ?? date('Y-m-d');

// validasi format tanggal sederhana (YYYY-MM-DD) untuk mencegah SQL injection / format salah
function valid_date($d) {
    $t = DateTime::createFromFormat('Y-m-d', $d);
    return $t && $t->format('Y-m-d') === $d;
}
if (!valid_date($tgl_awal)) $tgl_awal = date('Y-m-01');
if (!valid_date($tgl_akhir)) $tgl_akhir = date('Y-m-d');

// escape input (meskipun sudah divalidasi) untuk keamanan
$tgl_awal_esc  = mysqli_real_escape_string($koneksi, $tgl_awal);
$tgl_akhir_esc = mysqli_real_escape_string($koneksi, $tgl_akhir);

// Query rekapan harian (menggunakan table pembayaran + join transaksi)
$sql = "
SELECT 
    DATE(p.waktu_bayar) AS tanggal,
    SUM(p.total) AS total
FROM pembayaran p
JOIN transaksi t ON t.id = p.transaksi_id
WHERE DATE(p.waktu_bayar) BETWEEN '$tgl_awal_esc' AND '$tgl_akhir_esc'
GROUP BY DATE(p.waktu_bayar)
ORDER BY tanggal ASC
";

// jalankan query dan cek error
$q = mysqli_query($koneksi, $sql);
if ($q === false) {
    die("Query gagal: " . mysqli_error($koneksi));
}

$data_tanggal = [];
$data_total = [];
$rekap = [];

while($row = mysqli_fetch_assoc($q)) {
    $rekap[] = $row;
    $data_tanggal[] = $row['tanggal'];
    $data_total[] = (int)$row['total'];
}

$total_pendapatan = array_sum($data_total);

// Total pelanggan unik dalam range
$sql_pelanggan = "
SELECT COUNT(DISTINCT t.pelanggan_id) AS jml
FROM transaksi t
JOIN pembayaran p ON p.transaksi_id = t.id
WHERE DATE(p.waktu_bayar) BETWEEN '$tgl_awal_esc' AND '$tgl_akhir_esc'
";
$resP = mysqli_query($koneksi, $sql_pelanggan);
if ($resP === false) {
    die("Query jumlah pelanggan gagal: " . mysqli_error($koneksi));
}
$rowP = mysqli_fetch_assoc($resP);
$jml_pelanggan = $rowP['jml'] ?? 0;
?>
<!DOCTYPE html>
<html>
<head>
    <title>Laporan Pendapatan</title>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <style>
        body { font-family: Arial; padding: 20px; }
        .box { padding: 10px; margin: 10px 0; border: 1px solid #ccc; }
        table { border-collapse: collapse; width: 100%; margin-top: 20px; }
        table, th, td { border: 1px solid #999; padding: 8px; }
        th { background: #eef; }
    </style>
</head>
<body>

<h2>Laporan Pendapatan</h2>

<form method="GET" action="" class="box">
    <b>Filter Tanggal:</b><br><br>
    <input type="date" name="tgl_awal" value="<?= htmlspecialchars($tgl_awal); ?>" required>
    <input type="date" name="tgl_akhir" value="<?= htmlspecialchars($tgl_akhir); ?>" required>
    <button type="submit">Tampilkan</button>
</form>

<div style="margin: 15px 0;">
    <a href="javascript:window.print();" 
       style="background:#ff7700; color:white; padding:10px 20px; text-decoration:none; border-radius:5px; margin-right:10px;">
        🖨 Cetak
    </a>

    <a href="export_excel.php?tgl_awal=<?= $tgl_awal ?>&tgl_akhir=<?= $tgl_akhir ?>" 
       style="background:#ff7700; color:white; padding:10px 20px; text-decoration:none; border-radius:5px;">
        📁 Excel
    </a>
</div>


<h3>Grafik Pendapatan</h3>
<canvas id="chartPendapatan" height="120"></canvas>

<script>
var ctx = document.getElementById("chartPendapatan").getContext('2d');
var chart = new Chart(ctx, {
    type: 'bar',
    data: {
        labels: <?= json_encode($data_tanggal); ?>,
        datasets: [{
            label: "Total Pendapatan",
            data: <?= json_encode($data_total); ?>,
            backgroundColor: "rgba(0, 123, 255, 0.5)"
        }]
    }
});
</script>

<h3>Rekap Harian</h3>
<table>
    <tr>
        <th>No</th>
        <th>Total</th>
        <th>Tanggal</th>
    </tr>
    <?php 
    $no = 1;
    foreach($rekap as $r) { ?>
        <tr>
            <td><?= $no++; ?></td>
            <td>Rp. <?= number_format($r['total'],0,',','.'); ?></td>
            <td><?= date('d M Y', strtotime($r['tanggal'])); ?></td>
        </tr>
    <?php } ?>
</table>

<h3>Total Keseluruhan</h3>
<table width="40%">
<tr>
    <th>Jumlah Pelanggan</th>
    <th>Jumlah Pendapatan</th>
</tr>
<tr style="font-size:22px; font-weight:bold;">
    <td><?= (int)$jml_pelanggan; ?> Orang</td>
    <td>Rp. <?= number_format($total_pendapatan,0,',','.'); ?></td>
</tr>
</table>

</body>
</html>
