<x-header data="Update User Page"/>

<form action="/user/updateUser" method="POST">

{{-- if we include / before route eg ### /user ###  then, route is in base --}}

    @csrf
    <input type="text" name="id" value={{$data['id']}} hidden>
    <input type="text" name="firstname" placeholder="Enter your name" value={{$data['firstname']}}>
    <br><br>
    <input type="email" name="email" placeholder="Enter Email" value={{$data['email']}}>
    <br><br>
    <input type="text" name="location" placeholder="Enter Location" value={{$data['location']}}>
    <br><br>
    <input type="number" name="contact" placeholder="Enter Contact" value={{$data['contact']}}>
    <br><br>
    <button class="button" type="submit">Update User</button>
  </form>