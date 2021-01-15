<x-header data="user page component"/>



<div>
    <h1>User list</h1>
    <h3><a href="/login">Add New User</a></h3>
    <table id="collection">
        <tr>
            <th>ID</th>
            <th>Name</th>
            <th>Email</th>
            <th>location</th>
            <th>contact</th>
            <th>Action</th>
        </tr>
        @foreach($userData as $item)
        <tr>
            <td>{{$item['reg_id']}}</td>
            <td>{{$item['firstname']}}</td>
            <td>{{$item['email']}}</td>
            <td>{{$item['location']}}</td>
            <td>{{$item['contact']}}</td>
            <td><button class="danger">Delete</button></td>
        </tr>
        @endforeach
    </table>
    <div class="d-flex justify-content-center">
      {{$userData->links()}}
    </div>
</div>
<style>
  .danger{
    background: rgb(253, 79, 79);
    border: none;
    color: white;
    border-radius: 2px;
    font-size: 18px;
    cursor: pointer;
  }
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
    .w-5{
      display: none;
    }
    </style>