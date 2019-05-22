<?php

namespace App\customClasses;


use App\product;

class Cart
{
    private $cartItems;

    public function __construct() {
        // haal eerder gekozen product ids uit de sessie op en bewaar in lokale array $cartItems
    }

    public function Add($productId, $quantity, $name, $price) {
        if (! is_array($this->cartItems)) {
            $this->cartItems = array();
        }
        // zoek of id al in sessie zit en zo ja, haal op
        // tel quantity op bij bestaande hoeveelheid (als er al iets in de sessie stond)
        // sla nieuwe hoeveelheid terug op in de sessie en in $this->cartItems   
        // session('cartItems') = $cartItems;
        $item = [];
        array_push($item, 'quantity'=>$quantity, 'name'=>$name, 'price'=>$price);
        array_push($this->cartItems, 'productId'=>$productId, 'item'=>$item);
    }

    public function getItems() {
        if (! is_array($this->cartItems)) {
            $this->cartItems = array();
        }
        $quantity = 1;
        $name = 'lol'
        $price = 1.50;
        $item = [];
        array_push($item, 'quantity'=>$quantity, 'name'=>$name, 'price'=>$price);
        array_push($this->cartItems, 'productId'=>$productId, 'item'=>$item);
        $name = 'lel'
        $price = 1.50;
        array_push($item, 'quantity'=>$quantity, 'name'=>$name, 'price'=>$price);
        array_push($this->cartItems, 'productId'=>$productId, 'item'=>$item);
        $name = 'lal'
        $price = 3.50;
        array_push($item, 'quantity'=>$quantity, 'name'=>$name, 'price'=>$price);
        array_push($this->cartItems, 'productId'=>$productId, 'item'=>$item);

        return $this->cartItems;
        //foreach ($array as $value) {
        //    $value['name'];
        //}

        /*
        return [
            '4' => ['id'=>4, 'name'=>'iphone', 'amount'=>1, 'price' => 5.56 ],
            '5' => ['id'=>5, 'name'=>'android', 'amount'=>2, 'price' => 2.56 ]
        ];
        foreach ($array as $key=>$value) {
            $value['name'];
        }
        */
    }




}
