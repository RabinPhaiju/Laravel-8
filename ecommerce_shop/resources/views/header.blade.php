<?php
use App\HTTP\Controllers\ProductController;
$total_item = ProductController::getCart();
?>

<div class="px-2 custom-header">
<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <a class="navbar-brand" href="/">Rabs Store</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
  
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav mr-auto">
        <li class="nav-item active">
          <a class="nav-link" href="/myorder">Orders <span class="sr-only">(current)</span></a>
        </li>
        
        <form class="form-inline my-2 my-lg-0" method="POST" action="/searchproduct">
          @csrf
            <input class="form-control mr-sm-2 search-box" type="search" name="search" placeholder="Search" aria-label="Search">
            <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
          </form>
      </ul>
      @if (Session::has('user'))
        <a class="nav-link" href="/cart">Cart ({{$total_item}})</a>
        @endif
     @if (Session::has('user'))
      <div class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          {{Session::get('user')['name']}}
        </a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
          <a class="dropdown-item" href="/profile">Profile</a>
          @if (Session::get('user')['role']=='admin')
              <a class="dropdown-item" href="/products">Products</a>
          @endif
          <a class="dropdown-item" href="/logout">Logout</a>
        </div>
      </div>
    @else
    <a class="nav-link" href="/login">Login</a>
    <a class="nav-link" href="/signup">Singup</a>
      @endif
    </div>
  </nav>
  </div>