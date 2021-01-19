<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Content;
use Validator;

class ContentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return Content::all();
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return "create";
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $req)
    {
        $content = new Content;

        $rules = array(
            "title"=>"required | min:5 | max:15",
            "description"=>"required",
            "postby_id"=>"required",
        );

        $validator = Validator::make($req->all(),$rules);
        if($validator->fails()){
            return response()->json($validator->errors(),401);
        }else{
            $content->title=$req->title;
            $content->description=$req->description;
            $content->postby_id = $req->postby_id;
          
    
            $result = $content->save();
    
            if($result){
                return ['data'=>"Content saved"];
            }else{
                return ['data'=>'Error saving content'];
            }
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $content = Content::find($id);

        if($content){
            return $content;
        }else{
            return ['data'=>'Content not found.'];
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        return 'edit'; 
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $req, $id)
    {
        $content = Content::find($id);

        if($content){
            if($req->title){
                $content->title=$req->title;
            }
            if($req->email){
                $content->email=$req->email;
            }
            if($req->description){
                $content->description = $req->description;
            }
            $result = $content->save();
    
            if($result){
                return ['data'=>"Content udpated"];
            }else{
                return ['data'=>'Error saving content'];
            }
        }else{
            return ['data'=>'Content not found.'];
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $content = Content::find($id);

        if($content){
            $result = $content->delete();
    
            if($result){
                return ['data'=>"Content deleted"];
            }else{
                return ['data'=>'Error deleting content'];
            }
        }else{
            return ['data'=>'Content not found.'];
        } 
    }
}
