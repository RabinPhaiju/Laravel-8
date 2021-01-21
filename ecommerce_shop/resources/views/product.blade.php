@extends('layout')
@section('content')
<div class=" custom_product">
    <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
        <ol class="carousel-indicators">
          <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
          <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
          <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
        </ol>
        <div class="carousel-inner">
          @foreach ($product as $item)
          <div class="carousel-item {{$item['id']==1?'active':''}}">
            <img class="d-block w-100 p-2 slider-img" src={{$item->gallery}} alt="Second slide">
            <div class="carousel-caption d-none d-md-block">
                <h5>{{$item->category}}</h5>
                <p>{{$item->description}}</p>
              </div>
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
</div>
@endsection

