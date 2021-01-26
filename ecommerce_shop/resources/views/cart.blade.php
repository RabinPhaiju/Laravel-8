@extends('layout')
@section('content')
<div class="container">
    <div class="container row cart-list-divider">
        <div class="col-sm-10 ">
            <a class="btn btn-primary m-2" href="/">Go Back</a>
        </div>
        <div class="col-sm-2 ">
            <a class="btn btn-success m-2" href="/order">Buy Now</a>
        </div>
    </div>
    <h4>My Cart</h4>
    @if (count($products)==0)
        <p>Cart is empty. Add products to Cart.
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
            <h5>Price : Rs. {{$product->price}}</h5>
            <h5>Description : {{$product->description}}</h5>
            <h5>Category : {{$product->category}}</h5>
            
        </div>
        <div class="col-sm-2 ">
            <div class="product-buttons">
                <form action="/removeFromCart" method="POST">
                    @csrf
                    <input type="hidden" name="product_id" value={{$product->cart_id}}>
                    <button class="btn btn-warning" type="submit">Remove</button>
                </form>
            </div>
                    </div>
    </div>
@endforeach

</div>
@endsection

