@extends('layouts.app')


@section('content')
<div class="container">
    <div class="row">
        <div class="col-sm-12 col-md-10 col-md-offset-1">
            <table class="table table-hover">
                <thead>
                    <tr>
                        <th>Product</th>
                        <th>Quantity</th>
                        <th class="text-center">Price</th>
                        <th class="text-center">Total</th>
                        <th> </th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($cartItems as $key => $product)
                    <tr>
                        <td class="col-sm-8 col-md-6">
                        <div class="media">
                            <a class="thumbnail pull-left" href="#"> <img class="media-object" src="https://picsum.photos/id/{{ $key }}/194/125" style="width: 72px; height: 72px;"> </a>
                            <div class="media-body">
                                <h4 class="media-heading"><a href="#">{{$product['name']}}</a></h4>
                                <h5 class="media-heading"> category <a href="#">Category</a></h5>
                            </div>
                        </div></td>
                        <td class="col-sm-1 col-md-1" style="text-align: center">
                        <input type="number" class="form-control" value="{{$product['quantity']}}">
                        </td>
                        <td class="col-sm-1 col-md-1 text-center"><strong>€{{$product['price']}}</strong></td>
                        <td class="col-sm-1 col-md-1 text-center"><strong>€{{$product['price'] * $product['quantity']}}</strong></td>
                        <td class="col-sm-1 col-md-1">
                        <a type="button" class="btn btn-danger" href="{{ route('cart.destroy', ['id' => $key]) }}">
                            <span class="glyphicon glyphicon-remove"></span> Remove
                        </a></td>
                    </tr>
                    @endforeach
                    <tr>
                        <td>   </td>
                        <td>   </td>
                        <td>   </td>
                        <td><h5>Subtotal</h5></td>
                        <td class="text-right"><h5><strong>€<?php echo number_format($totalPrice['subTotal'], 2);?></strong></h5></td>
                    </tr>
                    <tr>
                        <td>   </td>
                        <td>   </td>
                        <td>   </td>
                        <td><h5>Tax (21%)</h5></td>
                        <td class="text-right"><h5><strong>€<?php echo number_format($totalPrice['tax'], 2);?></strong></h5></td>
                    </tr>
                    <tr>
                        <td>   </td>
                        <td>   </td>
                        <td>   </td>
                        <td><h3>Total</h3></td>
                        <td class="text-right"><h3><strong>€<?php echo number_format($totalPrice['total'], 2);?></strong></h3></td>
                    </tr>
                    <tr>
                        <td>   </td>
                        <td>   </td>
                        <td>   </td>
                        <td>
                        <a type="button" class="btn btn-default" href="{{ route('shop') }}">
                            <span class="glyphicon glyphicon-shopping-cart"></span> Continue Shopping
                        </a></td>
                        <td>
                        <button type="button" class="btn btn-success">
                            Checkout <span class="glyphicon glyphicon-play"></span>
                        </button></td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection