<x-header data="Profile Page"/>


<h2>Hello {{session('username')}}</h2>

<div class="profile">
<div id="nav">
    <h3>{{__('profile.welcome')}}</h3>
    <a href="#">{{__('profile.about')}}</a><br>
    <a href="#">{{__('profile.list')}}</a><br>
    <a href="#">{{__('profile.contact')}}</a>
    <h4><a href="/logout">Logout</a></h4>
</div>
<div id="form">
    <h3>Add new user</h3>
    <form action="addUser" method="POST">
      @csrf
      <input type="text" name="firstname" placeholder="Enter your name">
      <br><br>
      <input type="email" name="email" placeholder="Enter Email">
      <br><br>
      <input type="text" name="location" placeholder="Enter Location">
      <br><br>
      <input type="number" name="contact" placeholder="Enter Contact">
      <br><br>
      <button class="button" type="submit">Add User</button>
    </form>
  </div>
</div>

  <style>

..button{
    background-color: rgb(240, 135, 231);
}
.profile{
    display: flex;
}
#form,#nav{
    margin: 5px;
}
  </style>