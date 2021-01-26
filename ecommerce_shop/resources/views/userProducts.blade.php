@extends('layout')
@section('content')
<div class="container">
    <div class="container row cart-list-divider py-2">
        <div class="col-sm-10 ">
            <h4>My Products</h4>
        </div>
        <div class="col-sm-2 ">
            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal" data-whatever="@mdo">Add Product</button>

        </div>
    </div>
    
    @if (count($products)==0)
    <p>
        <a href="#" data-toggle="modal" data-target="#exampleModal" data-whatever="@mdo">Add</a>     
        new products
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
                <a class="btn btn-warning" href="#">Update</a>
            </div>
        </div>
    </div>
@endforeach
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">New Product</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <form action="/addProduct" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
              <label for="recipient-name" class="col-form-label">Name:</label>
              <input type="text" class="form-control" name="name" required placeholder="Enter Name">
            </div>
            <div class="form-group">
                <label for="recipient-name" class="col-form-label">Price:</label>
                <input type="text" class="form-control" name="price" required placeholder="Enter Price">
              </div>
              <div class="form-group">
                <label for="recipient-name" class="col-form-label">Category:</label>
                <input type="text" class="form-control" name="category" required placeholder="Enter Category">
              </div>
              <div class="form-group row">
                    <div class="col-sm-8 ">
                        <label for="recipient-name" class="col-form-label">Photo:</label>
                        <input onchange="loadFile(event)"  accept="image/*" id="file" type="file" class="form-control" name="photo" required placeholder="Photo">
                    </div>
                    <div class="col-sm-4">
                            <img id="output" style="overflow: hidden; display:block;" height="100px" src="" class="rounded-sm border">
                    </div>
              </div>
            <div class="form-group">
              <label for="message-text" class="col-form-label">Description:</label>
              <textarea class="form-control" name="description" required placeholder="Enter Description"></textarea>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary">Add Products</button>
              </div>
          </form>
        </div>
        
      </div>
    </div>
  </div>

</div>
@endsection

