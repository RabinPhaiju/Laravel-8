<x-header data='Login Form'/>

<h1>Login Form</h1>


<form action="loginAuth" method='POST'>
@csrf
<input type="text" name='username' placeholder='enter user name' value={{ old('username')}}>
<br>
<span style="color:red">
@error('username'){{$message}}@enderror
</span>
<br>
<input type="text" name='password' placeholder='enter password'>
<br>
<span style="color:red">
@error('password'){{$message}}@enderror
</span>
<br>
<button type='submit'>Login</button>
</form>