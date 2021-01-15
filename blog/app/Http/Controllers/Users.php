<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\HTTP;
use App\Models\User;

class Users extends Controller
{
    //
    function fetchUserData(){
        echo 'from db user control';

        // direct DB connection.
        return DB::select("select * from users");
    }

    function fetchDBData(){
        // model connection DB
        // return User::all();

        // $data= User::all();
        $data= User::paginate(5);

        return view('userList',['userData'=>$data]);
    }

    function addDBData(Request $req){
        $user = new User;
        $user->firstname=$req->firstname;
        $user->email=$req->email;
        $user->location=$req->location;
        $user->contact=$req->contact;

        $user->save();
        return redirect('user/rabin?age=20');
    }

    function fetchHttp(){
        echo "API Data will be here";
        $collection= Http::get("https://reqres.in/api/users?page=1");
        return view("collection",['collection'=>$collection['data']]);
    }

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
