@extends('layouts.app')

@section('content')
    <div class="content" style="margin: auto;
  width: 50%; text-align: center;">
        <h1>Products</h1>
        <div class="products">
            @foreach ($products as $product)
                <div class="product"style="margin: auto;
  width: 200px; height: 200px; text-align: center; border: black; border-style: solid; display: inline-block; margin: 10px;">
                    <p>{{ $product->name }}</p>
                    <img src="image/ImageComingSoon.png{{-- $product->name }}.jpg--}}" style="width: 125px; height: 125px;"></img>
                    <p>{{ $product->price }}</p>
                </div>
            @endforeach
        </div>
    </div>
@endsection