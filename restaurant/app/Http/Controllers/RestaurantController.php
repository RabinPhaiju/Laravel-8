<?php

namespace App\Http\Controllers;

use App\Models\Restaurant;
use Illuminate\Http\Request;

class RestaurantController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('home');
    }

    public function list(){
        $data = Restaurant::all();
        return view('restolist',['data'=>$data]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function add(Request $req)
    {
        $restaurant = new Restaurant;

        $restaurant->name=$req->name;
        $restaurant->email= $req->email;
        $restaurant->address = $req->address;

        $restaurant->save();
        $req->session()->flash('name',$req->name);

        return redirect('list');

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Restaurant  $restaurant
     * @return \Illuminate\Http\Response
     */
    public function show(Restaurant $restaurant)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Restaurant  $restaurant
     * @return \Illuminate\Http\Response
     */
    public function updatelist(Request $req)
    {
        $resto = Restaurant::find($req->id);

        if($resto){
            return view('updatelist',['data'=>$resto]);
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Restaurant  $restaurant
     * @return \Illuminate\Http\Response
     */
    public function update(Request $req)
    {
        $resto = Restaurant::find($req->id);

        if($resto){
            if($req->name){
                $resto->name=$req->name;
            }
            if($req->email){
                $resto->email=$req->email;
            }
            if($req->address){
                $resto->address = $req->address;
            }
            $result = $resto->save();
    
            if($result){
                session()->flash('update',$req->name);
            }else{
                session()->flash('update',$req->name);
            }
        }else{
            session()->flash('update',$req->name);
        } 
        return redirect('list');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Restaurant  $restaurant
     * @return \Illuminate\Http\Response
     */
    public function delete(Request $req,$id)
    {
        $res = Restaurant::find($id);
        if($res){
            $res->delete();
            session()->flash('delete',$res->name);
        }
        return redirect('list');

    }
}
