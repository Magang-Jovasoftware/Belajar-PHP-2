<?php 

include "Index.php";
if (isset($_POST['hitung'])){
    $name = $_POST['namaProduct'];
    $price = $_POST['hargaProduct'];
    $quantity = $_POST['jumlahProduct'];
    $discount = $_POST['diskon'];

    $produk1 = new Product($name, $price);

    $transaction1 = new Transaction();

    $transaction1->addItem($produk1, $quantity);

    $transaction1->setDiscount($discount);

    $transaction1->cetakStruk();
}