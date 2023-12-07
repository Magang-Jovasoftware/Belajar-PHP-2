<?php

class Product {
    public $name;
    public $price;

    public function __construct($name, $price) 
    {
        $this->name = $name;
        $this->price = $price;
    }
}

class Transaction {
    private $items = [];
    private $discount = 0;

    public function addItem(Product $product, $quantity = 1) {
        $this->items[] = [
            'product' => $product,
            'quantity' => $quantity,
        ];
    }

    public function setDiscount($discount) {
        $this->discount = $discount;
    }

    public function getTotal() {
        $total = 0;
        foreach ($this->items as $item) {
            $total += $item['product']->price * $item['quantity'];
        }
        $total -= $total * ($this->discount / 100);
        return $total;
    }

    public function cetakStruk() {
        echo "===== Struk Pembelian =====";
        echo "<br>";
        foreach ($this->items as $item) {
            echo "- {$item['quantity']} x {$item['product']->name}: Rp. {$item['product']->price} /Item";
            echo "<br>";
        }
        echo "Diskon: {$this->discount}%";
        echo "<br>";
        echo "Total: Rp." . $this->getTotal();
        echo "<br>";
        echo "=======================";
        echo "<br>";
    }
}


$product1 = new Product("Laptop", 1000);
$product2 = new Product("Mouse", 500);

$beli = new Transaction();

$beli->addItem($product1, 2);
$beli->addItem($product2, 2);

$beli->setDiscount(10);

$beli->cetakStruk();