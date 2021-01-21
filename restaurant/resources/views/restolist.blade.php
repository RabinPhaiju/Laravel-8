@extends('layout')

@section('content')
    <h1>Restaurant List page.</h1>
    @if (Session::has('name'))

<div class="alert alert-success alert-dismissible fade show" role="alert">
    <strong>Hey User</strong><span style="color:green">, {{Session::get('name')}} get added !</span>
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
      <span aria-hidden="true">&times;</span>
    </button>
  </div>
@endif
    <table class="table table-striped table-bordered table-hover">
        <thead>
          <tr>
            <th scope="col">#</th>
            <th scope="col">Name</th>
            <th scope="col">Email</th>
            <th scope="col">Address</th>
          </tr>
        </thead>
        <tbody>
            @foreach ($data as $item)
            <tr>
                <th scope="row">{{$item->id}}</th>
                <td>{{$item->name}}</td>
                <td>{{$item->email}}</td>
                <td>{{$item->address}}</td>
              </tr>
        @endforeach
         
        </tbody>
      </table>
@endsection
