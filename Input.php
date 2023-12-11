<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Input Product</title>
</head>
<body>
    <h2>Input Product</h2>
    <form action="" method="post">
    <?php 
    include "Index.php";
    if (isset($_POST['hitung'])){
        $name1 = $_POST['namaProduct1'];
        $price1 = $_POST['hargaProduct1'];
        $quantity1 = $_POST['jumlahProduct1'];

        $name2 = $_POST['namaProduct2'];
        $price2 = $_POST['hargaProduct2'];
        $quantity2 = $_POST['jumlahProduct2']   ;

        $name3 = $_POST['namaProduct3'];
        $price3 = $_POST['hargaProduct3'];
        $quantity3 = $_POST['jumlahProduct3'];

        $produk1 = new Product($name1, $price1);
        $produk2 = new Product($name2, $price2);
        $produk3 = new Product($name3, $price3);

        $transaction1 = new Transaction();

        $transaction1->addItem($produk1, $quantity1);
        $transaction1->addItem($produk2, $quantity2);
        $transaction1->addItem($produk3, $quantity3);

    }
    ?>
        <table>
            <tr bgcolor="#eee">
                <th width="100">Nama Produk</th>
                <th width="50">Harga</th>
                <th width="50">Jumlah</th>
                <th width="50">Subtotal</th>
            </tr>
            <tr>
                <td><input type="text" name="namaProduct1" size="25" value="<?php echo $name1 = isset($_POST['namaProduct1']) ? $_POST['namaProduct1'] : ''; ?>"></td>
                <td><input type="text" name="hargaProduct1" size="25" value="<?php echo $price1 = isset($_POST['hargaProduct1']) ? $_POST['hargaProduct1'] : ''; ?>"></td>
                <td><input type="text" name="jumlahProduct1" size="25" value="<?php echo $quantity1 = isset($_POST['jumlahProduct1']) ? $_POST['jumlahProduct1'] : ''; ?>"></td>
                <td><input type="text" name="subTotal1" size="25" value="<?php echo isset($_POST['hitung']) ? $produk1->getSubtotal($quantity1) : ''; ?>"></td>
            </tr>
            <tr>
                <td><input type="text" name="namaProduct2" size="25" value="<?php echo $name2 = isset($_POST['namaProduct2']) ? $_POST['namaProduct2'] : ''; ?>"></td>
                <td><input type="text" name="hargaProduct2" size="25" value="<?php echo $price2 = isset($_POST['hargaProduct2']) ? $_POST['hargaProduct2'] : ''; ?>"></td>
                <td><input type="text" name="jumlahProduct2" size="25" value="<?php echo $quantity2 = isset($_POST['jumlahProduct2']) ? $_POST['jumlahProduct2'] : ''; ?>"></td>
                <td><input type="text" name="subTotal2" size="25" value="<?php echo isset($_POST['hitung']) ? $produk2->getSubtotal($quantity2) : ''; ?>"></td>
            </tr>
            <tr>
                <td><input type="text" name="namaProduct3" size="25" value="<?php echo $name3 = isset($_POST['namaProduct3']) ? $_POST['namaProduct3'] : ''; ?>"></td>
                <td><input type="text" name="hargaProduct3" size="25" value="<?php echo $price3 = isset($_POST['hargaProduct3']) ? $_POST['hargaProduct3'] : ''; ?>"></td>
                <td><input type="text" name="jumlahProduct3" size="25" value="<?php echo $quantity3 = isset($_POST['jumlahProduct3']) ? $_POST['jumlahProduct3'] : ''; ?>"></td>
                <td><input type="text" name="subTotal3" size="25" value="<?php echo isset($_POST['hitung']) ? $produk3->getSubtotal($quantity3) : ''; ?>"></td>
            </tr>
            <tr>
                <td>Sub Total :</td>
                <td><input type="text" name="getDiskon" size="1" value="<?php echo isset($_POST['hitung']) ? $transaction1->getTotal() : ''; ?>"><br></td>
            </tr>
            <tr>
                <td>Diskon :</td>
                <td><input type="text" name="getDiskon" size="1" value="<?php echo isset($_POST['hitung']) ? $transaction1->getDiscount() . '%' : ''; ?>"><br></td>
            </tr>
            <tr>
                <td>Total Belanja :</td>
                <td><input type="text" name="getTotal" size="1" value="<?php echo isset($_POST['hitung']) ? $transaction1->totalAfterDiscount() : ''; ?>"><br></td>
            </tr>
        </table>

        <input type="submit" name="hitung" value="hitung">
    </form>
    <br>    
    <?php 
    echo isset($_POST['hitung']) ? $transaction1->cetakStruk():'';
    ?>
    </br>
</body>
</html>