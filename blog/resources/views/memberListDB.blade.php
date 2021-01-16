<x-header data="user page component"/>



<div>
    <h1>Member List</h1>
    <h3>
      <button id="myBtn">Add New Member</button>
    </h3>
    @if (Session::has('memberInsert'))
    <h3 style="color:green">Member {{Session::get('memberInsert')}} added !</h3>
  @endif
  @if (Session::has('memberUpdate'))
    <h3 style="color:green">Member {{Session::get('memberUpdate')}} updated !</h3>
  @endif
  @if (Session::has('memberDelete'))
    <h3 style="color:red">Member {{Session::get('memberDelete')}} deleted !</h3>
  @endif
   
        <div id="myModal" class="modal">
          <div class="modal-content">
            <span class="close">&times;</span>
            <div id="form">
              <h3>Add new Member</h3>
              <form action="addMember" method="POST">
                @csrf
                <input type="text" name="firstname" placeholder="Enter your name">
                <br><br>
                <input type="email" name="email" placeholder="Enter Email">
                <br><br>
                <input type="text" name="location" placeholder="Enter Location">
                <br><br>
                <input type="number" name="contact" placeholder="Enter Contact">
                <br><br>
                <button class="button" type="submit">Add Member</button>
              </form>
            </div>
          </div>
        </div>

    {{-- @if (Session::has('deleteUser'))
      <h3 style="color:red">User {{Session::get('deleteUser')}} deleted !</h3>
    @endif --}}
    <table id="collection">
        <tr>
            <th>ID</th>
            <th>Name</th>
            <th>Email</th>
            <th>location</th>
            <th>contact</th>
            <th>Action</th>
        </tr>
        @foreach($data as $item)
        <tr>
            <td>{{$item->id}}</td>
            <td>{{$item->firstname}}</td>
            <td>{{$item->email}}</td>
            <td>{{$item->location}}</td>
            <td>{{$item->contact}}</td>
            <td >
              <a class="danger" onclick="return confirm('Are you sure you want to delete this item?');" 
              href={{"member/delete/".$item->id}}>Delete</a>
              <a class="orange" href={{"member/update/".$item->id}}>Edit</a>
            </td>
        </tr>
        @endforeach
    </table>
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
      /* The Modal (background) */
      .modal {
        display: none; /* Hidden by default */
        position: fixed; /* Stay in place */
        z-index: 1; /* Sit on top */
        padding-top: 10%; /* Location of the box */
        left: 0;
        top: 0;
        width: 100%; /* Full width */
        height: 100%; /* Full height */
        overflow: auto; /* Enable scroll if needed */
        background-color: rgb(0,0,0); /* Fallback color */
        background-color: rgba(0,0,0,0.4); /* Black w/ opacity */
        border-radius: 4px;
      }
      
      /* Modal Content */
      .modal-content,#form {
        background-color: rgb(241,241,241);
        margin: auto;
        padding: 20px;
        border: 1px solid #888;
        width: 50%;
        border-radius: 4px;
      }
      
      /* The Close Button */
      .close {
        color: #aaaaaa;
        float: right;
        font-size: 28px;
        font-weight: bold;
      }
      
      .close:hover,
      .close:focus {
        color: #000;
        text-decoration: none;
        cursor: pointer;
      }
      </style>

<script>
  // Get the modal
  var modal = document.getElementById("myModal");
  
  // Get the button that opens the modal
  var btn = document.getElementById("myBtn");
  
  // Get the <span> element that closes the modal
  var span = document.getElementsByClassName("close")[0];
  
  // When the user clicks the button, open the modal 
  btn.onclick = function() {
    modal.style.display = "block";
  }
  
  // When the user clicks on <span> (x), close the modal
  span.onclick = function() {
    modal.style.display = "none";
  }
 
  
  // When the user clicks anywhere outside of the modal, close it
  window.onclick = function(event) {
    if (event.target == modal) {
      modal.style.display = "none";
    }
  }
  </script>