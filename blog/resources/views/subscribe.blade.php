<x-header data='Subscribe Page'/>
@if (Session::has('email'))
<h1 style="color:green">{{Session::get('email')}} get subscribed !</h1>
@endif


<h1>Subscriber Page</h1>
<div>
    <form action="subscribe" method="POST">
        @csrf 
        <input type="text" nmae='username' placeholder="Enter name">
        <br><br>
        <input type="email" name='email' placeholder="Enter email">
        <br><br>
        <button type="submit">Subscribe</button>
    </form>
</div>