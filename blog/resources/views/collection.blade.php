<x-header data="user page component"/>

<div>
    <h1>User list</h1>
    <table id="collection">
        <tr>
            <th>ID</th>
            <th>Name</th>
            <th>Email</th>
            <th>Photo</th>
        </tr>
        @foreach($collection as $item)
        <tr>
            <td>{{$item['id']}}</td>
            <td>{{$item['first_name']}}</td>
            <td>{{$item['email']}}</td>
            <td><img src={{$item['avatar']}} alt=""></td>
        </tr>
        @endforeach
    </table>
</div>
<style>
    #collection {
      font-family: Arial, Helvetica, sans-serif;
      border-collapse: collapse;
      width: 100%;
    }
    
    #collection td, #collection th {
      border: 1px solid #ddd;
      padding: 8px;
    }
    
    #collection tr:nth-child(even){background-color: #f2f2f2;}
    
    #collection tr:hover {background-color: #ddd;}
    
    #collection th {
      padding-top: 12px;
      padding-bottom: 12px;
      text-align: left;
      background-color: #4CAF50;
      color: white;
    }
    </style>