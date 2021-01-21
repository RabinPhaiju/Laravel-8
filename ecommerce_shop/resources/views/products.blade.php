@extends('layout')
@section('content')
<div class=" custom_product">
    <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
        <ol class="carousel-indicators">
          @foreach ($product as $item)
          <li data-target="#carouselExampleIndicators" data-slide-to={{$item->id}} class="{{$item['id']==1?'active':''}}"></li>
          @endforeach
        </ol>
        <div class="carousel-inner">
          @foreach ($product as $item)
          <div class="carousel-item {{$item['id']==1?'active':''}}">
            <a href="/getproduct/{{$item['id']}}">
              <img class="d-block w-100 p-2 slider-img" src={{$item->gallery}} alt="Second slide">
              <div class="carousel-caption d-none d-md-block m-4">
                  <h5>{{$item->name}}</h5>
                  <p>{{$item->description}}</p>
                </div>
            </a>
          </div>
          @endforeach
        </div>
        <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
          <span class="carousel-control-prev-icon" aria-hidden="true"></span>
          <span class="sr-only">Previous</span>
        </a>
        <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
          <span class="carousel-control-next-icon" aria-hidden="true"></span>
          <span class="sr-only">Next</span>
        </a>
      </div>
      <div class="trending-container">
        <h3>Trending Products</h3>
        <div class="trending-wrapper">
            @foreach ($product as $item)
            <div class="trending-item">
              <a href="/getproduct/{{$item['id']}}">
          <img class="trending-img" src={{$item->gallery}} alt="Second slide">
          <h5 class="trending-text">{{$item->name}}</h5>
        </a>
            </div>
        @endforeach
      </div>
      </div>
</div>
@endsection

