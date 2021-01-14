<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class Users extends Controller
{
    //
    public function index_func($user){
        // return ['name'=>"rabin",'age'=>34]; // api return
        echo " Hello from controller ".$user;
        $data = ['rabin','sabin',$user];

        return view("user",['name'=>$data]);
    }

    function getData(Request $req){
        $username = $req->old('username');
        $req->validate([
            'username'=>'required | max:10 | min:5',
            'password' => ['required', 
               'min:6', 
               'regex:/^.*(?=.{3,})(?=.*[a-zA-Z])(?=.*[0-9])(?=.*[\d\x])(?=.*[!$#%]).*$/']
        ]);
      
        return $req->input();
    }
}
