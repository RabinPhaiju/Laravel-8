@extends('layout')
@section('content')
<div class="container col-sm-6">
    <h4>Address : {{$users}}</h4>
    <br>
    <div>
        <form action="/insertOneToOne" method="POST">
            @csrf
            <input type="text" name="address" placeholder="new address" required>
            <button class="button" type="submit">Insert</button>
        </form>
    </div>
    <br>
    <div>
        <form action="/updateOneToOne" method="POST">
            @csrf
            <input type="text" name="address" placeholder="new address" required>
            <button class="button" type="submit">Update</button>
        </form>
    </div>
    <br>
    <a class="button" href="/deleteOneToOne">Delete One To One</a>

</div>
@endsection

