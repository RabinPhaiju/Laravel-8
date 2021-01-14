<x-header data="user page component"/>

<h1>Hello {{$name[2]!="rabin"?$name[2]:"sir"}}</h1>
<p>{{count($name)}}</p>

@if($name[2]=='rabin')
<i>hi {{$name[2]}}</i>
@else
<i>Welcome</i>
@endif

<br>
<h4>for loop</h4>
<br>

@for($i=0;$i<3;$i++)
<p>{{$name[$i]}}</p>
@endfor
<h1>For Each</h1>
@foreach($name as $person)
<p>{{$person}}</p>
@endforeach

@include('inner')

<h1>Java Script</h1>
<script>
var data =@json($name);
console.warn(data[1]);
document.write(data[1]);
</script>