<?php

namespace App\customClasses;


use App\product;

class Cart
{
    private $cartItems;

    public function __construct() {
        // haal eerder gekozen product ids uit de sessie op en bewaar in lokale array $cartItems
        $this->cartItems = session('cartItems');
    }

    public function Add($productId, $name, $price) {
        if (! is_array($this->cartItems)) {
            $this->cartItems = array();
        }

        if (array_key_exists($productId, $this->cartItems)) {
            $this->cartItems[$productId]['quantity'] ++;
        } else {
            $this->cartItems[$productId] = ['quantity' => 1, 'name' => $name, 'price' => $price];
        }
        
        session(['cartItems' => $this->cartItems]);
    }

    public function getItems() {
        return session()->get('cartItems');
    }

    public function getCount() {
        $count = 0;
        if ( session()->get('cartItems') == null ) return 0;

        foreach(session()->get('cartItems') as $key=>$item) {
            $count = $count + $item['quantity'];
        }

        return $count;
    }

    public function calculatePrice() {
        $subTotal = 0;
        $tax = 0;
        $total = 0;
        if ( session()->get('cartItems') == null ) return 0;
        foreach(session()->get('cartItems') as $key=>$item) {
            $subTotal = $subTotal + ($item['price'] * $item['quantity']);
        }
        $tax = $subTotal * 0.21;
        $total = $subTotal + $tax;
        return array('subTotal' => $subTotal, 'tax' => $tax, 'total' => $total);
    }

    public function destroy($productId) {
        dd(key($this->cartItems[$productId]));
        session(['cartItems' => $this->cartItems]);
    }
}


