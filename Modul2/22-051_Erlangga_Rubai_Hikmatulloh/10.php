<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Kasir Sederhana</title>
</head>
<body>
    <h2>Kasir Sederhana</h2>

    <form method="post">
        <p><b>Daftar Menu:</b></p>
        <p>
            1. Nasi Goreng - Rp15.000 <br>
            2. Mie Ayam - Rp12.000 <br>
            3. Es Teh - Rp5.000 <br>
            4. Es Jeruk - Rp7.000 <br>
        </p>

        <label>Nomor Menu:</label><br>
        <input type="number" name="menu"><br><br>

        <label>Jumlah:</label><br>
        <input type="number" name="jumlah"><br><br>

        <input type="submit" name="tambah" value="Tambah Pesanan">
        <input type="submit" name="selesai" value="Selesai & Lihat Total">
        <input type="submit" name="reset" value="Reset Pesanan">
    </form>

    <hr>

    <?php
    session_start();

    if (!isset($_SESSION['total'])) {
        $_SESSION['total'] = 0;
    }

    if (isset($_POST['tambah'])) {
        $menu = $_POST['menu'];
        $jumlah = $_POST['jumlah'];
        $harga = 0;
        $nama = "";

        if ($menu == 1) {
            $nama = "Nasi Goreng";
            $harga = 15000;
        } elseif ($menu == 2) {
            $nama = "Mie Ayam";
            $harga = 12000;
        } elseif ($menu == 3) {
            $nama = "Es Teh";
            $harga = 5000;
        } elseif ($menu == 4) {
            $nama = "Es Jeruk";
            $harga = 7000;
        } else {
            echo "<p style='color:red;'>Menu tidak tersedia!</p>";
            exit;
        }
        
        $subtotal = $harga * $jumlah;
        $_SESSION['total'] += $subtotal;

        echo "<p>$jumlah x $nama (Rp" . number_format($harga, 0, ',', '.') . ") = Rp" . number_format($subtotal, 0, ',', '.') . "</p>";
        echo "<p><b>Total sementara: Rp" . number_format($_SESSION['total'], 0, ',', '.') . "</b></p>";
    }

    if (isset($_POST['selesai'])) {
        echo "<h3>💰 Total Pembayaran: Rp" . number_format($_SESSION['total'], 0, ',', '.') . "</h3>";
        echo "<p>Terima kasih telah berbelanja 😊</p>";
        session_destroy();
    }

    if (isset($_POST['reset'])) {
        $_SESSION['total'] = 0;
        echo "<p style='color:blue;'>Pesanan berhasil direset. Silakan mulai dari awal.</p>";
    }
    ?>
</body>
</html>
