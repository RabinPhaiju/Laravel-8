@extends('layout')
@section('content')
<div class="container">
    <h4>My Orders</h4>
    @if (count($products)==0)
    <p>Order is empty. Add products to cart first.
        <a href="/">Shop</a>
    </p>
@endif
@foreach ($products as $product)
    <div class="row m-2 cart-list-divider py-2">
       
        <div class="col-sm-6">
<img class="product-image" width="400px" src="/storage/{{$product->gallery}}" alt={{$product->name}}>
        </div>
        <div class="col-sm-4 ">
           
            <h3>{{$product->name}}</h3>
            <h6>Price : Rs. {{$product->price}}</h6>
            <h6>Delivery : {{$product->status}}</h6>
            <h6>Payment Status: {{$product->payment_status}}</h6>
            <h6>Payment Method : {{$product->payment_method}}</h6>
        </div>
        <div class="col-sm-2 ">
            <div class="product-buttons">
                <form action="/removeFromOrder" method="POST">
                    @csrf
                    <input type="hidden" name="product_id" value={{$product->id}}>
                    <button class="btn btn-danger" type="submit">Cancel Order</button>
                </form>
            </div>
                    </div>
    </div>
@endforeach

</div>
@endsection

