<?php

namespace App\Http\Controllers;

use App\product;
use App\customClasses\Cart;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    private $cart;

    public function __construct() {
        $this->cart = new Cart();
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $products = Product::paginate(12);
        $cartItems = $this->cart->getItems();
        $cartCount = $this->cart->getCount();
        $totalPrice = $this->cart->calculatePrice();
        $data = [
            'products' => $products,
            'cartItems' => $cartItems,
            'cartCount' => $cartCount,
            'totalPrice' => $totalPrice
        ];

        return view('shop', $data);
    }

    public function cartIndex()
    {
        $cartItems = $this->cart->getItems();
        $totalPrice = $this->cart->calculatePrice();
        $data = [
            'cartItems' => $cartItems,  
            'totalPrice' => $totalPrice
        ];

        return view('cart', $data);
    }

    public function addToCart($productId)
    {
        $product = Product::where('id', $productId)->first();
        $this->cart->Add($productId, $product->name, $product->price);

        return redirect()->back();
    }

    public function removeFromCart($productId)
    {
        $this->cart->destroy($productId);

        return redirect()->back();
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\product  $product
     * @return \Illuminate\Http\Response
     */
    public function show(product $product)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\product  $product
     * @return \Illuminate\Http\Response
     */
    public function edit(product $product)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\product  $product
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, product $product)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\product  $product
     * @return \Illuminate\Http\Response
     */
    public function destroy(product $product)
    {
        //
    }
}
