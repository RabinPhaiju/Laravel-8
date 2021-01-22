@extends('layout')
@section('content')
<div class="container">
    <h4>My Orders</h4>
@foreach ($products as $product)
    <div class="row m-2 cart-list-divider py-2">
       
        <div class="col-sm-4">
<img class="product-image" src={{$product->gallery}} alt={{$product->name}}>
        </div>
        <div class="col-sm-6 ">
           
            <h3>{{$product->name}}</h3>
            <h6>Price : Rs. {{$product->price}}</h6>
            <h6>Delivery : {{$product->status}}</h6>
            <h6>Payment Status: {{$product->payment_status}}</h6>
            <h6>Payment Method : {{$product->payment_method}}</h6>
        </div>
        <div class="col-sm-2 ">
            <div class="product-buttons">
                <form action="/removeFromCart" method="POST">
                    @csrf
                    <input type="hidden" name="product_id" value="">
                    <button class="btn btn-danger" type="submit">Cancel</button>
                </form>
            </div>
                    </div>
    </div>
@endforeach

</div>
@endsection

