@extends('layout')
@section('content')
<div class="container col-sm-6">
<div class="my-4 py-4">
  @if (Session::has('loginfail'))
  <div class="alert alert-warning alert-dismissible fade show" role="alert">
      <strong></strong><h6 style="color:red">{{Session::get('loginfail')}}</h6>
      <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span>
      </button>
  </div>
  @endif
            <form method="POST" action="/login">
              @csrf
                <div class="form-group">
                  <label for="exampleInputEmail1">Email address</label>
                  <input type="email" class="form-control" id="exampleInputEmail1" name="email" aria-describedby="emailHelp" placeholder="Enter email">
                  <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
                </div>
                <div class="form-group">
                  <label for="exampleInputPassword1">Password</label>
                  <input type="password" class="form-control" id="exampleInputPassword1" name="password" placeholder="Password">
                </div>
                <div class="form-check">
                  <input type="checkbox" class="form-check-input" id="exampleCheck1">
                  <label class="form-check-label" for="exampleCheck1">Remember this Computer. </label>
                  <label for="signup">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Don't have account<a href="/signup"> Signup!</a></label>
                </div>
                <button type="submit" class="btn btn-primary col-sm-3">Login</button>
              </form>
            </div>
</div>
@endsection

