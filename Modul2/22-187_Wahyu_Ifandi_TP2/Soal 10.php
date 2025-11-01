<?php
// Daftar menu dan harga
$menu = array(
    "Nasi Goreng" => 15000,
    "Mie Goreng"  => 12000,
    "Es Teh"      => 5000,
    "Kopi"        => 7000
);

// Pesanan pelanggan (nama menu dan jumlah)
$pesanan = array(
    array("menu" => "Nasi Goreng", "jumlah" => 2),
    array("menu" => "Es Teh", "jumlah" => 3),
    array("menu" => "Kopi", "jumlah" => 1)
);

$total = 0; // Inisialisasi total harga

echo "<h3>Daftar Pesanan</h3>";

// Loop untuk menghitung total setiap item
foreach ($pesanan as $item) {
    $nama_menu = $item["menu"];
    $jumlah = $item["jumlah"];
    $harga_satuan = $menu[$nama_menu];
    $subtotal = $harga_satuan * $jumlah; // total per menu

    echo $nama_menu . " (" . $jumlah . "x) = Rp " . $subtotal . "<br>";
    $total += $subtotal; // Tambahkan ke total keseluruhan
}

// Tampilkan total akhir
echo "<hr>";
echo "<b>Total yang harus dibayar: Rp " . $total . "</b>";
?>
