<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Validator;

class UserController extends Controller
{

    function fileUpload(Request $req){
        
         $result = $req->file('file')->store('apiDocs');
        
        if($result){
            $user_id = $req->user_id;
            $user= User::find($user_id);
            
            $user->photo=$result;
            $user->save();
            return ['data'=>$user];
        }
        return ['data'=>$result];
    }

    function index(){
        return User::all();
    }

    function getData($id){
        $user = User::find($id);

        if($user){
            return $user;
        }else{
            return ['data'=>'User not found.'];
        }
    }

    function login(Request $req){

        $user= User::where('email', $req->email)->first();
        // print_r($data);
            if (!$user || !Hash::check($req->password, $user->password)) {
                return response([
                    'data' => ['Username and password donot match.']
                ], 404);
            }
        
             $token = $user->createToken('my-app-token')->plainTextToken;
        
            $response = [
                'user' => $user,
                'token' => $token
            ];
        
             return response($response, 201);
    }

    function signup(Request $req){
        
        $user= new User;

        $rules = array(
            "name"=>"required | min:5 | max:15",
            "email"=>"required",
            "password"=>"required",
            "repassword"=>"required",
        );
        $validator = Validator::make($req->all(),$rules);

        if($validator->fails()){
            return response()->json($validator->errors(),401);
        }else if($req->password==$req->repassword){
            $user->name=$req->name;
            $user->email=$req->email;
            $user->password = Hash::make($req->password);
        
            $result = $user->save();
            if($result){
                return ['data'=>"user registerd"];
            }else{
                return ['data'=>'user register fail.'];
            }
        }else{
            return ['data'=>'Password error'];
        }
    }

    function updateData(Request $req){
        $user = User::find($req->id);

        if($user){
            if($req->name){
                $user->name=$req->name;
            }
            if($req->email){
                $user->email=$req->email;
            }
            $result = $user->save();
    
            if($result){
                return ['data'=>"User udpated"];
            }else{
                return ['data'=>'Error saving user'];
            }
        }else{
            return ['data'=>'User not found.'];
        } 
    }

    function deleteData($id){
        $user = User::find($id);

        if($user){
            $result = $user->delete();
    
            if($result){
                return ['data'=>"User deleted"];
            }else{
                return ['data'=>'Error deleting user'];
            }
        }else{
            return ['data'=>'User not found.'];
        } 
    }

    function searchData($name){
        $user = User::where("name","like","%".$name."%")->get();

        if($user){
                return ['data'=>$user];
        }else{
            return ['data'=>'User not found.'];
        } 
    }
}
