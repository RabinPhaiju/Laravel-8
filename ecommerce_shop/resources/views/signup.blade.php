@extends('layout')
@section('content')
<div class="container col-sm-6">
<div class="my-4 py-4">
  @if (Session::has('signupfail'))
  <div class="alert alert-warning alert-dismissible fade show" role="alert">
      <strong></strong><h6 style="color:red">{{Session::get('signupfail')}}</h6>
      <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span>
      </button>
  </div>
  @endif
            <form method="POST" action="/signup">
              @csrf
              <div class="form-group">
                <label for="exampleInputName">Name</label>
                <input type="text" required class="form-control" id="exampleInputName" name="name" aria-describedby="nameHelp" placeholder="Enter full name">
              </div>
                <div class="form-group">
                  <label for="exampleInputEmail">Email address</label>
                  <input type="email" required class="form-control" id="exampleInputEmail" name="email" aria-describedby="emailHelp" placeholder="Enter email">
                  <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
                </div>
                <div class="form-group">
                  <label for="exampleInputPassword1">Password</label>
                  <input type="password" required class="form-control" id="exampleInputPassword1" name="password" placeholder="Password">
                </div>
                <div class="form-group">
                    <label for="exampleInputPassword1">Repeat Password</label>
                    <input type="password" required class="form-control" id="exampleInputPassword1" name="repassword" placeholder="Password">
                  </div>
                <div >
                  <label for="signup">Don't have account<a href="/signup"> Signup!</a></label>
                </div>
                <button type="submit" class="btn btn-primary col-sm-3">Signup</button>
              </form>
            </div>
</div>
@endsection

