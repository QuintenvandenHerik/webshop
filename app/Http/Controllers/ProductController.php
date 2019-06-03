<?php

namespace App\Http\Controllers;

use App\product;
use App\Order;
use App\customClasses\Cart;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


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
    public function index($category)
    {
        if ($category == 'all') {
            $products = Product::paginate(12);
        } else {
            $products = Product::where('category', '=', $category)->paginate(12);
        }
        $cartItems = $this->cart->getItems();
        $cartCount = $this->cart->getCount();
        $totalPrice = $this->cart->calculatePrice();
        $data = [
            'products' => $products,
            'cartItems' => $cartItems,
            'cartCount' => $cartCount,
            'totalPrice' => $totalPrice,
        ];

        return view('shop', $data);
    }

        public function productIndex($productId)
    {
        $product = Product::where('id', $productId)->first();
        $data = [
            'product' => $product,
        ];

        return view('product', $data);
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

        return redirect(route('shop', ['category' => 'all']));
    }

    public function removeFromCart($productId)
    {
        $this->cart->destroy($productId);

        return redirect()->back();
    }

    public function changeQuantity($productId)
    {
        if ($_POST['quantity'] > 0) {
            $this->cart->edit($productId, $_POST);
            return redirect()->back();
        } else {
            return redirect(route('cart.destroy', ['id' => $productId]));
        }
    }

    public function checkout()
    {
        $this->cart->saveCart();
        $this->cart->destroyCart();

        return view('home');
    }

    public function ordersIndex()
    {
        $order = Order::where('user_id', Auth::user()->id)->get();
        $data= [
            'orders' => $order
        ];

        return view('orders', $data);
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
