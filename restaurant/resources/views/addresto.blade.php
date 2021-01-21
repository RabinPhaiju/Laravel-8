@extends('layout')

@section('content')
    <h1>Restaurant add page.</h1>
    <div class="col-sm-6">
    <form method="POST" action="addresto">
        @csrf
        <div class="form-group row">
          <label for="inputname" class="col-sm-2 col-form-label">Name</label>
          <div class="col-sm-10">
            <input type="text" class="form-control" id="inputname" name="name" placeholder="Name">
          </div>
        </div>

        <div class="form-group row">
            <label for="inputEmail" class="col-sm-2 col-form-label">Email</label>
            <div class="col-sm-10">
              <input type="email" class="form-control" id="inputEmail" name="email" placeholder="Email">
            </div>
          </div>

          <div class="form-group row">
            <label for="inputAddress" class="col-sm-2 col-form-label">Address</label>
            <div class="col-sm-10">
              <input type="text" class="form-control" id="inputAddress" name="address" placeholder="Address">
            </div>
          </div>
   
        <div class="form-group row">
          <div class="col-sm-10">
            <button type="submit" class="btn btn-primary">Add</button>
          </div>
        </div>
      </form>
    </div>
  
@endsection
