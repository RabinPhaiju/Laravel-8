<?php

namespace App\Http\Controllers;

use App\Http\Controllers\ApiController;
use Illuminate\Http\Request;
use App\Models\Category;
use Validator;


class CategoryController extends ApiController
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categories = Category::all();
        return $this->showAll($categories);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $rules =[
            'name'=> 'required',
            'description'=> 'required'
        ];

        $validator = Validator::make($request->all(),$rules);
        if($validator->fails()){
            return response()->json($validator->errors(),401);
        }
            $data = $request->all();
            $data['name']=$request->name;
            $data['description']=$request->description;

            $category = Category::create($data);
        
            if($category){
                return $this->showOne($category,201);
            }else{
                return ['data'=>'category creation fail.'];
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
        $category = Category::find($id);
        if($category){
            return $this->showOne($category);
        }else{
            return $this->errorResponse('Category not found',404);
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $category = Category::find($id);
        if($category){
        
        if ($request->has('name')){
            $category->name = $request->name;
        }
        if($request->has('description')){
            $category->description = $request->description;
        }
        if(!$category->isDirty()){
            return $this->errorResponse('You need to specify a different value to update',422);
        }
        $category->save();
        return $this->showOne($category);
    }else{
        return $this->errorResponse('Category not found',404);
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
        $category = Category::find($id);
        if($category){
            $category->delete();
            return $this->showOne($category);
        }else{
            return $this->errorResponse('Category not found',404);
        }
    }
}
