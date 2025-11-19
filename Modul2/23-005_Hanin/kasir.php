<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sistem Kasir Sederhana</title>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }
        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            min-height: 100vh;
            padding: 30px 20px;
        }
        .container {
            max-width: 900px;
            margin: 0 auto;
            background: white;
            padding: 40px;
            border-radius: 20px;
            box-shadow: 0 20px 60px rgba(0,0,0,0.3);
        }
        h2 {
            text-align: center;
            color: #333;
            margin-bottom: 30px;
            font-size: 32px;
        }
        .menu-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(200px, 1fr));
            gap: 15px;
            margin-bottom: 30px;
        }
        .menu-item {
            border: 2px solid #e0e0e0;
            padding: 20px;
            border-radius: 12px;
            text-align: center;
            transition: all 0.3s;
            background: linear-gradient(135deg, #f5f7fa 0%, #c3cfe2 100%);
        }
        .menu-item:hover {
            transform: translateY(-5px);
            box-shadow: 0 10px 25px rgba(0,0,0,0.15);
            border-color: #667eea;
        }
        .menu-item h4 {
            color: #333;
            margin-bottom: 10px;
            font-size: 18px;
        }
        .price {
            color: #667eea;
            font-size: 20px;
            font-weight: bold;
        }
        .form-section {
            background: #f8f9fa;
            padding: 25px;
            border-radius: 12px;
            margin-bottom: 20px;
        }
        .form-group {
            margin-bottom: 15px;
        }
        label {
            display: block;
            margin-bottom: 8px;
            color: #555;
            font-weight: 600;
        }
        select, input[type="number"] {
            width: 100%;
            padding: 12px;
            border: 2px solid #ddd;
            border-radius: 8px;
            font-size: 16px;
        }
        .button-group {
            display: flex;
            gap: 10px;
        }
        button {
            flex: 1;
            padding: 15px;
            border: none;
            border-radius: 8px;
            font-size: 16px;
            font-weight: bold;
            cursor: pointer;
            transition: all 0.3s;
        }
        .btn-add {
            background: linear-gradient(135deg, #11998e 0%, #38ef7d 100%);
            color: white;
        }
        .btn-add:hover {
            transform: translateY(-2px);
        }
        .btn-reset {
            background: linear-gradient(135deg, #eb3349 0%, #f45c43 100%);
            color: white;
        }
        .btn-reset:hover {
            transform: translateY(-2px);
        }
        .cart {
            background: #f8f9fa;
            padding: 25px;
            border-radius: 12px;
            margin-top: 20px;
        }
        .cart h3 {
            color: #667eea;
            margin-bottom: 20px;
            font-size: 24px;
            border-bottom: 3px solid #667eea;
            padding-bottom: 10px;
        }
        .cart-item {
            display: flex;
            justify-content: space-between;
            padding: 15px;
            background: white;
            border-radius: 8px;
            margin-bottom: 10px;
            box-shadow: 0 2px 5px rgba(0,0,0,0.1);
        }
        .cart-item-left {
            font-weight: 600;
            color: #333;
        }
        .cart-item-right {
            color: #667eea;
            font-weight: bold;
        }
        .total {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            color: white;
            padding: 20px;
            border-radius: 10px;
            text-align: center;
            font-size: 24px;
            font-weight: bold;
            margin-top: 20px;
            box-shadow: 0 5px 15px rgba(0,0,0,0.2);
        }
        .empty-cart {
            text-align: center;
            color: #999;
            padding: 40px;
            font-size: 18px;
        }
        .info-box {
            background: #e3f2fd;
            border-left: 4px solid #2196f3;
            padding: 15px;
            margin-bottom: 20px;
            border-radius: 5px;
        }
        .info-box h4 {
            color: #1976d2;
            margin-bottom: 8px;
        }
        .info-box p {
            color: #555;
            font-size: 14px;
            line-height: 1.6;
        }
    </style>
</head>
<body>
    <div class="container">
        <h2>🛒 Sistem Kasir Sederhana</h2>
        
        <?php
        // ============================================
        // TUGAS 10: SISTEM KASIR SEDERHANA
        // ============================================
        
        // Memulai session untuk menyimpan data keranjang
        session_start();
        
        // ARRAY: Daftar menu dengan struktur array asosiatif
        $menu = array(
            1 => array("nama" => "Nasi Goreng", "harga" => 15000, "emoji" => "🍛"),
            2 => array("nama" => "Mie Ayam", "harga" => 12000, "emoji" => "🍜"),
            3 => array("nama" => "Ayam Geprek", "harga" => 18000, "emoji" => "🍗"),
            4 => array("nama" => "Es Teh Manis", "harga" => 5000, "emoji" => "🍹"),
            5 => array("nama" => "Es Jeruk", "harga" => 7000, "emoji" => "🍊"),
            6 => array("nama" => "Kopi Susu", "harga" => 8000, "emoji" => "☕")
        );
        
        // Inisialisasi keranjang jika belum ada
        if (!isset($_SESSION['cart'])) {
            $_SESSION['cart'] = array();
        }
        
        // PROSES: Tambah item ke keranjang
        if (isset($_POST['tambah'])) {
            $id_menu = $_POST['menu'];
            $jumlah = $_POST['jumlah'];
            
            // Validasi input
            if ($jumlah > 0 && isset($menu[$id_menu])) {
                // Jika item sudah ada, tambah jumlahnya
                if (isset($_SESSION['cart'][$id_menu])) {
                    $_SESSION['cart'][$id_menu] += $jumlah;
                } else {
                    // Jika item belum ada, buat entry baru
                    $_SESSION['cart'][$id_menu] = $jumlah;
                }
                echo "<div style='background: #d4edda; color: #155724; padding: 15px; border-radius: 8px; margin-bottom: 20px; text-align: center;'>";
                echo "✅ <strong>{$menu[$id_menu]['nama']}</strong> berhasil ditambahkan ke keranjang!";
                echo "</div>";
            }
        }
        
        // PROSES: Reset keranjang
        if (isset($_POST['reset'])) {
            $_SESSION['cart'] = array();
            echo "<div style='background: #f8d7da; color: #721c24; padding: 15px; border-radius: 8px; margin-bottom: 20px; text-align: center;'>";
            echo "🗑️ Keranjang berhasil dikosongkan!";
            echo "</div>";
        }
        
        // TAMPILKAN MENU menggunakan FOREACH LOOP
        echo "<h3 style='color: #667eea; margin-bottom: 20px;'>📋 Daftar Menu</h3>";
        echo "<div class='menu-grid'>";
        
        foreach ($menu as $id => $item) {
            echo "<div class='menu-item'>";
            echo "<div style='font-size: 40px; margin-bottom: 10px;'>{$item['emoji']}</div>";
            echo "<h4>{$item['nama']}</h4>";
            echo "<p class='price'>Rp " . number_format($item['harga'], 0, ',', '.') . "</p>";
            echo "</div>";
        }
        
        echo "</div>";
        ?>
        
        <!-- FORM INPUT PEMESANAN -->
        <div class="form-section">
            <h3 style="color: #667eea; margin-bottom: 15px;">🍽️ Form Pemesanan</h3>
            <form method="POST" action="">
                <div class="form-group">
                    <label>Pilih Menu:</label>
                    <select name="menu" required>
                        <option value="">-- Pilih Menu --</option>
                        <?php
                        // FOREACH: Tampilkan opsi menu
                        foreach ($menu as $id => $item) {
                            echo "<option value='$id'>{$item['emoji']} {$item['nama']} - Rp " . number_format($item['harga'], 0, ',', '.') . "</option>";
                        }
                        ?>
                    </select>
                </div>
                
                <div class="form-group">
                    <label>Jumlah:</label>
                    <input type="number" name="jumlah" min="1" value="1" required>
                </div>
                
                <div class="button-group">
                    <button type="submit" name="tambah" class="btn-add">
                        ➕ Tambah ke Keranjang
                    </button>
                </div>
            </form>
            
            <!-- Form terpisah untuk reset -->
            <form method="POST" action="" style="margin-top: 10px;">
                <button type="submit" name="reset" class="btn-reset" style="width: 100%;" onclick="return confirm('Yakin ingin mengosongkan keranjang?')">
                    🗑️ Reset Keranjang
                </button>
            </form>
        </div>
        
        <!-- Pindahkan penutup form-section ke atas -->
            </form>
        
        <?php
        // TAMPILKAN KERANJANG BELANJA
        echo "<div class='cart'>";
        echo "<h3>🛍️ Keranjang Belanja</h3>";
        
        // CEK: Apakah keranjang kosong?
        if (empty($_SESSION['cart'])) {
            echo "<div class='empty-cart'>";
            echo "🛒 Keranjang masih kosong<br>";
            echo "<small>Silakan pilih menu dan tambahkan ke keranjang</small>";
            echo "</div>";
        } else {
            // PERULANGAN: Tampilkan semua item di keranjang
            $total = 0;
            
            foreach ($_SESSION['cart'] as $id_menu => $jumlah) {
                // Ambil data menu dari array
                $nama_menu = $menu[$id_menu]['nama'];
                $emoji = $menu[$id_menu]['emoji'];
                $harga = $menu[$id_menu]['harga'];
                $subtotal = $harga * $jumlah;
                
                // Akumulasi total harga
                $total += $subtotal;
                
                // Tampilkan item
                echo "<div class='cart-item'>";
                echo "<span class='cart-item-left'>";
                echo "$emoji <strong>$nama_menu</strong> x $jumlah";
                echo "<br><small style='color: #888;'>@ Rp " . number_format($harga, 0, ',', '.') . "</small>";
                echo "</span>";
                echo "<span class='cart-item-right'>";
                echo "Rp " . number_format($subtotal, 0, ',', '.');
                echo "</span>";
                echo "</div>";
            }
            
            // Tampilkan total pembayaran
            echo "<div class='total'>";
            echo "💰 TOTAL PEMBAYARAN<br>";
            echo "<div style='font-size: 32px; margin-top: 10px;'>";
            echo "Rp " . number_format($total, 0, ',', '.');
            echo "</div>";
            echo "</div>";
        }
        
        echo "</div>";
        ?>
    </div>
</body>
</html>