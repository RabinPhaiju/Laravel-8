<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <title>E-commerce</title>
</head>
<body>
    <div class="main-container">
    {{View::make('header')}}
    {{-- <div class="container"> --}}
        @yield('content')
    {{-- </div> --}}
    {{View::make('footer')}}
</div>
</body>
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
<style>
    a{
        text-decoration: none;
    }
    .slider-img{
        width: 100%;
        height: 50vh !important;
    }
    .custom-product{
        clear:both;
    }
    .carousel-caption{
        background-color: rgba(154, 158, 158, 0.149);
    }
    .trending-container{
        background-color: rgba(0, 0, 0, 0.048);
        margin: 2rem;
    }
    .trending-wrapper{
        display: flex;
    }
    .trending-item{
        width: 20%;
    }
    .trending-img{
        height: 100px;
        margin: 4px;
    }
    .product-image{
        height: 200px;
    }
    .product-buttons{
        margin: 20px;
    }
</style>
</html>