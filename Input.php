<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Input Product</title>
</head>
<body>
    <h2>Input Product</h2>
    <form action="Output.php" method="post">
        <table>
            <tr bgcolor="#eee">
                <th width="100">Nama Product</th>
                <th width="50">Harga</th>
                <th width="50">Jumlah</th>
            </tr>
                <?php
                $jumlah = $_POST['jumlah'];
                for ($i=1; $i<=$jumlah; $i++)
                {
                    echo "<tr>
                            <td><input type='text' name='namaProduct' size='25'></td>
                            <td><input type='text' name='hargaProduct' size='10'></td>
                            <td><input type='text' name='jumlahProduct' size='8'></td>
                    </tr>";
                }
                ?>
                <td>Diskon <input type="text" name="diskon" size="1"></td>
    </form>
        </table>
        <input type="hidden" name="jumlah" value="<?php echo $jum; ?>">
        <input type="submit" name="hitung" value="hitung">
        <input type="button" value="kembali" onclick="location.href='FormInput.php';">
    </form>
</body>
</html>