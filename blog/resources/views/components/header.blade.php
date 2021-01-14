<div>
    <!-- No surplus words or unnecessary actions. - Marcus Aurelius -->
    <div class="header">
  <a href="#default" class="logo">{{$title}}</a>
  <div class="header-right">
    <a class="active" href="/">Home</a>
    <a href="/about/rabin">about page</a>
    <a href="/contact">contacts</a>
    <a href="/collection">User List</a>
    <a href="/user/new name?age=20">User</a>
    <a href="/user/new name?age=10">No user</a>
    <a href="/login">Login</a>
    <a href="/noaccess">No Access</a>


  </div>
</div>
</div>

<style>
* {box-sizing: border-box;}

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