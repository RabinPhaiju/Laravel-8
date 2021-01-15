<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class Subscriber extends Controller
{
    function Subscribe(Request $req){
        $data= $req->input('email');
        $req->session()->flash('email',$data);
        return redirect('subscribe');

    }
}
