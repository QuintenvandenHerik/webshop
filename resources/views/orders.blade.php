@extends('layouts.app')

@section('content')
<link href="//netdna.bootstrapcdn.com/bootstrap/3.1.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//netdna.bootstrapcdn.com/bootstrap/3.1.0/js/bootstrap.min.js"></script>
<script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
<!------ Include the above in your HEAD tag ---------->

<div class="row shop-tracking-status">
    
    <div class="col-md-12">
        @foreach($orders as $order)
            <?php $order['cart'] = unserialize($order['cart']);?>
            <div class="well">
        
                <h4>Your order status:</h4>
    
                <ul class="list-group">
                    <li class="list-group-item">
                        <span class="prefix">Order:</span>
                        @foreach($order['cart'] as $product)
                            <span class="label label-info">{{ $product['name'] }} | €{{ $product['price'] }} × {{ $product['quantity'] }}</span>
                        @endforeach
                    </li>
                    <li class="list-group-item">
                        <span class="prefix">Date created:</span>
                        <span class="label label-success">{{ $order['created_at'] }}</span>
                    </li>
                    <li class="list-group-item">
                        <span class="prefix">User:</span>
                        <span class="label label-default">{{ Auth::user()->name }}</span>
                    </li>
                </ul>
    
                <div class="order-status">
    
                    <div class="order-status-timeline">
                        <!-- class names: c0 c1 c2 c3 and c4 -->
                        <div class="order-status-timeline-completion c<?php echo rand(0, 4); ?>"></div>
                    </div>
    
                    <div class="image-order-status image-order-status-new active img-circle">
                        <span class="status">Requested</span>
                        <div class="icon"></div>
                    </div>
                    <div class="image-order-status image-order-status-active active img-circle">
                        <span class="status">Vallidating Payment</span>
                        <div class="icon"></div>
                    </div>
                    <div class="image-order-status image-order-status-intransit active img-circle">
                        <span class="status">Transferring Products</span>
                        <div class="icon"></div>
                    </div>
                    <div class="image-order-status image-order-status-delivered active img-circle">
                        <span class="status">Transferred Products</span>
                        <div class="icon"></div>
                    </div>
                    <div class="image-order-status image-order-status-completed active img-circle">
                        <span class="status">Completed Order</span>
                        <div class="icon"></div>
                    </div>
    
                </div>
            </div>
        @endforeach
    </div>

</div>
@endsection
