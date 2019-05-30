@extends('layouts.app')

@section('content')
    <div class="content" style="margin: auto;
  width: 50%; text-align: center;">
        <h1>Products</h1>
        <div class="products">
            <div align="center">
                <a class="btn btn-default filter-button" href="{{route('shop')}}">All</a>
                <a class="btn btn-default filter-button" href="{{route('shop.category', ['category' => 'Nature'])}}">Nature</a>
                <a class="btn btn-default filter-button" href="{{route('shop.category', ['category' => 'Technology'])}}">Technology</a>
                <a class="btn btn-default filter-button" href="{{route('shop.category', ['category' => 'Metal'])}}">Metal</a>
                <a class="btn btn-default filter-button" href="{{route('shop.category', ['category' => 'Abstract'])}}">Abstract</a>
                <a class="btn btn-default filter-button" href="{{route('shop.category', ['category' => 'Miscellaneous'])}}">Miscellaneous</a>
            </div>
            <br/>
            @foreach ($products as $product)
                <a href="{{ route('shop.addToCart', ['id' => $product->id]) }}" class="product" style="margin: auto; width: 200px; height: 200px; text-align: center; border: black; border-style: solid; display: inline-block; margin: 10px; text-decoration: none; color: black;">
                    <p>{{ $product->name }} background</p>
                    <img src="image/background{{ $product->id }}.jpg" style="width: 194px; height: 125px;"></img>
                    <p>€{{ number_format($product->price, 2) }}</p>
                </a>
            @endforeach
        </div>
        <div style="display: -webkit-inline-box;">{{ $products->links() }}</div>
    </div>
@endsection

@section('cart')
<li class="nav-item dropdown">
     @if(isset($cartItems)) 
    
    <a id="navbarDropdown" class="nav-link" href="" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
        My Cart ({{ $cartCount }})<span class="glyphicon glyphicon-shopping-cart"></span>
    </a>
    <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">     
        @foreach($cartItems as $product)
            <div class="cartProduct">
                <p><strong><?php echo $product['name']; ?></strong></p>
                <p><?php echo $product['quantity']; ?> × €<?php echo number_format($product['price'], 2); ?></p>
            </div>
        @endforeach
        <div class="cartProperties">
            <p colspan="2">&nbsp;</p>
            <p>Subtotal</p>
            <p>€<?php echo number_format($totalPrice['subTotal'], 2);?></p>
        </div>
        <div class="cartProperties">
            <p>Tax</p>
            <p>€<?php echo number_format($totalPrice['tax'], 2);?></p>
        </div>
        <div class="cartProperties">
            <p>Total</p>
            <p>€<?php echo number_format($totalPrice['total'], 2);?></p>
        </div>
        <div class="cartButton">
            <a class="btn btn-info" href="{{ route('cart') }}">Cart</a>
        </div>
    </div>
    @endif
    
</li>
@endsection