<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Input Product</title>
</head>
<body>
    <h2>Input Product</h2>
    <form action="" method="post" name="inputProduct">
    <?php 
    include "Index.php";
    // Mengambil jumlah produk dari form atau default 1
    $numProducts = isset($_POST['numProducts']) ? $_POST['numProducts'] : 1;

    if (isset($_POST['hitung'])){
        $products = [];
        // Mendapatkan data barang dari form
        for ($i = 1; $i <= $numProducts; $i++) {
            $name = $_POST["namaProduct$i"];
            $price = $_POST["hargaProduct$i"];
            $quantity = $_POST["jumlahProduct$i"];

            $product = new Product($name, $price);
            $products[] = ['product' => $product, 'quantity' => $quantity];
        }

        $transaction = new Transaction();
        // Menambahkan setiap barang ke dalam transaksi
        foreach ($products as $item){
            $transaction->addItem($item['product'], $item['quantity']);
        }
    }
    ?>
        <table>
            <tr bgcolor="#eee">
                <th width="100">Nama Produk</th>
                <th width="50">Harga</th>
                <th width="50">Jumlah</th>
                <th width="50">Subtotal</th>
            </tr>
            <?php
            // Menampilkan baris form dinamis berdasarkan data product
            for ($i = 1; $i <= $numProducts; $i++) {
            ?>
            <tr>
                    <td><input type="text" name="namaProduct<?php echo $i; ?>" size="25" value="<?php echo isset($_POST["namaProduct$i"]) ? $_POST["namaProduct$i"] : ''; ?>"></td>
                    <td><input type="text" name="hargaProduct<?php echo $i; ?>" size="25" value="<?php echo isset($_POST["hargaProduct$i"]) ? $_POST["hargaProduct$i"] : ''; ?>" onFocus="startCalc(<?php echo $i; ?>);" onBlur="stopCalc(<?php echo $i; ?>);"></td>
                    <td><input type="text" name="jumlahProduct<?php echo $i; ?>" size="25" value="<?php echo isset($_POST["jumlahProduct$i"]) ? $_POST["jumlahProduct$i"] : ''; ?>" onFocus="startCalc(<?php echo $i; ?>);" onBlur="stopCalc(<?php echo $i; ?>);"></td>
                    <td><input type="text" name="subTotal<?php echo $i; ?>" size="25" value="<?php echo isset($_POST['hitung']) ? $products[$i-1]['product']->getSubtotal($products[$i-1]['quantity']) : ''; ?>" readonly></td>
            </tr>
            <?php } ?>
            <tr>
                <td colspan="4">
                    <input type="hidden" name="numProducts" value="<?php echo isset($_POST['numProducts']) ? $_POST['numProducts'] + 1 : 1; ?>">
                    <input type="submit" name="hitung" value="hitung">
                    <button type="button" onclick="addProductRow()">Tambah Barang</button>
                </td>
            </tr>
            <tr>
                <td>Sub Total :</td>
                <td><input type="text" name="getDiskon" size="5" value="<?php echo isset($_POST['hitung']) ? $transaction->getTotal() : ''; ?>"><br></td>
            </tr>
            <tr>
                <td>Diskon :</td>
                <td><input type="text" name="getDiskon" size="5" value="<?php echo isset($_POST['hitung']) ? $transaction->getDiscount() . '%' : ''; ?>"><br></td>
            </tr>
            <tr>
                <td>Total Belanja :</td>
                <td><input type="text" name="getTotal" size="5" value="<?php echo isset($_POST['hitung']) ? $transaction->totalAfterDiscount() : ''; ?>"><br></td>
            </tr>
        </table>
    </form>
    <br>    
    <?php 
    echo isset($_POST['hitung']) ? $transaction->cetakStruk():'';
    ?>
    <br>
    <script>
        // Function untuk menambahkan baris pada data
        function addProductRow() {
            let numProductsInput = document.querySelector("input[name='numProducts']");
            numProductsInput.value = parseInt(numProductsInput.value) + 1;

            let table = document.querySelector("table");
            let row = table.insertRow(table.rows.length - 4);
            let cell1 = row.insertCell(0);
            let cell2 = row.insertCell(1);
            let cell3 = row.insertCell(2);
            let cell4 = row.insertCell(3);

            cell1.innerHTML = `<input type="text" name="namaProduct${numProductsInput.value}" size="25" value="">`;
            cell2.innerHTML = `<input type="text" name="hargaProduct${numProductsInput.value}" size="25" value="" onFocus="startCalc(${numProductsInput.value});" onBlur="stopCalc(${numProductsInput.value});">`;
            cell3.innerHTML = `<input type="text" name="jumlahProduct${numProductsInput.value}" size="25" value="" onFocus="startCalc(${numProductsInput.value});" onBlur="stopCalc(${numProductsInput.value});">`;
            cell4.innerHTML = `<input type="text" name="subTotal${numProductsInput.value}" size="25" value="" readonly>`;
        }

    function startCalc(productNumber){
    interval = setInterval(function(){
        calc(productNumber);
    }, 1);
    }
    function calc(productNumber){
    let one = document.inputProduct['hargaProduct' + productNumber].value;
    let two = document.inputProduct['jumlahProduct' + productNumber].value;
    document.inputProduct['subTotal' + productNumber].value = (one * 1) * (two * 1);}
    function stopCalc(){
    clearInterval(interval);}
    </script>
</body>
</html>