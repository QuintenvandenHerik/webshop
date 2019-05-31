@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Shipping</h1>
    <form action="{{action('ProductController@order')}}" method="post">
        <div class="form-row">
            <div class="col-md-6 mb-3">
                <label for="validationServer033">City</label>
                <input type="text" class="form-control" id="validationServer033" placeholder="City" required>
            </div>
            <div class="col-md-3 mb-3">
                <label for="validationServer043">State</label>
                <input type="text" class="form-control" id="validationServer043" placeholder="State" required>
            </div>
            <div class="col-md-3 mb-3">
                <label for="validationServer053">Zip</label>
                <input type="text" class="form-control" id="validationServer053" placeholder="Zip" required>
            </div>
        </div>
        <div class="form-group">
            <div class="custom-control custom-checkbox">
                <input type="checkbox" class="custom-control-input" id="invalidCheck33" required>
                <label class="custom-control-label" for="invalidCheck33">Agree to terms and conditions</label>
            </div>
            <div class="invalid-feedback">You must agree before submitting.</div>
        </div>
        <button class="btn btn-primary" type="submit">Place Order</button>
    </form>
</div>
@endsection
