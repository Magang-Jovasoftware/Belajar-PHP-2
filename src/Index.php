<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="/dist/output.css" rel="stylesheet">
    <title>Input Product</title>
</head>
<body class="bg-gray-100 min-h-screen flex items-center justify-center">
    <div class="bg-white p-8 rounded shadow-lg max-w-2xl mx-auto w-full">
    <h2 class="text-3xl font-bold mb-6 text-center text-gray-700">Input Product</h2>
    <a href="viewDB.php" class="bg-blue-500 hover:bg-blue-700 text-white px-4 py-2 rounded mb-3 inline-block">Lihat Tabel Database</a>
    <form action="" method="post" name="inputProduct" class="mb-4 mt-4">
    <?php 
    include "Input.php";
    ?>
        <table class="w-full mb-4 bg-gray-200 rounded">
            <tr class="bg-gray-300">
                <th class="py-2">Nama Produk</th>
                <th class="py-2">Harga</th>
                <th class="py-2">Jumlah</th>
                <th class="py-2">Subtotal</th>
            </tr>
            <?php
                // Menampilkan baris form dinamis berdasarkan data product
                for ($i = 1; $i <= $numProducts; $i++) {
            ?>
            <tr class="bg-gray-300">
                <td><input type="text" name="namaProduct<?php echo $i; ?>" size="20" value="<?php echo isset($_POST["namaProduct$i"]) ? $_POST["namaProduct$i"] : ''; ?>"></td>
                <td><input type="text" name="hargaProduct<?php echo $i; ?>" size="15" value="<?php echo isset($_POST["hargaProduct$i"]) ? $_POST["hargaProduct$i"] : ''; ?>" onFocus="startCalc(<?php echo $i; ?>);" onBlur="stopCalc(<?php echo $i; ?>);"></td>
                <td><input type="text" name="jumlahProduct<?php echo $i; ?>" size="15" value="<?php echo isset($_POST["jumlahProduct$i"]) ? $_POST["jumlahProduct$i"] : ''; ?>" onFocus="startCalc(<?php echo $i; ?>);" onBlur="stopCalc(<?php echo $i; ?>);"></td>
                <td><input type="text" name="subTotal<?php echo $i; ?>" size="15" value="<?php echo isset($_POST['hitung']) ? $products[$i-1]['product']->getSubtotal($products[$i-1]['quantity']) : ''; ?>" readonly></td>
            </tr>
            <?php } ?>
            </table>
            <div>
                <input type="hidden" name="numProducts" value="<?php echo isset($_POST['numProducts']) ? $_POST['numProducts'] + 1 : 1; ?>">
                <button type="submit" name="hitung" class="bg-blue-500 hover:bg-blue-700 text-white px-4 py-2 mr-2 rounded">Hitung</button>
                <button type="button" onclick="addProductRow()" class="bg-green-500 hover:bg-green-700 text-white px-4 py-2 rounded">Tambah Barang</button>
            </div>
            <div class="mt-4 space-y-4">
                <div class="flex space-x-4">
                    <div class="w-1/2">
                        <label class="block text-sm font-medium text-gray-700">Sub Total :</label>
                        <input type="text"  name="getDiskon" size="5" 
                            value="<?php echo isset($_POST['hitung']) ? $transaction->getTotal() : ''; ?>"
                            class="mt-1 p-2 w-full border rounded">
                    </div>
                    <div class="w-1/2">
                        <label class="block text-sm font-medium text-gray-700">Diskon :</label>
                        <input type="text" name="getDiskon" size="5" value="<?php echo isset($_POST['hitung']) ? $transaction->getDiscount() . '%' : ''; ?>"
                        class="mt-1 p-2 w-full border rounded">
                    </div>
                </div>
                <div class="mt-4">
                    <label class="block text-sm font-medium text-gray-700">Total Belanja :</label>
                    <input type="text" name="getTotal" size="5" value="<?php echo isset($_POST['hitung']) ? $transaction->totalAfterDiscount() : ''; ?>"
                    class="mt-1 p-2 w-full border rounded">
                </div>        
            </div>
    </form>
    <div class="mt-4">
        <?php echo isset($_POST['hitung']) ? $transaction->cetakStruk():'';?>
    </div>    
    </div>
    <script src="/src/script.js"></script>
</body>
</html>