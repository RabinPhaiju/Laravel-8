<div>
    <!-- No surplus words or unnecessary actions. - Marcus Aurelius -->
    <div class="header">
  <a href="#default" class="logo">{{$title}}</a>
  <div class="header-right">
    <a class="active" href="/">Home</a>
    <a href="/date">Date</a>
    <a href="/about/rabin">about page</a>
    <a href="/contact">contacts</a>
    <a href="/collection">User HTTP</a>
    <a href="/memberList">Members</a>
    <a href="/user/new name?age=20">User DB</a>
    <a href="/user/new name?age=10">No user</a>
    <a href="/login">Login</a>
    <a href="/profile/en" id="profile">{{session()->has('username')?session('username'):"Profile"}}</a>
    <a href="/subscribe">Subscribe</a>
    <a href="/loginForm">Login Form</a>
    <a href="/noaccess">No Access</a>
    <a href="/uploadFile">File Upload</a>
    <a href="/oneToOne">One to One</a>
    <a href="/oneToMany">One to Many</a>
    <a href="/manyToMany">Many to Many</a>
    <a href="/hasOneThrough">hasOneThrough</a>
    <a href="/hasManyThrough">hasManyThrough</a>

  </div>
</div>
</div>

<style>
* {box-sizing: border-box;}
#profile{
  background-color: rgb(240, 158, 196);
}

body { 
  margin: 0;
  font-family: Arial, Helvetica, sans-serif;
}

.header {
  overflow: hidden;
  background-color: #f1f1f1;
  padding: 20px 10px;
}

.header a {
  float: left;
  color: black;
  text-align: center;
  padding: 12px;
  text-decoration: none;
  font-size: 18px; 
  line-height: 25px;
  border-radius: 4px;
}

.header a.logo {
  font-size: 25px;
  font-weight: bold;
}

.header a:hover {
  background-color: #ddd;
  color: black;
}

.header a.active {
  background-color: dodgerblue;
  color: white;
}

.header-right {
  float: right;
}

@media screen and (max-width: 500px) {
  .header a {
    float: none;
    display: block;
    text-align: left;
  }
  
  .header-right {
    float: none;
  }
}
</style>