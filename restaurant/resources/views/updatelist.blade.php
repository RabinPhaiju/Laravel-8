@extends('layout')

@section('content')
    <h1>Update Restaurant page.</h1>
    <div class="col-sm-6">
    <form method="POST" action="/list/update">
        @csrf
        <input type="text" name="id" value={{$data->id}} hidden>
        <div class="form-group row">
          <label for="inputname" class="col-sm-2 col-form-label">Name</label>
          <div class="col-sm-10">
            <input type="text" value={{$data->name}} class="form-control" id="inputname" name="name" placeholder="Name">
          </div>
        </div>

        <div class="form-group row">
            <label for="inputEmail" class="col-sm-2 col-form-label">Email</label>
            <div class="col-sm-10">
              <input type="email"  value={{$data->email}} class="form-control" id="inputEmail" name="email" placeholder="Email">
            </div>
          </div>

          <div class="form-group row">
            <label for="inputAddress" class="col-sm-2 col-form-label">Address</label>
            <div class="col-sm-10">
              <input type="text" value={{$data->address}} class="form-control" id="inputAddress" name="address" placeholder="Address">
            </div>
          </div>
   
        <div class="form-group row">
          <div class="col-sm-10">
            <button type="submit" class="btn btn-primary">Update</button>
          </div>
        </div>
      </form>
    </div>
  
@endsection
