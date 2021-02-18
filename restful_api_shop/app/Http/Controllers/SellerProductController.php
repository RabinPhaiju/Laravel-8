<?php

namespace App\Http\Controllers;

use App\Models\Seller;
use App\Models\User;
use App\Models\Product;
use Illuminate\Http\Request;
use App\Http\Controllers\ApiController;
use Illuminate\Support\Facades\Storage;
use Validator;

class SellerProductController extends ApiController
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Seller $seller)
    {
        $products = $seller->products;
        return $this->showAll($products);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request,User $seller)
    {
        $rules = [
            "name"=>"required",
            "description"=>"required",
            "quantity"=>"required|integer|min:1",
            "image" => "required|image"
        ];
        $validator = Validator::make($request->all(),$rules);
        if($validator->fails()){
            return response()->json($validator->errors(),401);
        }
            $data = $request->all();
            $data['seller_id'] = $seller->id;
            $data['image'] = $request->image->store('');

            $product = Product::create($data);
        
            if($product){
                return $this->showOne($product,201);
            }else{
                return ['data'=>'product creation fail.'];
            }

    }


    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Seller  $seller
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Seller $seller,Product $product)
    {
        $rules = [
            'quantity'=>'integer|min:1',
            'status'=>'in:'.Product::AVAILABLE_PRODUCT.','.Product::UNAVAILABLE_PRODUCT,
            'image'=>'image'
        ];
        $validator = Validator::make($request->all(),$rules);
        if($validator->fails()){

        if($seller->id == $product->seller_id){
            
            if ($request->has('name')){
                $product->name = $request->name;
            }
            if($request->has('description')){
                $product->description = $request->description;
            }
            if ($request->has('quantity')){
                $product->quantity = $request->quantity;
            }
            if($request->hasFile('image')){
                Storage::delete($product->image);
                $product->image = $request->image->store('');
            }
            if($request->has('status')){
                $product->status = $request->status;
                if($product->isAvailable() && $product->categories()->count()==0){
                    return $this->errorResponse('An Active product must have at least one category',409);
                }
            }

            if(!$product->isDirty()){
                return $this->errorResponse('You need to specify a different value to update',422);
            }
            $product->save(); 
            return $this->showOne($product);
        }else{
            return $this->errorResponse('Product cannot be updated',404);
        }
    }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Seller  $seller
     * @return \Illuminate\Http\Response
     */
    public function destroy(Seller $seller,Product $product)
    {
        if($seller->id == $product->seller_id){
            $product->delete();
            Storage::delete($product->image);

            return $this->showOne($product);
        }else{
            return $this->errorResponse('Cannot delete the product',404);
        }
    }
}
