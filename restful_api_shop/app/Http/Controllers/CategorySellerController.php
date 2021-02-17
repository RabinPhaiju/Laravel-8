<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;
use App\Http\Controllers\ApiController;

class CategorySellerController extends ApiController
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Category $category)
    {
        $sellers = $category->products()
        ->with('seller')
        ->get()
        ->pluck('seller')
        ->unique()
        ->values();
        if($sellers){
            return $this->showAll($sellers);
        }else{
            return $this->errorResponse('Not found',404);
        }
    }

}