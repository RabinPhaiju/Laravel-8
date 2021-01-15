<x-header data="File Upload Page"/>

<h1>Upload File</h1>


<form action="uploadFile" method="POST" enctype="multipart/form-data">
    @csrf
    <input type="file" name='file' placeholder="Upload file">
    <br><br>
    <input type="submit" value="Upload">
</form>