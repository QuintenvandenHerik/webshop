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
        // zoek of id al in sessie zit en zo ja, haal op
        // tel quantity op bij bestaande hoeveelheid (als er al iets in de sessie stond)
        // sla nieuwe hoeveelheid terug op in de sessie en in $this->cartItems   
        // session('cartItems') = $cartItems;
        // $item = [];
        // $item[$productId] = ['quantity' => $quantity, 'name' => $name, 'price' => $price];
        //array_merge($this->cartItems[$productId] = ['quantity' => 1, 'name' => $name, 'price' => $price]);
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

        //dd(session()->get('cartItems'));

        foreach(session()->get('cartItems') as $key=>$item) {
            $count = $count + $item['quantity'];
        }

        return $count;
   }
}
