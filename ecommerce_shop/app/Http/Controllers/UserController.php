<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;
use App\Models\User;
use Session;

class UserController extends Controller
{
    function profile(){
        $user=Session::get('user');
        $cUser = User::find($user->id);
        return view('profile',['profile'=>$cUser]);
    }

    function login(Request $req){
        $user = User::where(['email'=>$req->email])->first();
        if($user && Hash::check($req->password,$user->password)){
            $req->session()->put('user',$user);
                return redirect('/');
            
        }else{
            session()->flash('loginfail','Username or password worng!');
            return view('login');
        }
        return $user;
    }

    function signup(Request $req){
        if($req->password!=$req->repassword){
            session()->flash('signupfail','password do not match!');
            return view('signup');
        }else if (!filter_var($req->email, FILTER_VALIDATE_EMAIL)) {
            $emailErr = "Invalid email format";
            
        }else{
            $user = new User;
            $user->name = $req->name;
            $user->email= $req->email;
            $user->password= Hash::make($req->password);
            $data = $user->save();
            if($data){
                return redirect('/login');
            }
            else{
                session()->flash('signupfail','Error Signup');
                return view('signup');
            }
        }
    }
    function upload(Request $req){
        $user =Session::get('user');
        $photo = $user->name.$user->id;
        $name = $req->file('file')->getClientOriginalName();
        $data= $req->file('file')->storeAs('public/profile',$photo.$name);
        if($data){
            $cUser = User::find($user->id);
            $cUser->photo=$data;
            $cUser->save();
        }
        return redirect('/profile');

    }

    function logout(){
        Session::forget('user');
        return redirect('/');
    }
}
