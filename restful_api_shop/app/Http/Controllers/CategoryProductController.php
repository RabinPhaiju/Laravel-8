<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;
use App\Http\Controllers\ApiController;

class CategoryProductController extends ApiController
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Category $category)
    {
        $products = $category->products;
        if($products){
            return $this->showAll($products);
        }else{
            return $this->errorResponse('Not found',404);
        }
            
    }

}
