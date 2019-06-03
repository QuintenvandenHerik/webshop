@extends('layouts.app')

@section('content')
<link href="//netdna.bootstrapcdn.com/bootstrap/3.1.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//netdna.bootstrapcdn.com/bootstrap/3.1.0/js/bootstrap.min.js"></script>
<script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
<!------ Include the above in your HEAD tag ---------->

<div class="container-fluid">
    <div class="row">
        <div class="col-md-4"> 
            <a class="btn btn-default" href="{{ route('shop', ['category' => 'all']) }}">«</a>
        </div>
    </div>
    <br>
    <div class="row">
        <div class="col-md-4"> 
            <div class="row">
                <div class="col-md-12">
                    <img src="http://webshop.local/image/background{{ $product->id }}.jpg" class="img-rounded" alt="Cinque Terre" width="210" height="210">    
                </div>
            </div>
        </div>
        <div class="col-md-8">
            <h3 class="product-title">{{ $product->name }}</h3>
                <div class="product-desc">{{ $product->category }}</div>
                <br>
                <div class="product-desc">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
                    tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
                    quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
                    consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
                    cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non
                    proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</div>
                <hr>
                <div class="product-price">€{{ $product->price }}</div>
        </div>   
    </div>
    <br>
    <div class="row">
        <div class="col-md-1 col-md-offset-10">
            <a href="{{ route('shop.addToCart', ['id' => $product->id]) }}" type="button" class="btn btn-success">Add To Cart</a>
        </div>
    </div>
</div>
@endsection
