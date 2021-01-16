<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class Members extends Controller
{
    function dbOperation(){

            $data= DB::table('members')->get();
            if(session()->has('username')){
                return view('memberListDB',['data'=>$data]);   
            }else{
                return redirect('/login');
            }

            // return DB::table('members')->where('id',51)->get();
            // return (array)DB::table('members')->find(51);
            // return DB::table('members')->count();
        }

    function dbGetId($id){
        $data= DB::table('members')->where('id',$id)->get();
        // return $data[0]->id;
        return view('updateListDB',['data'=>$data]);   
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
    }

    function dbDelete($id){
        $user= DB::table('members')->where('id',$id)->get();
        session()->flash('memberDelete',$user[0]->firstname);

        $data = DB::table('members')
        ->where('id',$id)
        ->delete();
        return redirect('/memberList');
    }
}
