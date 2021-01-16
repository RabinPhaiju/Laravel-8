<x-header data='Update Memeber'/>

<div>
   <h1>Update Member</h1>
        <div >
          <div class="modal-content">
            
            <div id="form">
              <h3>Update Member</h3>
              <form action="/member/updateMember" method="POST">
                @csrf
                <input type="number" name="id" value={{$data[0]->id}} hidden>
                Name: <input type="text" name="firstname" placeholder="Enter your name" value={{$data[0]->firstname}}>
                <br><br>
                Email: <input type="email" name="email" placeholder="Enter Email" value={{$data[0]->email}}>
                <br><br>
                Location: <input type="text" name="location" placeholder="Enter Location" value={{$data[0]->location}}>
                <br><br>
                Contact: <input type="number" name="contact" placeholder="Enter Contact" value={{$data[0]->contact}}>
                <br><br>
                <button class="button" type="submit">Update Member</button>
              </form>
            </div>
          </div>
        </div>

</div>
<style>
      /* Modal Content */
      .modal-content,#form {
        background-color: rgb(241,241,241);
        margin: auto;
        padding: 20px;
        border: 1px solid #888;
        width: 60%;
        border-radius: 4px;
      }
      </style>