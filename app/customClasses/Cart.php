<?php

namespace App\customClasses;


use App\product;

class Cart
{
    public $cartItems;

    public function Add($id, $quantity) {
        $cartItems = [];
        $item = [];
        array_push($item, $id, $quantity);
        array_push($cartItems, $item);
    }

    public function content() {
        return $cartItems;
    }


}
