<?php

namespace App\Http\Controllers;
use App\Models\Contact;
use Validator;

use Illuminate\Http\Request;

class ContactController extends Controller
{
    function index(){
        return  Contact::all();
    }

    function getData($id){
        $contact = Contact::find($id);

        if($contact){
            return $contact;
        }else{
            return ['data'=>'Contact not found.'];
        }
    }

    function addData(Request $req){
        $contact = new Contact;

        $rules = array(
            "name"=>"required | min:5 | max:15",
            "email"=>"required",
            "message"=>"required",
            "date"=>"required"
        );

        $validator = Validator::make($req->all(),$rules);
        if($validator->fails()){
            return response()->json($validator->errors(),401);
        }else{
            $contact->name=$req->name;
            $contact->email=$req->email;
            $contact->message = $req->message;
            $contact->date = $req->date;
    
            $result = $contact->save();
    
            if($result){
                return ['data'=>"Contact saved"];
            }else{
                return ['data'=>'Error saving contact'];
            }
        }
    }

    function updateData(Request $req){
        $contact = Contact::find($req->id);

        if($contact){
            if($req->name){
                $contact->name=$req->name;
            }
            if($req->email){
                $contact->email=$req->email;
            }
            if($req->message){
                $contact->message = $req->message;
            }
            if($req->date){
                $contact->date = $req->date;
            }
            $result = $contact->save();
    
            if($result){
                return ['data'=>"Contact udpated"];
            }else{
                return ['data'=>'Error saving contact'];
            }
        }else{
            return ['data'=>'Contact not found.'];
        } 
    }

    function deleteData($id){
        $contact = Contact::find($id);

        if($contact){
            $result = $contact->delete();
    
            if($result){
                return ['data'=>"Contact deleted"];
            }else{
                return ['data'=>'Error deleting contact'];
            }
        }else{
            return ['data'=>'Contact not found.'];
        } 
    }

    function searchData($name){
        $contact = Contact::where("name","like","%".$name."%")->get();

        if($contact){
                return ['data'=>$contact];
        }else{
            return ['data'=>'Contact not found.'];
        } 
    }
}
