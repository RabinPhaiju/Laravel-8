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
                <button class="btn btn-primary">Add to Cart</button>
                <button class="btn btn-success">Buy Now</button>
            </div>
        </div>
    </div>
</div>
@endsection

