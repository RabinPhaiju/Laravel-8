<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Member;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Mail;
use App\Mail\SampleMail;

class Members extends Controller
{

    function sentMemberMail(Request $req, $memberId)
    {
    $member = Member::findOrFail($memberId);

        Mail::to($req->user())
        ->cc('cc more users')
        ->bcc('bcc even more user')
        ->send(new SampleMail($member));
    
        // Looping Over Recipients
            // foreach (['taylor@example.com', 'dries@example.com'] as $recipient) {
            //     Mail::to($recipient)->send(new SampleMail($member));
            // }


        // Sending Mail Via A Specific Mailer
            // Mail::mailer('postmark')
            // ->to($req->user())
            // ->send(new SampleMail($member));

        // Queueing A Mail Message
        //     Mail::to($req->user())
        //     ->cc('cc more users')
        //     ->bcc('bcc even more user')
        //     ->queue(new SampleMail($member));

        // Delayed Message Queueing
            $when = now()->addMinutes(10);

            Mail::to($req->user())
            ->cc('cc more users')
            ->bcc('bcc even more user')
            ->later($when, new SampleMail($member));

            // Pushing To Specific Queues
            // Queueing By Default
            // Previewing Mailables In The Browser
            // Localizing Mailables
        
    }

    function FluentStrings(){
        $data = "this is a remark";

        return Str::of($data)
            ->ucfirst($data)
            // ->camel($data)
            ->replaceFirst("This","These",$data);
    }

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

    function joins(){
        return DB::select("select * from users join members on users.id = members.id");
        return DB::select("select * from users join members on users.id = members.id where users.id<49");
    }

        
    function oneToOne(){
        return Member::find(48)->getBloodtype1;
    }

    function oneToMany(){
        return Member::find(48)->getBloodtype2;
    }

    function belongsToMany(){
        return Member::find(48)->getBloodtype3;
    }

    function hasOneThrough(){
        return Member::find(48)->getBloodtype4;
    }
    function hasManyThrough(){
        return Member::find(48)->getBloodtype5;
    }
    
}
