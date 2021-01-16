<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class Members extends Controller
{
    function dbOperation(){

            if(session()->has('username')){
                $data= DB::table('members')->get();
                return view('memberListDB',['data'=>$data]);   
            }else{
                return redirect('/login');
            }

            // return DB::table('members')->where('id',51)->get();
            // return (array)DB::table('members')->find(51);
            // return DB::table('members')->count();
        }

    function dbGetId($id){
        if(session()->has('username')){
        $data= DB::table('members')->where('id',$id)->get();
        return view('updateListDB',['data'=>$data]);   
        }else{
            return redirect('/login');
        }
    }

    function dbInsert(Request $req){
        session()->flash('memberInsert',$req->input('firstname'));

        $data = DB::table('members')
        ->insert(
            [
                'firstname'=>$req->input('firstname'),
                'email'=>$req->input('email'),
                'location'=>$req->input('location'),
                'contact'=>$req->input('contact')
            ]
            );
            return redirect('/memberList');
    }

    function dbUpdate(Request $req){
        if(session()->has('username')){
            session()->flash('memberUpdate',$req->input('firstname'));

            $data = DB::table('members')
                ->where('id',$req->input('id'))
                ->update(
                [
                    'firstname'=>$req->input('firstname'),
                    'email'=>$req->input('email'),
                    'location'=>$req->input('location'),
                    'contact'=>$req->input('contact')
                ]
            );
            return redirect('/memberList');
        }else{
            return redirect('/login');
        }

       
    }

    function dbDelete($id){
        if(session()->has('username')){
        $user= DB::table('members')->where('id',$id)->get();
        session()->flash('memberDelete',$user[0]->firstname);

        $data = DB::table('members')
        ->where('id',$id)
        ->delete();
        return redirect('/memberList');
    }else{
        return redirect('/login');
    }
    }

    function operations(){
        // return DB::table('members')->avg('id');
        // return DB::table('members')->sum('id');
        // return DB::table('members')->count('id');
        // return DB::table('members')->max('id');
        return DB::table('members')->min('id');
    }
}
