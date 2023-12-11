<?php

class Product {
    public $name;
    public $price;

    public function __construct($name, $price) 
    {
        $this->name = $name;
        $this->price = $price;
    }

    public function getSubtotal($quantity)
    {
        return $this->price * $quantity;
    }
}

class Transaction {
    private $items = [];

    public function addItem(Product $product, $quantity) {
        $this->items[] = [
            'product' => $product,
            'quantity' => $quantity,
        ];
    }

    public function getTotal()
    {
        $total = 0;
        foreach ($this->items as $item){
            $total += $item['product']->getSubtotal($item['quantity']);
        }
        return $total;
    }

    public function getDiscount()
    {
        $total = $this->getTotal();
        if ($total > 20000){
            return 20;
        } elseif ($total > 10000){
            return 10;
        } else {
            return 0;
        }
    }

    public function totalAfterDiscount()
    {
        $total = $this->getTotal();
        $discount = $this->getDiscount();
        $discountAmount = ($total * $discount)/100;

        return $total - $discountAmount;
    }

    public function cetakStruk() {
        echo "===== Struk Pembelian =====";
        echo "<br>";
        foreach ($this->items as $item) {
            echo "- {$item['quantity']} x {$item['product']->name}: Rp. {$item['product']->price} /Item";
            echo "<br>";
        }
        echo "<br>";
        echo "Sub Total : Rp." . $this->getTotal() ;
        echo "<br>";
        echo "Diskon :" . $this->getDiscount() . "%" ;
        echo "<br>";
        echo "Total : Rp." . $this->totalAfterDiscount();
        echo "<br>";
        echo "=======================";
        echo "<br>";
    }
}