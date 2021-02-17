<?php

namespace App\Http\Controllers;

use App\Http\Controllers\ApiController;
use Illuminate\Http\Request;
use App\Models\Product;
use Validator;

class ProductController extends ApiController
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $products = Product::all();
        return $this->showAll($products);
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
            'description'=> 'required',
            'quantity'=>'required',
            'seller_id'=>'required',
            'image' => 'required|image'
        ];

        $validator = Validator::make($request->all(),$rules);
        if($validator->fails()){
            return response()->json($validator->errors(),401);
        }
            $data = $request->all();

            $product = Product::create($data);
        
            if($product){
                return $this->showOne($product,201);
            }else{
                return ['data'=>'product creation fail.'];
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
        $product = Product::find($id);
        if($product){
            return $this->showOne($product);
        }else{
            return $this->errorResponse('Product not found',404);
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
        $product = Product::find($id);
        if($product){
        
        if ($request->has('name')){
            $product->name = $request->name;
        }
        if($request->has('description')){
            $product->description = $request->description;
        }
        if ($request->has('quantity')){
            $product->quantity = $request->quantity;
        }
        if($request->has('image')){
            $product->image = $request->image;
        }
        if($request->has('status')){
            $product->status = $request->status;
        }

        if(!$product->isDirty()){
            return $this->errorResponse('You need to specify a different value to update',422);
        }
        $product->save();
        return $this->showOne($product);
    }else{
        return $this->errorResponse('Product not found',404);
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
        $product = Product::find($id);
        if($product){
            $product->delete();
            return $this->showOne($product);
        }else{
            return $this->errorResponse('Product not found',404);
        }
    }
}
