<x-header data="user page component"/>



<div>
    <h1>User list</h1>
    <h3><a href="/login">Add New User</a></h3>
    @if (Session::has('deleteUser'))
      <h3 style="color:red">User {{Session::get('deleteUser')}} deleted !</h3>
    @endif
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
            <td>{{$item['id']}}</td>
            <td>{{$item['firstname']}}</td>
            <td>{{$item['email']}}</td>
            <td>{{$item['location']}}</td>
            <td>{{$item['contact']}}</td>
            <td >
              <a class="danger" onclick="return confirm('Are you sure you want to delete this item?');" href={{"delete/".$item['id']}}>Delete</a>
              <a class="orange" href={{"editUserDB/".$item['id']}}>Edit</a>
            </td>
        </tr>
        @endforeach
    </table>
    <div class="d-flex justify-content-center">
      {{$userData->links()}}
    </div>
</div>
<style>
  .danger{
    padding:4px;
    background: rgb(253, 79, 79);
    border: none;
    color: white;
    border-radius: 2px;
    font-size: 18px;
    cursor: pointer;
  }
  .orange{
    padding:4px 8px;
    background: rgb(216, 160, 6);
    border: none;
    color: white;
    border-radius: 2px;
    font-size: 18px;
    cursor: pointer;
  }
  .danger,.orange{
    text-decoration: none;
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