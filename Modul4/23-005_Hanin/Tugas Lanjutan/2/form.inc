<form method="POST" action="mahasiswa.php">
    <table border="0">
        <tr>
            <td>NIM</td>
            <td>:</td>
            <td>
                <input type="text" name="nim" size="30" value="<?php echo isset($_POST['nim']) ? htmlspecialchars($_POST['nim']) : ''; ?>">
                <?php if (isset($errors['nim'])): ?>
                    <span style="color: red;">*<?php echo $errors['nim']; ?></span>
                <?php endif; ?>
            </td>
        </tr>
        <tr>
            <td>Nama Lengkap</td>
            <td>:</td>
            <td>
                <input type="text" name="nama" size="30" value="<?php echo isset($_POST['nama']) ? htmlspecialchars($_POST['nama']) : ''; ?>">
                <?php if (isset($errors['nama'])): ?>
                    <span style="color: red;">*<?php echo $errors['nama']; ?></span>
                <?php endif; ?>
            </td>
        </tr>
        <tr>
            <td>Email</td>
            <td>:</td>
            <td>
                <input type="text" name="email" size="30" placeholder="nama@domain.com" value="<?php echo isset($_POST['email']) ? htmlspecialchars($_POST['email']) : ''; ?>">
                <?php if (isset($errors['email'])): ?>
                    <span style="color: red;">*<?php echo $errors['email']; ?></span>
                <?php endif; ?>
            </td>
        </tr>
        <tr>
            <td>Password</td>
            <td>:</td>
            <td>
                <input type="password" name="password" size="30">
                <br><small style="color: #666;">Min 8 karakter, harus ada huruf besar, kecil, angka, dan simbol</small>
                <?php if (isset($errors['password'])): ?>
                    <br><span style="color: red;">*<?php echo $errors['password']; ?></span>
                <?php endif; ?>
            </td>
        </tr>
        <tr>
            <td>Konfirmasi Password</td>
            <td>:</td>
            <td>
                <input type="password" name="confirm_password" size="30">
                <?php if (isset($errors['confirm_password'])): ?>
                    <span style="color: red;">*<?php echo $errors['confirm_password']; ?></span>
                <?php endif; ?>
            </td>
        </tr>
        <tr>
            <td>Jenis Kelamin</td>
            <td>:</td>
            <td>
                <input type="radio" name="jenis_kelamin" value="L" <?php echo (isset($_POST['jenis_kelamin']) && $_POST['jenis_kelamin'] == 'L') ? 'checked' : ''; ?>> Laki-laki
                <input type="radio" name="jenis_kelamin" value="P" <?php echo (isset($_POST['jenis_kelamin']) && $_POST['jenis_kelamin'] == 'P') ? 'checked' : ''; ?>> Perempuan
                <?php if (isset($errors['jenis_kelamin'])): ?>
                    <span style="color: red;">*<?php echo $errors['jenis_kelamin']; ?></span>
                <?php endif; ?>
            </td>
        </tr>
        <tr>
            <td>Tanggal Lahir</td>
            <td>:</td>
            <td>
                <input type="date" name="tanggal_lahir" value="<?php echo isset($_POST['tanggal_lahir']) ? htmlspecialchars($_POST['tanggal_lahir']) : ''; ?>">
                <?php if (isset($errors['tanggal_lahir'])): ?>
                    <span style="color: red;">*<?php echo $errors['tanggal_lahir']; ?></span>
                <?php endif; ?>
            </td>
        </tr>
        <tr>
            <td>Nomor Telepon</td>
            <td>:</td>
            <td>
                <input type="text" name="telepon" size="30" placeholder="081234567890" value="<?php echo isset($_POST['telepon']) ? htmlspecialchars($_POST['telepon']) : ''; ?>">
                <?php if (isset($errors['telepon'])): ?>
                    <span style="color: red;">*<?php echo $errors['telepon']; ?></span>
                <?php endif; ?>
            </td>
        </tr>
        <tr>
            <td>Jurusan</td>
            <td>:</td>
            <td>
                <select name="jurusan">
                    <option value="">-- Pilih Jurusan --</option>
                    <option value="Teknik Informatika" <?php echo (isset($_POST['jurusan']) && $_POST['jurusan'] == 'Teknik Informatika') ? 'selected' : ''; ?>>Teknik Informatika</option>
                    <option value="Sistem Informasi" <?php echo (isset($_POST['jurusan']) && $_POST['jurusan'] == 'Sistem Informasi') ? 'selected' : ''; ?>>Sistem Informasi</option>
                    <option value="Teknik Elektro" <?php echo (isset($_POST['jurusan']) && $_POST['jurusan'] == 'Teknik Elektro') ? 'selected' : ''; ?>>Teknik Elektro</option>
                    <option value="Teknik Mesin" <?php echo (isset($_POST['jurusan']) && $_POST['jurusan'] == 'Teknik Mesin') ? 'selected' : ''; ?>>Teknik Mesin</option>
                </select>
                <?php if (isset($errors['jurusan'])): ?>
                    <span style="color: red;">*<?php echo $errors['jurusan']; ?></span>
                <?php endif; ?>
            </td>
        </tr>
        <tr>
            <td>Alamat</td>
            <td>:</td>
            <td>
                <textarea name="alamat" rows="4" cols="30"><?php echo isset($_POST['alamat']) ? htmlspecialchars($_POST['alamat']) : ''; ?></textarea>
                <?php if (isset($errors['alamat'])): ?>
                    <span style="color: red;">*<?php echo $errors['alamat']; ?></span>
                <?php endif; ?>
            </td>
        </tr>
        <tr>
            <td colspan="3" align="center">
                <input type="submit" value="Submit">
                <input type="reset" value="Reset">
            </td>
        </tr>
    </table>
</form>