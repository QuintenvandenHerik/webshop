@extends('layouts.app')

@section('content')
    <div class="content" style="margin: auto;
  width: 50%; text-align: center;">
        <h1>Products</h1>
        <div class="products">
            @foreach ($products as $product)
                <a href="#" class="product" style="margin: auto;
  width: 200px; height: 200px; text-align: center; border: black; border-style: solid; display: inline-block; margin: 10px; text-decoration: none; color: black;">
                    <p>{{ $product->name }} background</p>
                    <img src="https://picsum.photos/id/{{ $product->id }}/194/125" style="width: 194px; height: 125px;"></img>
                    <p>€{{ $product->price }}</p>
                </a>
            @endforeach
        </div>
        <div style="display: -webkit-inline-box;">{{ $products->links() }}</div>
    </div>
@endsection