@extends('layout')
@section('content')
<div class="container col-sm-6">
    <h4>User role</h4>
    @foreach ($users as $user)
        <p> {{$user->id}}.{{$user->name}} user_id:{{$user->pivot->user_id}}  role_id:{{$user->pivot->role_id}}
            <a class="button" href="/deleteManyToMany/{{$user->id}}">Delete Many To Many</a></p>
    @endforeach
    @if (count($users)==0)
        <h6>Empty posts</h6>
    @endif
    <br>
    <div>
        <form action="/insertManyToMany" method="POST">
            @csrf
            <input type="text" name="role" placeholder="role" required>
            <button class="button" type="submit">Insert</button>
        </form>
    </div>
    <br>
    <div>
        <form action="/updateManyToMany" method="POST">
            @csrf
            <input type="number" placeholder="id" required name="id">
            <input type="text" name="newRole" placeholder="new role" required>
            <button class="button" type="submit">Update</button>
        </form>
    </div>
    <br>

</div>
@endsection

