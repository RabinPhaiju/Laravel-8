@extends('layout')
@section('content')
<div class="container">
    <div class="container row cart-list-divider py-2">
        <div class="col-sm-10 ">
            <h4>My Products</h4>
        </div>
        <div class="col-sm-2 ">
            <a class="btn btn-primary m-2" href="#">Add Products</a>
        </div>
    </div>
    
    @if (count($products)==0)
        <p>Add new Products
            <a href="#">Add</a>
        </p>
    @endif
@foreach ($products as $product)
    <div class="row m-2 cart-list-divider py-2">
        <div class="col-sm-4">
<img class="product-image" src={{$product->gallery}} alt={{$product->name}}>
        </div>
        <div class="col-sm-6 ">
           
            <h3>{{$product->name}}</h3>
            <h5>Price : Rs. {{$product->price}}</h5>
            <h5>Description : {{$product->description}}</h5>
            <h5>Category : {{$product->category}}</h5>
            
        </div>
        <div class="col-sm-2 ">
            <div class="product-buttons">
                <a class="btn btn-warning" href="#">Update</a>
            </div>
        </div>
    </div>
@endforeach

</div>
@endsection

