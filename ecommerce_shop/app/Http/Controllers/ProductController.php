<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Cart;
use App\Models\User;
use Illuminate\Support\Facades\DB;
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
        return redirect('/cart');
    }
    function removeFromCart(Request $req){
        $cart = Cart::find($req->product_id);
        if($cart){
            $cart->delete();
        }
        return redirect('/cart');
    }

    static function getCart(){
        if(!Session::has('user')){
            return 0;
        }
        $user_id = Session::get('user')['id'];
        return Cart::where('user_id',$user_id)->count();
    }

    function cart(){
        $user_id=Session::get('user')['id'];
        $products = DB::table('carts')
        ->join('products','carts.product_id','=','products.id')
        ->where('carts.user_id',$user_id)
        ->select('products.*','carts.id as cart_id')
        ->get();

        return view('cart',['products'=>$products]);
    }

    function order(){
        $user_id=Session::get('user')['id'];
        $total = DB::table('carts')
        ->join('products','carts.product_id','=','products.id')
        ->where('carts.user_id',$user_id)
        ->sum('products.price');

        return view('order',['total'=>$total]);
    }
}
