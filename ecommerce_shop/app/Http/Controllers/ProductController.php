<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

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
}
