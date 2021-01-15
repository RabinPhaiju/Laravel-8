<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class FileUpload extends Controller
{
    function fileUpload(Request $req){
        $ext = $req->file('file')->getClientOriginalExtension();
        $name = $req->file('file')->getClientOriginalName();
        $data= $req->file('file')->storeAs('docs',rand().$name);
        
        return $data;
    }
}

