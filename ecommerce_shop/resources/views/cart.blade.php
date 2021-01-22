@extends('layout')
@section('content')
<div class="container">
    <div class="container">
        <a class="btn btn-primary m-2" href="/">Go Back</a>
    </div>
@foreach ($products as $product)
    <div class="row m-2 cart-list-divider py-2">
        <div class="col-sm-4">
<img class="product-image" src={{$product->gallery}} alt={{$product->name}}>
        </div>
        <div class="col-sm-6 ">
           
            <h3>{{$product->name}}</h3>
            <h5>Price : {{$product->price}}</h5>
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
               <br>
                <button class="btn btn-success">Buy Now</button>
            </div>
                    </div>
    </div>
@endforeach
</div>
@endsection

