@extends('layout')
@section('content')
<div class="container">

    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Update Product</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <form action="/updateProduct" method="POST" enctype="multipart/form-data">
            @csrf
            <input type="number" name="id" value={{$product->id}} hidden>
            <div class="form-group">
              <label for="recipient-name" class="col-form-label">Name:</label>
              <input type="text" class="form-control" value={{$product->name}} name="name" required placeholder="Enter Name">
            </div>
            <div class="form-group">
                <label for="recipient-name" class="col-form-label">Price:</label>
                <input type="text" class="form-control" value={{$product->price}} name="price" required placeholder="Enter Price">
              </div>
              <div class="form-group">
                <label for="recipient-name" class="col-form-label">Category:</label>
                <input type="text" class="form-control" value={{$product->category}} name="category" required placeholder="Enter Category">
              </div>
              <div class="form-group row">
                    <div class="col-sm-6 ">
                        <label for="recipient-name" class="col-form-label">Photo:</label>
                        <input onchange="loadFile(event)" accept="image/*" id="file" type="file" class="form-control" name="gallery" placeholder="Photo">
                    </div>
                    <div class="col-sm-6">
                            <img id="output" width="200px" src="/storage/{{$product->gallery}}" style="overflow: hidden; display:block;" height="100px" src="" class="rounded-sm border">
                    </div>
              </div>
            <div class="form-group">
              <label for="message-text" class="col-form-label">Description:</label>
              <textarea class="form-control" name="description" required placeholder="Enter Description">{{$product->description}}</textarea>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary">Update</button>
              </div>
          </form>
        </div>
        
      </div>
    </div>

</div>
@endsection

