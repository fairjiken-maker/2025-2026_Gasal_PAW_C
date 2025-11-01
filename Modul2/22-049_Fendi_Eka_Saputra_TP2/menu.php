<?php

// Daftar menu dan harga
$menu = [
    1 => ["Nasi Goreng" => 20000],
    2 => ["Mie Ayam" => 15000],
    3 => ["Ayam Penyet" => 25000],
    4 => ["Sate" => 30000],
    5 => ["Es Teh" => 5000],
    6 => ["Es Jeruk" => 6000],
];

session_start();  // Mulai session untuk menyimpan data pesanan

// Cek jika session pesanan sudah ada, jika tidak, inisialisasi array
if (!isset($_SESSION['pesanan'])) {
    $_SESSION['pesanan'] = [];
    $_SESSION['total_harga'] = 0;
}

// Jika form disubmit
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST['pilihan']) && isset($_POST['jumlah'])) {
        $pilihan = $_POST['pilihan'];
        $jumlah = $_POST['jumlah'];

        // Menghitung total harga dan menyimpan pesanan
        if (isset($menu[$pilihan])) {
            $item_name = key($menu[$pilihan]);
            $item_price = current($menu[$pilihan]);
            $total_item = $item_price * $jumlah;
            
            // Menyimpan pesanan ke dalam session
            $_SESSION['pesanan'][] = ["nama" => $item_name, "jumlah" => $jumlah, "harga" => $total_item];
            $_SESSION['total_harga'] += $total_item; // Menambahkan harga ke total
        } else {
            echo "<p>Pilihan tidak valid.</p>";
        }
    }

    // Jika pengguna memilih untuk melanjutkan
    if (isset($_POST['lanjutkan']) && $_POST['lanjutkan'] == 'y') {
        // Tidak reset, biarkan pesanan tetap ada
    } elseif (isset($_POST['lanjutkan']) && $_POST['lanjutkan'] == 'n') {
        // Tampilkan total harga akhir jika tidak lanjut
        echo "<p>Total harga yang harus dibayar: Rp " . $_SESSION['total_harga'] . "</p>";
        echo "<p>Terima kasih telah berbelanja!</p>";
        // Reset pesanan dan total harga setelah selesai
        session_unset();
        session_destroy();
    }
}

?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pesan Makanan</title>
</head>
<body>

<h2>Menu Makanan</h2>
<form method="POST">
    <?php foreach ($menu as $key => $item) : ?>
        <?php foreach ($item as $name => $price) : ?>
            <input type="radio" name="pilihan" value="<?php echo $key; ?>" required>
            <label><?php echo "$name - Rp $price"; ?></label><br>
        <?php endforeach; ?>
    <?php endforeach; ?>

    <br>
    <label for="jumlah">Berapa porsi?</label>
    <input type="number" name="jumlah" min="1" required><br><br>

    <button type="submit">Pesan</button>
</form>

<?php
// Menampilkan pesanan yang sudah dilakukan
if (!empty($_SESSION['pesanan'])) {
    echo "<h3>Pesanan Anda:</h3>";
    foreach ($_SESSION['pesanan'] as $item) {
        echo "<p>{$item['nama']} x {$item['jumlah']} = Rp {$item['harga']}</p>";
    }
    echo "<form method='POST'>
            <label>Apakah Anda ingin menambah pesanan? (y/n): </label>
            <input type='radio' name='lanjutkan' value='y'> Ya
            <input type='radio' name='lanjutkan' value='n' checked> Tidak
            <br><br>
            <button type='submit'>Lanjutkan</button>
          </form>";
} elseif ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_SESSION['total_harga'])) {
    echo "<p>Total harga yang harus dibayar: Rp " . $_SESSION['total_harga'] . "</p>";
}
?>

</body>
</html>
