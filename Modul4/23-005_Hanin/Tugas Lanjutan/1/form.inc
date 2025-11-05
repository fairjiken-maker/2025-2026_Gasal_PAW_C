<form method="POST" action="mahasiswa.php">
    <table border="0">
        <tr>
            <td>NIM</td>
            <td>:</td>
            <td>
                <input type="text" name="nim" value="<?php echo isset($_POST['nim']) ? htmlspecialchars($_POST['nim']) : ''; ?>">
                <?php if (isset($errors['nim'])): ?>
                    <span style="color: red;">*<?php echo $errors['nim']; ?></span>
                <?php endif; ?>
            </td>
        </tr>
        <tr>
            <td>Nama Lengkap</td>
            <td>:</td>
            <td>
                <input type="text" name="nama" value="<?php echo isset($_POST['nama']) ? htmlspecialchars($_POST['nama']) : ''; ?>">
                <?php if (isset($errors['nama'])): ?>
                    <span style="color: red;">*<?php echo $errors['nama']; ?></span>
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