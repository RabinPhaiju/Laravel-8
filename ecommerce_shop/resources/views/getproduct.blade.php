@extends('layout')
@section('content')
<div class="container">
    <div class="row">
        <div class="col-sm-6 ">
<img class="product-image" src={{$product->gallery}} alt={{$product->name}}>
        </div>
        <div class="col-sm-6 ">
            <a href="/">Go Back</a>
            <h2>{{$product->name}}</h2>
            <h3>Price : {{$product->price}}</h3>
            <h4>Description : {{$product->description}}</h4>
            <h4>Category : {{$product->category}}</h4>
            <div class="product-buttons">
                <form action="/addToCart" method="POST">
                    @csrf
                    <input type="hidden" name="product_id" value={{$product->id}}>
                    <button class="btn btn-primary" type="submit">Add to Cart</button>
                </form>
               <br>
                <button class="btn btn-success">Buy Now</button>
            </div>
        </div>
    </div>
</div>
@endsection

