<x-header data="Profile Page"/>


<h2>Hello {{session('username')}}</h2>


<div>
    <h1>{{__('profile.welcome')}}</h1>
    <a href="#">{{__('profile.about')}}</a>
    <br>
    <a href="#">{{__('profile.list')}}</a>
    <br>
    <a href="#">{{__('profile.contact')}}</a>
</div>

<h5><a href="/logout">Logout</a></h5>