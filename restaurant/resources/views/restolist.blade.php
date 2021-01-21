@extends('layout') @section('content')
<h1>Restaurant List page.</h1>
@if (Session::has('name'))

<div class="alert alert-success alert-dismissible fade show" role="alert">
    <strong>Hey User</strong><span style="color:green">, {{Session::get('name')}} get added !</span>
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
      <span aria-hidden="true">&times;</span>
    </button>
</div>
@endif @if (Session::has('delete'))
<div class="alert alert-warning alert-dismissible fade show" role="alert">
    <strong>Hey User</strong><span style="color:rgb(146, 64, 64)">, {{Session::get('delete')}} get deleted !</span>
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
      <span aria-hidden="true">&times;</span>
    </button>
</div>
@endif @if (Session::has('update'))
<div class="alert alert-info alert-dismissible fade show" role="alert">
    <strong>Hey User</strong><span style="color:rgb(111, 118, 211)">, {{Session::get('update')}} get updated !</span>
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
            <th scope="col">Action</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($data as $item)
        <tr>
            <th scope="row">{{$item->id}}</th>
            <td>{{$item->name}}</td>
            <td>{{$item->email}}</td>
            <td>{{$item->address}}</td>
            <th>
                <a href="update/{{$item->id}}" class="btn btn-warning m-1">Edit</a>
                <a href="/list/delete/{{$item->id}}" class="btn btn-danger" onclick="return confirm('Do you want to delete')">Delete</a>
            </th>
        </tr>
        @endforeach

    </tbody>
</table>
@endsection