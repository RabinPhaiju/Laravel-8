@extends('layout')
@section('content')
<div class="container custom-search">
   
        <div class="col-sm-4 ">
            <a href="#">Filter</a>
            
        </div>
        <div class="col-sm-4 custom-search1">
            <h3>Search Results</h3>
        @foreach ($products as $product)
        <div class="search_item">

            <a href="/getproduct/{{$product['id']}}">
                <img class="product-image" src={{$product->gallery}} alt={{$product->name}}>>
                <h2>{{$product->name}}</h2>
            </a>
            <h3>Price : {{$product->price}}</h3>
            <h4>Description : {{$product->description}}</h4>
        </div>
        
        @endforeach
    </div>
</div>
@endsection

