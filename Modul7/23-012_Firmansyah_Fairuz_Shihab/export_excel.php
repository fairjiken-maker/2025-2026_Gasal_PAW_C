<?php
require_once 'koneksi.php';

$tgl_awal  = $_GET['tgl_awal'] ?? date('Y-m-01');
$tgl_akhir = $_GET['tgl_akhir'] ?? date('Y-m-d');

// header untuk file excel
header("Content-Type: application/vnd.ms-excel");
header("Content-Disposition: attachment; filename=laporan_pendapatan_" . date('Ymd') . ".xls");

$sql = "
SELECT 
    DATE(p.waktu_bayar) AS tanggal,
    SUM(p.total) AS total
FROM pembayaran p
JOIN transaksi t ON t.id = p.transaksi_id
WHERE DATE(p.waktu_bayar) BETWEEN '$tgl_awal' AND '$tgl_akhir'
GROUP BY DATE(p.waktu_bayar')
ORDER BY tanggal ASC
";

$q = mysqli_query($koneksi, $sql);

// Tampilkan sebagai tabel Excel
echo "<table border='1'>";
echo "<tr><th>Tanggal</th><th>Total</th></tr>";

while ($r = mysqli_fetch_assoc($q)) {
    echo "<tr>";
    echo "<td>" . $r['tanggal'] . "</td>";
    echo "<td>" . $r['total'] . "</td>";
    echo "</tr>";
}

echo "</table>";
?>
