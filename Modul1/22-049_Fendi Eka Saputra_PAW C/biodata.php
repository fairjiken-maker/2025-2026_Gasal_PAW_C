<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Biodata</title>
</head>
<body bgcolor="#F0F0F0"> 

<center> 
    <table border="1" cellpadding="10" cellspacing="0" width="600" bgcolor="#FFFFFF"> 
        <tr>
            <td colspan="2" align="center">
                <font size="5" face="Arial" color="#333333"><b>BIODATA PRIBADI</b></font> 
            </td>
        </tr>
        <?php
        
        $nama = isset($_GET['nama']) ? htmlspecialchars($_GET['nama']) : 'Belum Diisi';
        $umur = isset($_GET['umur']) ? htmlspecialchars($_GET['umur']) : 'Belum Diisi';
        $alamat = isset($_GET['alamat']) ? htmlspecialchars($_GET['alamat']) : 'Belum Diisi';
        $Jurusan = isset($_GET['Jurusan']) ? htmlspecialchars($_GET['Jurusan']) : 'Belum Diisi';
        $email = isset($_GET['email']) ? htmlspecialchars($_GET['email']) : 'Belum Diisi';
        ?>

        <tr>
            <td width="30%" bgcolor="#E0E0E0"><font face="Arial"><b>Nama Lengkap</b></font></td> 
            <td><font face="Arial"><?php echo $nama; ?></font></td>
        </tr>
        <tr>
            <td bgcolor="#E0E0E0"><font face="Arial"><b>Umur</b></font></td>
            <td><font face="Arial"><?php echo $umur; ?></font></td>
        </tr>
        <tr>
            <td bgcolor="#E0E0E0"><font face="Arial"><b>Alamat</b></font></td>
            <td><font face="Arial"><?php echo $alamat; ?></font></td>
        </tr>
        <tr>
            <td bgcolor="#E0E0E0"><font face="Arial"><b>JURUSAN</b></font></td>
            <td><font face="Arial"><?php echo $Jurusan; ?></font></td>
        </tr>
        <tr>
            <td bgcolor="#E0E0E0"><font face="Arial"><b>Email</b></font></td>
            <td><font face="Arial"><?php echo $email; ?></font></td>
        </tr>
    </table>
</center>

</body>
</html>
