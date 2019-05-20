@extends('layouts.app')

@section('content')
    <div class="content" style="margin: auto;
  width: 50%; text-align: center;">
        <h1>Products</h1>
        <div class="products">
            @foreach ($products as $product)
                <a href="{{ route('shop.addToCart', ['id' => $product->id]) }}" class="product" style="margin: auto; width: 200px; height: 200px; text-align: center; border: black; border-style: solid; display: inline-block; margin: 10px; text-decoration: none; color: black;">
                    <p>{{ $product->name }} background</p>
                    <img src="https://picsum.photos/id/{{ $product->id }}/194/125" style="width: 194px; height: 125px;"></img>
                    <p>€{{ number_format($product->price, 2) }}</p>
                </a>
            @endforeach
        </div>
        <div style="display: -webkit-inline-box;">{{ $products->links() }}</div>
    </div>
@endsection

@section('cart')
<li class="nav-item dropdown">
    <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre onclick="">
        My Cart <span class="caret"></span>
    </a>
    <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">        
        <?php foreach(Cart::content() as $row) :?>
            <div class="cartProduct">
                <p><strong><?php echo $row->name; ?></strong></p>
                <p><?php echo $row->qty?> × $<?php echo number_format($row->price, 2); ?></p>
            </div>
        <?php endforeach;?>
        <div>
            <p colspan="2">&nbsp;</p>
            <p>Subtotal</p>
            <p><?php echo number_format(Cart::subtotal(), 2); ?></p>
        </div>
        <div>
            <p colspan="2">&nbsp;</p>
            <p>Tax</p>
            <p><?php echo number_format(Cart::tax(), 2); ?></p>
        </div>
        <div>
            <p colspan="2">&nbsp;</p>
            <p>Total</p>
            <p><?php echo number_format(Cart::total(), 2); ?></p>
        </div>
    </div>
</li>
@endsection