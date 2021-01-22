<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Cart;
use Illuminate\Http\Request;
use Session;

class ProductController extends Controller
{

     function index()
    {
        $product =  Product::all();
        return view('products',['product'=>$product]);
    }


     function searchproduct(Request $req)
    {
        $products = Product::where("name","like","%".$req->search."%")->get();

        return view('searchproduct',['products'=>$products]);
    }

     function getproduct($id)
    {
        $product = Product::find($id);
        return view('getproduct',['product'=>$product]);
    }

     function edit(Product $product)
    {
        //
    }

     function update(Request $request, Product $product)
    {
        //
    }

     function destroy(Product $product)
    {
        //
    }

    function addToCart(Request $req){
        $cart = new Cart;

        $cart->user_id=$req->session()->get('user')['id'];
        $cart->product_id=$req->input('product_id');
        $cart->save();
        return redirect('/');
    }

    static function getCart(){
        $user_id = Session::get('user')['id'];
        return Cart::where('user_id',$user_id)->count();
    }

    function getCartItem(){
        

    }
}
