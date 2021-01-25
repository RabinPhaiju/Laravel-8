@extends('layout')
@section('content')
<div class="container col-sm-6">
    <h4>User posts</h4>
    @foreach ($users as $user)
        <p> {{$user->id}}.{{$user->title}} -- {{$user->body}} 
            <a class="button" href="/deleteOneToMany/{{$user->id}}">Delete One To Many</a></p>
    @endforeach
    @if (count($users)==0)
        <h6>Empty posts</h6>
    @endif
    <br>
    <div>
        <form action="/insertOneToMany" method="POST">
            @csrf
            <input type="text" name="title" placeholder="title" required>
            <input type="text" name="body" placeholder="body" required>
            <button class="button" type="submit">Insert</button>
        </form>
    </div>
    <br>
    <div>
        <form action="/updateOneToMany" method="POST">
            @csrf
            <input type="number" placeholder="post id" required name="id">
            <input type="text" name="title" placeholder="new title" required>
            <input type="text" name="body" placeholder="new body" required>
            <button class="button" type="submit">Update</button>
        </form>
    </div>
    <br>

</div>
@endsection

